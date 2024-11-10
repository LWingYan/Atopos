<!-- 首页统计 -->
<div class="flex gap-2 w-full">
                <div class="flex gap-5 w-full wap:grid">
                    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                    <div class="flex flex-wrap gap-2 w-full">
                                <div class="flex w-full gap-2">
                                    <div class="card bg-primary-light card-body depostit-card  w-full">
                                        <div class="card-header depostit-card-media relative">
                                            <h6 class="font-w400 mb-0">全部文章</h6>
                                            <h3><?php $stat->publishedPostsNum() ?></h3>
                                            <i class="ri-article-line absolute " style="color:#2c311d;top: 10px;right: 20px;font-size: 32px;"></i>
                                        </div>
                                    </div>
                                    <div class="card bg-danger-light card-body depostit-card w-full">
                                        <div class="card-header depostit-card-media relative">
                                            <h6 class="font-w400 mb-0">评论总数</h6>
                                            <h3><?php $stat->publishedCommentsNum() ?></h3>
                                            <i class="ri-message-3-line absolute " style="color:#2c311d;top: 10px;right: 20px;font-size: 32px;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex w-full gap-2">
                                    <div class="card bg-info-light card-body depostit-card  w-full">
                                        <div class="card-header depostit-card-media relative">
                                            <h6 class="font-w400 mb-0">标签总数</h6>
                                            <h3><?php echo tagCount();?></h3>
                                            <i class="ri-price-tag-3-line absolute " style="color:#2c311d;top: 10px;right: 20px;font-size: 32px;"></i>
                                        </div>
                                    </div>
                                    <div class="card bg-warning-light card-body depostit-card w-full">
                                        <div class="card-header depostit-card-media relative">
                                            <h6 class="font-w400 mb-0">访问总数</h6>
                                            <h3><?php echo theAllViews();?></h3>
                                            <i class="ri-fire-line absolute" style="color:#2c311d;top: 10px;right: 20px;font-size: 32px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="card census__basic-item category w-full">
                        <?php $this->widget('Widget_Metas_Category_List')->to($item); ?>
                        <ul>
                            <?php while ($item->next()) : ?>
                            <li data-name="<?php $item->name() ?>" data-value="<?php $item->count() ?>"></li>
                            <?php endwhile; ?>
                        </ul>
                        <div id="category"></div>
                    </div>
                </div>
            </div>