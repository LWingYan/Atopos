<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<style>
    <?php $this->fields->CustomCSS() ?>
</style>
<div class="outer-body ">
    <div class="content-body inner-body box-warpper">
        <div class="container-fluid ">
            
            <?php if ($this->options->Gg四): ?> 
            <!-- 广而告之 -->
            <div class="card w-full bg card-header gg" style="height:100px;">
                <span>广告</span>
                <img src="<?php $this->options->Gg四(); ?>" width="100%" height="100px">
            </div>
            <?php endif;?>
            
            <!--文章-->
            <div class="card w-full bg post-article">
                <div class="article-top">
                    <img src="<?php echo _getThumbnails($this)[0] ?>" width="100%" height="140px">
                    <div class="info">
                        <h1><?php $this->title() ?></h1>
                        <span><?php $this->author(); ?></span> · <span><?php $this->date(); ?></span>
                    </div>
                    
                </div>
                <div class="post-content">
                    <?php article_changetext($this, $this->user->hasLogin()) ?>
                </div>
            </div>

            <?php if ($this->options->Gg五): ?> 
            <!-- 广而告之 -->
            <div class="card w-full bg card-header gg" style="height:100px;">
                <span>广告</span>
                <img src="<?php $this->options->Gg五(); ?>" width="100%" height="100px">
            </div>
            <?php endif;?>
            
            <!--评论-->
            <?php $this->need('comments.php'); ?>
        </div>
        <?php $this->need('sidebar.php'); ?>
        <script>
            <?php $this->fields->CustomScript() ?>
        </script>
        <?php $this->need('footer.php'); ?>
    </div>
    
</div>

    
