<?php
/**
 *  无法被归类的 独特的存在 
 *
 * @package Atopos
 * @author 林孽
 * @version 1.2
 * @link //ouyu.me
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$this->need('public/sticy.php');
?>

<div class="outer-body ">
    <div class="content-body inner-body box-warpper">
        <div class="container-fluid ">
            <?php $this->need('public/census.php'); ?>
            <div class="card w-full bg card-header flex gap-2 items-center md:grid">
                <div class="left w-full">
                    <h3 class="title"><?php $this->options->title(); ?></h3>
                    <p class="desc"><i class="ri-chat-3-line"></i> <?php $this->options->description() ?></p>
                </div>
                <div class="w-full right ">
                    <div>😄</div>
                    <h5>Hi~ 朋友 ！</h5>
                    <div><?php greet();?></div>
                </div>
            </div>
            
            <?php if ($this->options->Gg一): ?> 
            <!-- 广而告之 -->
            <div class="card w-full bg card-header gg" style="height:100px;">
                <span>广告</span>
                <img src="<?php $this->options->Gg一(); ?>" width="100%" height="100px">
            </div>
            <?php endif;?>
            
            <!--文章列表-->
            <div class="grid cardtype relative post_card content <?php if($this->options->首页样式 == "two") { ?> two <?php }?>">
                <?php if ($this->have()): ?>
                <?php while($this->next()): ?>
                <?php if($this->options->首页样式 == "one") { ?><!-- 首页样式一 -->
                    <?php if($this->fields->article_type == "gg") { ?><!-- 广告样式 -->
                    <article class="card w-full bg card-header posts-loop">
                        <div class="card-top gg">
                            <a href="<?php $this->fields->gglinks(); ?>"><img src="<?php $this->fields->ggimg(); ?>" height="268px" class="w-full"></a>
                            <span>广告</span>
                        </div>
                    </article>
                    <?php } else {?><!-- 默认样式 -->
                    <article class="card w-full bg card-header posts-loop">
                    <div class="card-top">
                        <img src="<?php echo _getThumbnails($this)[0] ?>" height="160px" class="w-full">
                    </div>
                    <div class="card-bottm">
                        <h3 class="ell">
                            <?php $this->sticky(); ?> <a href="<?php $this->permalink() ?>" alt="<?php $this->title() ?>"><?php $this->title() ?></a>
                        </h3>
                        <div class="tags ell">
                            <?php
                                echo $this->tags(' ', true, '暂无标签', function($tag) {
                                    return '<a href="' . htmlspecialchars($tag['permalink'], ENT_QUOTES, 'UTF-8') . '" itemprop="url"># ' . htmlspecialchars($tag['name'], ENT_QUOTES, 'UTF-8') . '</a> ';
                                });
                            ?>
                            
                        </div>
                        <div class="category ell">
                            <?php $this->category(''); ?>
                        </div>
                    </div>
                </article>
                    <?php }?>
                        
                <?php } else {?><!-- 首页样式二 -->
                    <?php if($this->fields->article_type == "gg") { ?><!-- 广告样式 -->
                    <article class="card w-full bg card-header posts-loop two">
                        <div class="card-top gg">
                            <a href="<?php $this->fields->gglinks(); ?>"><img src="<?php $this->fields->ggimg(); ?>" height="100%" class="w-full gg"></a>
                            <span>广告</span>
                        </div>
                    </article>
                    <?php } else {?><!-- 默认样式 -->
                    <article class="card w-full bg card-header posts-loop two">
                        <div class="flex gap-2 flex-reverse" style="height:100%;align-items:center;">
                            <img src="<?php echo _getThumbnails($this)[0] ?>" height="100%" width="120px">
                            <div class="card-bottm">
                                <h3 class="ell">
                                    <?php $this->sticky(); ?> <a href="<?php $this->permalink() ?>" alt="<?php $this->title() ?>"><?php $this->title() ?></a>
                                </h3>
                                <div class="tags ell">
                                    <?php
                                        echo $this->tags(' ', true, '暂无标签', function($tag) {
                                            return '<a href="' . htmlspecialchars($tag['permalink'], ENT_QUOTES, 'UTF-8') . '" itemprop="url"># ' . htmlspecialchars($tag['name'], ENT_QUOTES, 'UTF-8') . '</a> ';
                                        });
                                    ?>
                                    
                                </div>
                                <div class="category ell">
                                    <?php $this->category(''); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php }?>
                <?php }?>
                <?php endwhile; ?>
                <?php else: ?>暂无文章<?php endif; ?>
            </div>
                
            <center class="decoration fz-12 my-1"><?php $this->pageLink('点击查看更多','next');?></center>

            <?php if ($this->options->Gger): ?> 
            <!-- 广而告之 -->
            <div class="card w-full bg card-header gg" style="height:100px;">
                <span>广告</span>
                <img src="<?php $this->options->Gger(); ?>" width="100%" height="100px">
            </div>
            <?php endif;?>
            
            <!-- 首页友链 -->
            <?php
              $carousel = [];
              $carousel_text = $this->options->Index_Links;
              if ($carousel_text) {
                $carousel_arr = explode("\r\n", $carousel_text);
                if (count($carousel_arr) > 0) {
                  for ($i = 0; $i < count($carousel_arr); $i++) {
                    $img = explode("||", $carousel_arr[$i])[0];
                    $url = explode("||", $carousel_arr[$i])[1];
                    $title = explode("||", $carousel_arr[$i])[2];
                    $carousel[] = array("img" => trim($img), "url" => trim($url), "title" => trim($title));
                  };
                }
              }
            ?>
            <?php if ($this->options->Index_Links): ?> 
            <div class="Index_Links my-1">
                <?php foreach ($carousel as $item) : ?>
                    <a href="<?php echo $item['url'] ?>" title="<?php echo $item['title'] ?>" target="_blank">
                        <img src="<?php echo $item['img'] ?>">
                        <span><?php echo $item['title'] ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif;?>
        </div>
        <?php $this->need('sidebar.php'); ?>
        
        <?php $this->need('footer.php'); ?>
    </div>
    
</div>

    
