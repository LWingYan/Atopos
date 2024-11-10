<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
                <div class="footer home-footer bg ">
                    <div class="foot_left">
                        <img src="<?php _getAvatarByMail($this->author->mail) ?>" class="avatar avatar-lg" alt="<?php $this->author(); ?>">
                        <span style="font-size:1rem; margin-top: 0.5rem;"><?php $this->author(); ?></span>
                        <span><?php $this->options->description() ?></span>
                        <!-- 自定义添加左侧内容 -->
                        <?php if ($this->options->Footer_left): ?> 
                            <?php $this->options->Footer_left(); ?>
                        <?php endif;?>
                        
                    </div>
                    <div class="foot_right">
                        
                        <?php if ($this->options->Footer_right—icp): ?> 
                        <!-- ICP -->
                        <p><img src="<?php _getAssets('assets/img/icp.png'); ?>"> <a href="https://beian.miit.gov.cn/#/Integrated/index" target="_blank" ><?php $this->options->Footer_right—icp(); ?></a></p>
                        <?php endif;?>
                        
                        <?php if ($this->options->Footer_right—beian): ?> 
                        <!-- 公网安备 -->
                        <p><img src="<?php _getAssets('assets/img/beian.png'); ?>"> <a href="https://beian.mps.gov.cn/#/query/webSearch" target="_blank" ><?php $this->options->Footer_right—beian(); ?></a></p>
                        <?php endif;?>
                        <!-- 博主在线时间 -->
                        <p>💻️ <?php $this->author(); ?> <?php get_last_login(1); ?> 在线</p>
                        
                        <?php if($this->options->主题版权 == "one"): ?> 
                        <!-- 主题版权 -->
                        <p>💤 由<a href="https://typecho.org/" target="_blank" data-pjax-state=""> Typecho </a> 强力驱动, 搭配 <?php echo '<a href="//ouyu.me/" target="_blank">' . __THEME_NAME__ . '</a>&nbsp;'; ?>主题 </p>
                        <?php endif; ?>
                        
                        <!-- 自定义添加右侧内容 -->
                        <?php if ($this->options->Footer_right): ?> 
                            <?php $this->options->Footer_right(); ?>
                        <?php endif;?>
                        
                        <p class="copyright"><i class="ri-copyright-fill"></i> <?php echo date('Y'); ?> . <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> </p>
                        
                    </div>
                </div>
            </div>
            <!-- content-body  -->
        </div>
    </div>
    <!-- #main-wrapper -->
    
        <!-- outer-body -->
        <?php $this->need('public/Logout.php'); ?>
</body>
    <!-- 统计 -->
    <script src="<?php _getAssets('assets/js/echarts.min.js'); ?>"></script>
    <script src="<?php _getAssets('assets/js/census.min.js'); ?>"></script>
    <!-- 灯箱 -->
    <script src="<?php _getAssets('assets/js/view-image.min.js'); ?>"></script>
    <!-- 懒加载 -->
    <script src="<?php _getAssets('assets/js/lazysizes.js'); ?>"></script>
    <!-- 配置灯箱 -->
    <script>
        window.ViewImage && ViewImage.init('.post-content img , .comment-content img , .commentText img' );
    </script>
    <!-- 幻灯片 -->
    <script src="<?php _getAssets('assets/swiper/swiper-element-bundle.min.js'); ?>"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            autoplay: {
           delay: 2500,
         },
        });
    </script>
    <!-- 访客优化 -->
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipYXnSU0ygqeac2q7CVYMbh84q0uHVRRxEtvFPiQYbXWUorga2aqZJ0z"></script>
    <!-- 代码块 -->
    <script src="<?php _getAssets('assets/prism/prism.js'); ?>"></script>
    <!-- 全局 -->
    <script src="<?php _getAssets('assets/js/script.js'); ?>"></script>
    
    <script>
        const themeUrl = '<?php $this->options->themeUrl(); ?>';
    
        <?php $this->options->CustomScript() ?>
        
    </script>
    
    <?php $this->options->CustomBodyEnd() ?>
    
<?php $this->footer(); ?>