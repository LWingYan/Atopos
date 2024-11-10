<?php

use Widget\Archive;

function human_time_diff($from, $to = '') {
    if (empty($to)) {
        $to = time();
    }
    $diff = abs($to - $from);
    $day_diff = floor($diff / 86400);
    if ($day_diff >= 1) {
        if ($day_diff == 1) {
            return '昨天';
        }
        return ' ' . $day_diff . ' 天前';
    }
    $hour_diff = floor(($diff - $day_diff * 86400) / 3600);
    if ($hour_diff >= 1) {
        if ($hour_diff == 1) {
            return ' 1 小时前';
        }
        return ' ' . $hour_diff . ' 小时前';
    }
    $minute_diff = floor(($diff - $day_diff * 86400 - $hour_diff * 3600) / 60);
    if ($minute_diff >= 1) {
        if ($minute_diff == 1) {
            return ' 1 分钟前';
        }
        return ' ' . $minute_diff . ' 分钟前';
    }
    return ' 刚刚';
}

function get_last_login($user){
    $user   = '1'; // 这里的 '1' 是博主的用户ID，你需要根据实际情况来设置
    $now = time();
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $row = $db->fetchRow($db->select('activated')->from('table.users')->where('uid = ?', $user));
    if ($row) {
        echo Typecho_I18n::dateWord($row['activated'], $now);
    } else {
        echo '博主一直在这里';
    }
}

function Viewlevel($cid) {
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    // 确保字段名称与数据库中的名称一致
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    $views = $row ? (int) $row['views'] : 0;
    if (!isset($views)) {
        // 如果查询失败或字段不存在，返回一个默认值或错误信息
        echo 'default-post';
    }

    if ($views < 100) {
        echo 'new-post';
    } elseif ($views >= 100 && $views < 300) {
        echo 'good-post';
    } elseif ($views >= 300 && $views < 1000) {
        echo 'recommended-post';
    } elseif ($views >= 1000 && $views < 5000) {
        echo 'hot-post';
    } elseif ($views >= 5000 && $views < 10000) {
        echo 'headline-post';
    } elseif ($views >= 10000 && $views < 30000) {
        echo 'explosive-post';
    } elseif ($views >= 30000) {
        echo 'god-post';
    }
}

function getPostView($archive): void {
    $cid = $archive->cid;
    $db = \Typecho\Db::get();
    $prefix = $db->getPrefix();
    // 获取当前文章的浏览量
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    $views = $row ? (int) $row['views'] : 0;
    // 如果是单篇文章页面，则增加浏览量
    if ($archive->is('single')) {
        $cookieViews = \Typecho\Cookie::get('__post_views');
        $viewedPosts = $cookieViews ? explode(',', $cookieViews) : [];
        if (!in_array($cid, $viewedPosts)) {
            $db->query($db->update('table.contents')->rows(array('views' => $views + 1))->where('cid = ?', $cid));
            $viewedPosts[] = $cid;
            \Typecho\Cookie::set('__post_views', implode(',', $viewedPosts)); // 记录查看cookie
            $views++; // 更新本次显示的浏览量
        }
    }
    // 格式化浏览量
    if ($views >= 10000) {
        $formattedViews = number_format($views / 10000, 1) . 'w';
    } elseif ($views >= 1000){
        $formattedViews = number_format($views / 1000, 1) . 'k';
    } else {
        $formattedViews = $views;
    }
    echo $formattedViews;
}

// 生成文章目录树
function generateToc($content): string {
    $idCounter = 1;
    $matches = array();
    preg_match_all('/<h([1-5])(?![^>]*class=)([^>]*)>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER);
    if (!$matches) {
        return '暂无目录';
    }
    $toc = '<ul class="ul-toc list-none">';
    $currentLevel = 0;
    foreach ($matches as $match) {
        $level = (int)$match[1];
        $attributes = $match[2];
        $title = strip_tags($match[3]);
        $anchor = 'header-' . $idCounter++;
        // 生成新的标题标签并添加 id
        $content = str_replace($match[0], '<h' . $level . ' id="' . $anchor . '"' . $attributes . '>' . $match[3] . '</h' . $level . '>', $content);
        // 调整目录层级
        if ($currentLevel == 0) {
            $currentLevel = $level;
        }
        while ($currentLevel < $level) {
            $toc .= '<ul>';
            $currentLevel++;
        }
        while ($currentLevel > $level) {
            $toc .= '</ul></li>';
            $currentLevel--;
        }
        $toc .= '<li><a href="#' . $anchor . '" class="toc-link">' . $title . '</a>';
        // 添加闭合标签
        $toc .= '</li>';
    }
    // 关闭所有未闭合的 ul 标签
    while ($currentLevel > 0) {
        $toc .= '</ul>';
        $currentLevel--;
    }
    $toc .= '</ul>';
    return $toc;
}

function getTagCount($mid) {
    $db = Typecho_Db::get();
    // 构建查询，排除 typecho_fields 表中存在 'say' 类型的文章
    $query = $db->select(array('COUNT(DISTINCT table.relationships.cid)' => 'num'))
        ->from('table.relationships')
        ->join('table.contents', 'table.relationships.cid = table.contents.cid', Typecho_Db::LEFT_JOIN)
        ->join('table.fields', 'table.contents.cid = table.fields.cid', Typecho_Db::LEFT_JOIN)
        ->where('table.relationships.mid = ?', $mid)
        ->where('table.contents.type = ?', 'post')
        ->where('table.fields.name = ?', 'article_type')
        ->where('table.fields.str_value != ?', 'say')
        ->group('table.relationships.mid');
    $result = $db->fetchObject($query);
    return $result ? $result->num : 0;
}

/* 增加自定义字段 */
function themeFields($layout)
{
    if ($_SERVER['SCRIPT_NAME']=="/admin/write-post.php"){
        $article_type= new Typecho_Widget_Helper_Form_Element_Select('article_type',array('article' => _t('文章'),'gg' => _t('广而告之')),'article',_t('文章类型'),_t("选择文章类型首页输出"));
        $layout->addItem($article_type);
        
        $keywords = new Typecho_Widget_Helper_Form_Element_Text(
        'keywords',
        NULL,
        NULL,
        'SEO关键词',
        '介绍：用于设置当前页SEO关键词 <br />
            注意：多个关键词使用英文逗号进行隔开 <br />
            例如：Typecho,Typecho主题,Typecho模板 <br />
            其他：如果不填写此项，则默认取文章标签'
        );
        $layout->addItem($keywords);
    
        $description = new Typecho_Widget_Helper_Form_Element_Textarea(
        'description',
        NULL,
        NULL,
        'SEO描述语',
        '介绍：用于设置当前页SEO描述语 <br />
            注意：SEO描述语不应当过长也不应当过少 <br />
            其他：如果不填写此项，则默认截取文章片段'
        );
        $layout->addItem($description);
        
        $thumb = new Typecho_Widget_Helper_Form_Element_Textarea(
        'thumb',
        NULL,
        NULL,
        '自定义缩略图（非必填）',
        '填写时：将会显示填写的文章缩略图 <br>
             不填写时：<br>
                1、若文章有图片则取文章内图片 <br>
                2、若文章无图片，并且外观设置里未填写·自定义缩略图·选项，则取模板自带图片 <br>
                3、若文章无图片，并且外观设置里填写了·自定义缩略图·选项，则取自定义缩略图图片'
        );
        $layout->addItem($thumb);

        
        
        $ggimg = new Typecho_Widget_Helper_Form_Element_Text(
        'ggimg',
        NULL,
        NULL,
        '广告图片',
        '介绍：首页显示的广告图片链接'
        );
        $layout->addItem($ggimg);
        
        $gglinks = new Typecho_Widget_Helper_Form_Element_Text(
        'gglinks',
        NULL,
        NULL,
        '广告跳转链接',
        '介绍：首页显示的该广告跳转链接'
        );
        $layout->addItem($gglinks);
    
    }
    if ($_SERVER['SCRIPT_NAME']=="/admin/write-page.php"){
        $page_icon = new Typecho_Widget_Helper_Form_Element_Text('page_icon', NULL, '<i class="ri-zzz-line"></i>', '图标设置（必填）', '介绍：用于设置导航的图标<br />
             示例：<i class="ri-zzz-line"></i> <br />
             例如：推荐使用 <a href="https://remixicon.com/">remixicon</a>');
        $layout->addItem($page_icon);
    }
    
    
        $CustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea(
        'CustomCSS',
        NULL,
        NULL,
        '自定义CSS',
        '介绍：用于添加当前页css内容 <br />
            注意：填写时无需填写style标签<br />
            其他：该字段内容不通用到全部页面里。'
        );
        $layout->addItem($CustomCSS);
        
        $CustomScript = new Typecho_Widget_Helper_Form_Element_Textarea(
        'CustomScript',
        NULL,
        NULL,
        '自定义JS',
        '介绍：用于添加当前页js内容 <br />
            注意：填写时无需填写script标签<br />
            其他：该字段内容不通用到全部页面里。'
        );
        $layout->addItem($CustomScript);
        
}