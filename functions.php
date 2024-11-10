<?php
const __THEME_NAME__ = 'Atopos';
const __THEME_VERSION__ = '1.2';
require_once "core/feature.php";
require_once "core/factory.php";
require_once "core/Parsedown.php";
require_once "core/Config.php";
require_once "core/post.php";

Typecho_Plugin::factory('admin/write-post.php')->bottom = array('tagshelper', 'tagslist');
class tagshelper {
    public static function tagslist()
    {      
    $tag="";$taglist="";$i=0;//循环一次利用到两个位置
Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=200')->to($tags);
while ($tags->next()) {
$tag=$tag."'".$tags->name."',";
$taglist=$taglist."<a id=".$i." onclick=\"$(\'#tags\').tokenInput(\'add\', {id: \'".$tags->name."\', tags: \'".$tags->name."\'});\">".$tags->name."</a>";
$i++;
}
?><style>.Posthelper a{cursor: pointer; padding: 0px 6px; margin: 2px 0;display: inline-block;border-radius:var(--radius)!important;text-decoration: none;}
.Posthelper a:hover{background:var(--theme);color:var(--main);}.fullscreen #tab-files{right: 0;}/*解决全屏状态下鼠标放到附件上传按钮上导致的窗口抖动问题*/
</style>
<script>
  function chaall () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'\n!['+file+'](' + url + ')\n':''+html+'';
   }else{
   html = isImage ? html+'<img src="' + url + '" alt="' + file + '" />\n':''+html+'';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
 
    function chaquan () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'':html+'\n['+file+'](' + url + ')\n';
   }else{
   html = isImage ? html+'':html+'<a href="' + url + '"/>' + file + '</a>\n';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
function filter_method(text, badword){
    //获取文本输入框中的内容
    var value = text;
    var res = '';
    //遍历敏感词数组
    for(var i=0; i<badword.length; i++){
        var reg = new RegExp(badword[i],"g");
        //判断内容中是否包括敏感词        
        if (value.indexOf(badword[i]) > -1) {
            $('#tags').tokenInput('add', {id: badword[i], tags: badword[i]});
        }
    }
    return;
}
var badwords = [<?php echo $tag; ?>];
function chatag(){
var textarea=$('#text').val();
filter_method(textarea, badwords); 
}
  $(document).ready(function(){
    $('#file-list').after('<div class="Posthelper"><a class="w-100" onclick=\"chaall()\" style="background: var(--main);background-color:var(--theme);text-align: center; padding: 5px 0; color: #fbfbfb;">插入所有图片</a><a class="w-100" onclick=\"chaquan()\" style="background:var(--main);background-color:var(--theme);text-align:center; padding:5px 0; color:#fbfbfb;">插入所有非图片附件</a></div>');
    $('#tags').after('<div style="margin-top: 35px;" class="Posthelper"><ul style="border-radius:var(--radius)!important;list-style:none;min-height:100px;padding:6px 12px; max-height:240px;overflow:auto;background-color:var(--theme);margin-bottom:0;"><?php echo $taglist; ?></ul><a class="w-100" onclick=\"chatag()\" style="background:var(--main);background-color:var(--theme);text-align:center; padding:5px 0; color:#fbfbfb;">检测内容插入标签</a></div>');
  }); 
  </script>
<?php
    }
}
/* 初始化主题 */
function themeInit(Widget_Archive $archive)
{
  //暴力解决访问加密文章会被 pjax 刷新页面的问题
  if ($archive->hidden) header('HTTP/1.1 200 OK');
  Helper::options()->commentsMaxNestingLevels = 2;
  //强制评论关闭反垃圾保护
  Helper::options()->commentsAntiSpam = false;
  //将最新的评论展示在前
  Helper::options()->commentsOrder = 'DESC';
  //关闭检查评论来源URL与文章链接是否一致判断
  Helper::options()->commentsCheckReferer = false;
  // 强制开启评论markdown
  Helper::options()->commentsMarkdown = '1';
  Helper::options()->commentsHTMLTagAllowed .= '<img class src alt><div class>';
  //评论显示列表
  Helper::options()->commentsListSize = 5;
}
  
/* 获取资源路径 */
function _getAssets($assets, $type = true)
{
  $assetsURL = "";
  // 是否本地化资源
  if (Helper::options()->AssetsURL) {
    $assetsURL = Helper::options()->AssetsURL . '/' . $assets;
  } else {
    $assetsURL = Helper::options()->themeUrl . '/' . $assets;
  }
  if ($type) echo $assetsURL;
  else return  $assetsURL;
}
/* 获取列表缩略图 */
function _getThumbnails($item)
{
  $result = [];
  $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
  $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|jpeg|gif|png|webp))/i';
  $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|jpeg|gif|png|webp))/i';
  /* 如果填写了自定义缩略图，则优先显示填写的缩略图 */
  if ($item->fields->thumb) {
    $fields_thumb_arr = explode("\r\n", $item->fields->thumb);
    foreach ($fields_thumb_arr as $list) $result[] = $list;
  }
  /* 如果匹配到正则，则继续补充匹配到的图片 */
  if (preg_match_all($pattern, $item->content, $thumbUrl)) {
    foreach ($thumbUrl[1] as $list) $result[] = $list;
  }
  if (preg_match_all($patternMD, $item->content, $thumbUrl)) {
    foreach ($thumbUrl[1] as $list) $result[] = $list;
  }
  if (preg_match_all($patternMDfoot, $item->content, $thumbUrl)) {
    foreach ($thumbUrl[1] as $list) $result[] = $list;
  }
  /* 如果上面的数量不足3个，则直接补充3个随即图进去 */
  if (sizeof($result) < 3) {
    $custom_thumbnail = Helper::options()->Thumbnail;
    /* 将for循环放里面，减少一次if判断 */
    if ($custom_thumbnail) {
      $custom_thumbnail_arr = explode("\r\n", $custom_thumbnail);
      for ($i = 0; $i < 3; $i++) {
        $result[] = $custom_thumbnail_arr[array_rand($custom_thumbnail_arr, 1)] . "?key=" . mt_rand(0, 1000000);
      }
    } else {
      for ($i = 0; $i < 3; $i++) {
        $result[] = _getAssets('assets/thumb/' . rand(1, 42) . '.jpg', false);
      }
    }
  }
  return $result;
}

/**
 * 处理字符串超长问题
 */
function subText($text, $maxlen)
{
    if (mb_strlen($text) > $maxlen) {
        echo mb_substr($text, 0, $maxlen) . '...';
    } else {
        echo $text;
    }
}
/* 通过邮箱生成头像地址 
  <?php _getAvatarByMail($this->author->mail) ?>
  <?php _getAvatarByMail($comments->mail) ?>
*/
function _getAvatarByMail($mail)
{
  $gravatarsUrl = Helper::options()->CustomAvatarSource ? Helper::options()->CustomAvatarSource : 'https://gravatar.helingqi.com/wavatar/';
  $mailLower = strtolower($mail);
  $md5MailLower = md5($mailLower);
  $qqMail = str_replace('@qq.com', '', $mailLower);
  if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
    echo 'https://thirdqq.qlogo.cn/g?b=qq&nk=' . $qqMail . '&s=100';
  } else {
    echo $gravatarsUrl . $md5MailLower . '?d=mm';
  }
};
function get_comment_at($coid)
{//评论@函数
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ?', $coid));
    $parent = $prow['parent'];
    if (!empty($parent)) {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
if(!empty($arow['author'])){ $author = $arow['author'];
        $href   = '<a style="color:#A0CF1A;border-bottom:0;" class="text-xs px-1 bg-tertiaryA text-gray rounded " href="#comment-' . $parent . '">@' . $author . '</a> ';
        return $href;
}else { return '';}
    } else {
        return '';
    }
}
/**
 * 判断当前是菜单否激活
 * @param $self
 * @return string
 */
function isActiveMenu($self, $slug) : string {
    $activeMenuClass = " active ";
    // 检查当前页面是否是分类页面且slug匹配
    if ($self->is("category") && $self->getArchiveSlug() === $slug) {
        return $activeMenuClass;
    }
    // 检查当前页面是否是文章页面且文章属于给定的分类slug
    if ($self->is("post") && in_array($slug, array_column($self->categories, "slug"))) {
        return $activeMenuClass;
    }
    // 如果都不是，‌返回空字符串
    return "";
}

function tagCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*)')->from('table.metas')->where('type = ?', 'tag'));
    return $count['COUNT(*)'];
}
function theAllViews() {
    $db = Typecho_Db::get();
    $row = $db->fetchAll('SELECT SUM(VIEWS) FROM `typecho_contents`');
    return number_format($row[0]['SUM(VIEWS)']);
}

function greet() {
    $now = new DateTime(); // 获取当前时间
    $hour = $now->format('H'); // 获取当前小时数

    if ($hour < 12) {
        echo "早上好🌞！\n";
    } else if ($hour >= 12 && $hour < 18) {
        echo "下午好👋！\n";
    } else {
        echo "晚上好🌜！\n";
    }
}
// 获取月份
function getMonth() {
    $path = $_SERVER['PHP_SELF'];  // 获取路劲
    preg_match('/\d{4}\/\d{2}\/\d{2}|\d{4}\/\d{2}/', $path, $date);  // 匹配路劲中的日期
    if (is_array($date) && count($date)) {
        $date = explode('/', $date[0]);  // 如果匹配到就分割日期
    }else {
        $date = date('Y/m/d', time());  // 如果没有匹配到就获取当前月
        $date = explode('/', $date);  // 分割日期
    }
    return $date;
}

// 获取指定月份的文章
function getMonthPost() {
    $date = getMonth();  // 获取要查询文章的月份

    $start = $date[0] . '-' . $date[1] . '-01 00:00:00';  // 月的第一天
    $end = date('Y-m-t', strtotime($date[0] . '-' . $date[1] . '-' . '1 23:59:59'));  // 月最后一天
    $start = strtotime($start);  // 把月的第一天转换为时间戳
    $end = strtotime($end . ' 23:59:59');  // 把月的最后一天转换为时间戳
    $db = Typecho_Db::get();
    // 按照提供的月份查询出文件的时间
    $post = $db->fetchAll($db->select('table.contents.created')->from('table.contents')->where('created >= ?', $start)->where('created <= ?', $end)->where('type = ?', 'post')->where('status = ?', 'publish'));
    // 按照提供的月份查询前一个月的文章
    $previous = $db->fetchAll($db->select('table.contents.created')->from('table.contents')->where('created < ?', $start)->where('type = ?', 'post')->where('status = ?', 'publish')->offset(0)->limit(1)->order('created', Typecho_Db::SORT_DESC));
    // 按照提供的月份查询后一个月的文章
    $next = $db->fetchAll($db->select('table.contents.created')->from('table.contents')->where('created > ?', $end)->where('type = ?', 'post')->where('status = ?', 'publish')->offset(0)->limit(1)->order('created', Typecho_Db::SORT_ASC));

    if (count($next)) {
        $next = date('Y/m/', $next[0]['created']);  // 格式化前一个月的文章时间
    }

    if (count($previous)) {
        $previous = date('Y/m/', $previous[0]['created']);  // 格式化后一个月的文章时间
    }

    $day = array();
    foreach ($post as $val) {
        array_push($day, date('j', $val['created']));  // 把查询出的文章日加入数组
    }
    return array(
        'post'=> $day,
        'previous' => $previous,
        'next' => $next
    );
}

// 生成日历
function calendar($month, $url, $rewrite) {
    $monthArr = getMonth();  // 获取月份
    $post = getMonthPost();  // 获取文章日期

    // 判断是否启用了地址重写功能
    if ($rewrite) {
        $monthUrl = $url . $monthArr[0] . '/' . $monthArr[1] . '/';  // 生成日期链接前缀
        $previousUrl = is_array($post['previous'])?'':$url . $post['previous'];  // 生成前一个月的跳转链接地址
        $nextUrl = is_array($post['next'])?'':$url . $post['next'];  // 生成后一个月的跳转链接地址
    }else {
        $monthUrl = $url . 'index.php/' . $monthArr[0] . '/' . $monthArr[1] . '/';  // 生成日期链接前缀
        $previousUrl = is_array($post['previous'])?'':$url . 'index.php/' . $post['previous'];  // 生成前一个月的跳转链接地址
        $nextUrl = is_array($post['next'])?'':$url . 'index.php/' . $post['next'];  // 生成后一个月的跳转链接地址
    }

    $postCount = array_count_values($post['post']);  // 统计每天的文章数量

    $calendar = '';  // 初始化
    $week_arr = ['日', '一', '二', '三', '四', '五', '六'];  // 表头
    $this_month_days = (int)date('t', strtotime($month));  // 本月共多少天
    $this_month_one_n = (int)date('w', strtotime($month));  // 本月1号星期几
    $calendar .= '<table aria-label="' . $monthArr[0] . '年' . $monthArr[1] . '月日历" class="table table-bordered table-sm m-0"><thead><tr>';  // 表头

    foreach ($week_arr as $k => $v){
        if($k == 0){
            $class = ' class="sunday"';
        }elseif ($k == 6){
            $class = ' class="saturday"';
        }else{
            $class = '';
        }
        $calendar .= '<th class="day old weekend">' . $v . '</th>';
    }
    $calendar .= '</tr></thead><tbody>';
    // 表身
    // 计算本月共几行数据
    $total_rows = ceil(($this_month_days - (7 - $this_month_one_n)) / 7) + 1;
    $number = 1;
    $flag = 0;
    for ($row = 1;$row <= $total_rows;$row++){
        $calendar .= '<tr>';
        for ($week = 0;$week <= 6;$week ++){
            if($number < 10){
                $numbera = '0' . $number;
            }else{
                $numbera = $number;
            }

            if($number <= $this_month_days){
                if ($number < 10) {
                    $zero = '0';
                }else {
                    $zero = '';
                }

                if($row == 1){
                    if($week >= $this_month_one_n){
                        if (in_array($number, $post['post'])) {
                            $calendar .= '<td class="active day old weekend">' . '<a href="' . $monthUrl . $zero . $number . '/' . '" class="p-0" title="' . $postCount[$number] . '篇文章" data-toggle="tooltip" data-placement="top"><b>' . $number . '</b></a>' . '</td>';
                        }else {
                            $calendar .= '<td class="day old weekend">' . $number . '</td>';
                        }
                        $flag = 1;
                    }else{
                        $calendar .= '<td></td>';
                    }
                }else{
                    if (in_array($number, $post['post'])) {
                        $calendar .= '<td class="active day old weekend">' . '<a href="' . $monthUrl . $zero . $number . '/' . '" class="p-0" title="' . $postCount[$number] . '篇文章" data-toggle="tooltip" data-placement="top"><b>' . $number . '</b></a>' . '</td>';
                    }else {
                        $calendar .= '<td class="day old weekend">' . $number . '</td>';
                    }
                }
                if($flag){
                    $number ++;
                }
            }else{
                $calendar .= '<td></td>';
            }
        }
        $calendar .= '</tr>';
    }

    $calendar .= '</tbody></table>';

    return array(
        'calendar' => $calendar,
        'previous' => is_array($post['previous'])?false:$post['previous'],
        'next' => is_array($post['next'])?false:$post['next'],
        'previousUrl' => $previousUrl,
        'nextUrl' => $nextUrl
    );
}

function getMostVisitors($limit = 8, $adminEmail = null)
{
    if ($adminEmail === null && isset($this) && $this instanceof Widget_Interface) {
        $adminEmail = $this->author->mail;
    }

    $db = Typecho_Db::get();
    $sql = $db->select('COUNT(*) AS cnt', 'author', 'url', 'mail')
        ->from('table.comments')
        ->where('status = ?', 'approved')
        ->where('type = ?', 'comment')
        ->where('mail != ?', $adminEmail) // Exclude the current author
        ->group('mail')
        ->order('cnt', Typecho_Db::SORT_DESC)
        ->limit($limit);
    $result = $db->fetchAll($sql);

    if ($result) {
        $mostactive = '<ul class="friend-user">';
        foreach ($result as $value) {
            if (!$value['url']) {
                $value['url'] = 'mailto:' . $value['mail'];
            }
            $gravatarUrl = 'https://cravatar.cn/avatar/' . md5(strtolower($value['mail'])) . '?s=36&d=identicon&r=g';
            $mostactive .= '<li><a target="_blank" rel="nofollow" href="' . $value['url'] . '"><img src="' . $gravatarUrl . '" class="avatar avatar-lg"><strong>' . $value['author'] . '</strong></a></li>';
        }
        $mostactive .= '</ul>';
        echo $mostactive;
    }
}
