<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit" />
    <meta name="format-detection" content="email=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, shrink-to-fit=no, viewport-fit=cover">
    <link rel="shortcut icon" href="<?php $this->options->Favicon() ?>" />
    <title><?php $this->archiveTitle(array('category' => '分类 %s 下的文章', 'search' => '包含关键字 %s 的文章', 'tag' => '标签 %s 下的文章', 'author' => '%s 发布的文章'), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php if ($this->is('single')) : ?>
      <meta name="keywords" content="<?php echo $this->fields->keywords ? $this->fields->keywords : htmlspecialchars($this->_keywords); ?>" />
      <meta name="description" content="<?php echo $this->fields->description ? $this->fields->description : htmlspecialchars($this->_description); ?>" />
      <?php $this->header('keywords=&description='); ?>
    <?php else : ?>
      <?php $this->header(); ?>
    <?php endif; ?>
    
    <?php
        $fontUrl = $this->options->CustomFont ?? ''; // 使用空字符串作为默认值
        $fontFormat = '';
        
        if (strpos($fontUrl, 'woff2') !== false) {
            $fontFormat = 'woff2';
        } elseif (strpos($fontUrl, 'woff') !== false) {
            $fontFormat = 'woff';
        } elseif (strpos($fontUrl, 'ttf') !== false) {
            $fontFormat = 'truetype';
        } elseif (strpos($fontUrl, 'eot') !== false) {
            $fontFormat = 'embedded-opentype';
        } elseif (strpos($fontUrl, 'svg') !== false) {
            $fontFormat = 'svg';
        }
        
    ?>
    <style>
      @font-face {
        font-family: 'wodeziti';
        font-weight: 400;
        font-style: normal;
        font-display: swap;
        src: url('<?php echo $fontUrl ?>');
        <?php if ($fontFormat) : ?>src: url('<?php echo $fontUrl ?>') format('<?php echo $fontFormat ?>');
        <?php endif; ?>
      }
      @font-face{
        font-family: 'zql Font';
        src:  url('//jsd.cdn.zzko.cn/gh/LWingYan/photos@latest/zql.woff');
        src:  url('//jsd.cdn.zzko.cn/gh/LWingYan/photos@latest/zql.woff2');
        }
        
      body {
        <?php if ($fontUrl) : ?>
        font-family: 'wodeziti';
        <?php else : ?>
        font-family: 'zql Font','Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif;
        <?php endif; ?>
      }
      <?php $this->options->CustomCSS() ?>
    </style>
    <script>
        window.Kepler = {
            BASE_API: `<?php echo $this->options->rewrite == 0 ? Helper::options()->rootUrl . '/index.php/Kepler/api' : Helper::options()->rootUrl . '/Kepler/api' ?>`,

        }
    </script>
    <?php if ($this->options->Favicon()) : ?>
    <link rel="shortcut icon" href="<?php $this->options->Favicon() ?>" />
    <?php else : ?>
    <link rel="shortcut icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text x=%22-0.125em%22 y=%22.9em%22 font-size=%2290%22>💤</text></svg>" />
    <?php endif; ?>
    <!-- 全局 -->
    <link href="<?php _getAssets('assets/css/style.css'); ?>" rel="stylesheet" />
    <!-- 幻灯片 -->
    <link rel="stylesheet" href="<?php _getAssets('assets/swiper/swiper-bundle.min.css'); ?>"/>
    <!-- 代码块 -->
    <link href="<?php _getAssets('assets/prism/prism.min.css'); ?>" rel="stylesheet" />
    <!-- 音乐 -->
    <link href="<?php _getAssets('assets/aplayer/APlayer.min.css'); ?>" rel="stylesheet" />
    <!-- icon -->
    <link href="https://jsd.onmicrosoft.cn/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <!-- 统计 -->
    <link href="<?php _getAssets('assets/css/census.min.css'); ?>" rel="stylesheet"/>
    <?php $this->options->CustomHeadEnd() ?>
    <!-- 全靠jquery -->
    <script src="<?php _getAssets('assets/js/jquery.min.js'); ?>"></script>
</head>
<body>
    <div id="main-wrapper">
        
        <!--**********************************
                        Nav header          
        ***********************************-->
        
        <div class="nav-header">
            <a href="<?php $this->options->siteUrl(); ?>" class="brand-logo">
                <?php if ($this->options->LOGO): ?> 
                <img class="logo-abbr" src="<?php $this->options->LOGO(); ?>" width="51" height="51"> 
                <?php else: ?>
				<img class="logo-abbr" src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/10/1986006616.png" width="51" height="51">
                <?php endif;?>
                
                <?php if ($this->options->LOGO): ?> 
                <h3 class="brand-title"><?php $this->options->NAME(); ?></h3>
                <?php else: ?>
				<h3 class="brand-title">OUYU.ME</h3>
				<?php endif;?>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
                </div>
            </div>
        </div>
        
        <!--**********************************
                        Header               
        ***********************************-->
        
        <?php $this->need('public/header.php'); ?>
        
        <!--**********************************
                        Sidebar
        ***********************************-->
        
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
                            
                            <div class="menu-icon">
                                <i class="ri-home-4-line"></i>
                            </div>
                                
                            <span class="nav-text"><?php _e('首页'); ?></span>
                        </a>
                    </li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li>
                        <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
                            <div class="menu-icon">
                                <?php if ($pages->fields->page_icon): ?> 
                                <?php $pages->fields->page_icon(); ?> 
                                <?php else: ?>
                                <i class="ri-zzz-line"></i>
                                <?php endif;?>
                            </div>
                            <span class="nav-text"><?php $pages->title(); ?></span>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                    <?php while($categorys->next()): ?>                        
                    <?php if ($categorys->levels === 0): ?>
                    <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                    <?php if (empty($children)) { ?>
                    <li class="header__nav-item">  
                        <a href="<?php $categorys->permalink(); ?>" class="header__nav-link">
                            <div class="menu-icon">
                                <?php if ($categorys->description): ?> 
                                <?php $categorys->description(); ?> 
                                <?php else: ?>
                                <i class="ri-zzz-line"></i>
                                <?php endif;?>
                            </div>
                            <span class="nav-text">
                                <?php $categorys->name(); ?>
                            </span>
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="header__nav-item">
                        <a class="has-arrow dropdown-toggle header__nav-link" href="javascript:void(0);" aria-expanded="true" role="button" id="dropdownMenuProjects" data-toggle="dropdown" aria-haspopup="true">
                            <div class="menu-icon">
                                <?php if ($categorys->description): ?> 
                                <?php $categorys->description(); ?> 
                                <?php else: ?>
                                <i class="ri-zzz-line"></i>
                                <?php endif;?>
                            </div>  
                            <span class="nav-text">
                                <?php $categorys->name(); ?>
                            </span>
                        </a>
                    <ul class="dropdown-menu header__dropdown-menu left mm-collapse " aria-expanded="false" >
                    <li class="mini-dashboard"><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></li>
                    <?php foreach ($children as $mid) { ?>
                    <?php $child = $categorys->getCategory($mid); ?>
                    <li><a href="<?php echo $child['permalink'] ?>"><?php echo $child['name']; ?></a></li>
                    <?php } ?>
                    </ul></li>
                    <?php } ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>