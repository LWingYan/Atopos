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
            
            <?php if ($this->options->Gg一): ?> 
            <!-- 广而告之 -->
            <div class="card w-full bg card-header gg" style="height:100px;">
                <span>广告</span>
                <img src="<?php $this->options->Gg一(); ?>" width="100%" height="100px">
            </div>
            <?php endif;?>
            
            <!--文章-->
            <div class="card w-full bg post-article">
                <div class="article-top">
                    <div class="info" style="text-align:center;">
                        <h1><?php $this->title() ?></h1>
                        <span><?php $this->date(); ?></span>
                    </div>
                    
                </div>
                <div class="post-content">
                    <?php article_changetext($this, $this->user->hasLogin()) ?>
                </div>
            </div>

            <?php if ($this->options->Gger): ?> 
            <!-- 广而告之 -->
            <div class="card w-full bg card-header gg" style="height:100px;">
                <span>广告</span>
                <img src="<?php $this->options->Gger(); ?>" width="100%" height="100px">
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

    
