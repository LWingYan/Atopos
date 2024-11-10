<div class="calendar-warpper ">
    <div class="bg card event-scroll dz-scroll">
        <div class="sidebar-none">
            <?php if ($this->is('post')) : ?>
            
            <?php if($this->fields->article_type == "article") { ?><!-- 文章样式实现 -->
                <!-- 目录 -->
                <div id="widget-toc">
                    <h3 class="title">目录</h3>
                    <section class="widget toc" id="sticky">
                        <div class="widget-toc">
                            <?php echo generateToc($this->content); ?>
                        </div>
                    </section>
                </div>
                <!-- tags -->
                <div class="">
                    <section class="post-tags">
                        <?php if ($this->tags): ?>
                        
                        <h3 class="title">标签</h3>
                        <div class="post-tags flex gap-2 flex-wrap ">
                        <?php foreach ($this->tags as $tag): ?>
                            <div class="article-tags text-xs">
                            <?php $count = getTagCount($tag['mid']); ?>
                                <a href="<?php echo $tag['permalink']; ?>">#<?php echo $tag['name']; ?></a> <span class="article-tags-num "><?php echo $count; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </section>
                </div>
                <?php }?><!-- 文章样式实现结束 -->
            
            <?php else: ?>
            
            <section class="calendar mwordstar-block">
                <?php $date = getMonth(); ?>
                <div class="table-condensed">
                    <?php $calendar = calendar($date[0] . '-' . $date[1] . '-01', $this->options->siteUrl, $this->options->rewrite); ?>
                    <?php echo $calendar['calendar']; ?>
                    <nav class="calendar_bottom" aria-label="上个月及下个月">
                        <?php if ($calendar['previous']): ?>
                            <a class="p-0 float-left" href="<?php echo $calendar['previousUrl']; ?>"><i class="ri-corner-left-up-line"></i><?php echo date('m月', strtotime($calendar['previous'] . '01')); ?></a>
                        <?php endif; ?>
                        <h4 class="picker-switch"><?php echo $date[0] . '年' . $date[1] . '月'; ?></h4>
                        <?php if ($calendar['next']): ?>
                            <a class="p-0 float-right"  href="<?php echo $calendar['nextUrl']; ?>"><i class="ri-corner-right-down-line"></i><?php echo date('m月', strtotime($calendar['next'] . '01')); ?></a>
                        <?php endif; ?>
                    </nav>
                </div>
            </section>
            
            <?php endif; ?>
            
            <?php if ($this->options->Gg三): ?> 
            <!-- 广而告之 -->
            <section class="gg my-1">
                <div class="w-full bg gg" style="height:150px;">
                    <span>广告</span>
                    <img src="<?php $this->options->Gg三(); ?>" width="100%" height="150px">
                </div>
            </section>
            <?php endif;?>
            
            <section id="reader-wall">
                <h3 class="title">最常来的</h3>
                <ul class='readers-list gap-2'>
                    <?php getMostVisitors(8, $this->author->mail); ?>
                </ul>
            </section>
    
        </div>
        
        <!-- 添加更多内容 -->
        <?php $this->options->sidebar(); ?>
        
    </div>
</div>