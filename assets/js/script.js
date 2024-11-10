/* ———————————————————————————————— 
    1. 博主                 
    2. 侧栏
    3. 登录
 ———————————————————————————————— */

var handleProfileBox = function() {
    $(".header-profile2 .header-info2").click(function() {
        $(".profile-box").toggleClass("active");
    });
    $(".open-cal").click(function() {
        $(".calendar-warpper").toggleClass("active");
    });
    $(".Logout-open").click(function() {
        $("body").toggleClass("active");
    });
    $(".login-no").click(function() {
        $("body").removeClass("active");
    });
};

/* ———————————————————————————————— 
    导航                 
 ———————————————————————————————— */

var menuActivator = {
    init: function() {
        // 获取当前页面的URL
        var currentUrl = window.location.href;
        // 遍历菜单项
        $("ul.dropdown-menu a").each(function() {
            // 如果菜单项的href与当前页面的URL相匹配
            if (this.href === currentUrl) {
                // 为菜单项添加'mm-active'类
                $(this).addClass("mm-active");
                // 为菜单项的父级元素添加'mm-active'类
                $(this).parent().addClass("mm-active");
                // 为当前菜单项的父级ul元素添加'open'类
                $(this).closest('ul.dropdown-menu').addClass('open');
            }
        });
    }
};

$(document).ready(function(){
    // 为一级分类的li元素添加点击事件
    $('#menu > li').click(function(e){
        // 阻止事件冒泡，避免触发二级分类的点击事件
        e.stopPropagation();

        // 检查当前点击的一级分类下是否有二级分类
        var hasSubmenu = $(this).find('ul').length > 0;

        // 如果有二级分类，则切换显示状态
        if(hasSubmenu){
            $(this).find('ul').slideToggle();
        }
    });

    // 点击其他地方时，关闭所有的二级导航
    $(document).click(function(){
        $('#menu ul ul').slideUp();
    });
});

var handleNavigation = function() {
	$(".nav-control").on('click', function() {

		$('#main-wrapper').toggleClass("menu-toggle");

		$(".hamburger").toggleClass("is-active");
	});
};
// 监听页面大小变化的函数
function updateSidebarStyle() {
    // 获取窗口宽度
    var width = window.innerWidth || document.documentElement.clientWidth;

    // 定义不同样式的阈值
    var fullThreshold = 1024; // 假设 1024px 以上为 full 样式
    var miniThreshold = 768;  // 假设 768px 以上且小于 1024px 为 mini 样式
    var overlayThreshold = 767; // 假设 768px 以下为 overlay 样式

    // 检查窗口宽度并设置相应的 data-sidebar-style 属性
    if (width >= fullThreshold) {
        document.body.setAttribute('data-sidebar-style', 'full');
    } else if (width >= miniThreshold) {
        document.body.setAttribute('data-sidebar-style', 'mini');
    } else {
        document.body.setAttribute('data-sidebar-style', 'overlay');
    }
}

// 在窗口加载完成后执行一次函数，以确保即使不触发 resize 事件也能设置正确的样式
updateSidebarStyle();

// 监听窗口大小变化事件
window.addEventListener('resize', updateSidebarStyle);

/* ———————————————————————————————— 
    初始化函数          
 ———————————————————————————————— */

$(document).ready(function() {
    handleProfileBox();
    handleNavigation();
    menuActivator.init();
});

/* ———————————————————————————————— 
    昼夜替换            
 ———————————————————————————————— */
var handleTheme = function() {
    if (jQuery('.dz-layout').length > 0) {
        // 检查本地存储中的主题版本
        var themeVersion = localStorage.getItem('themeVersion');
        
        // 根据主题版本设置 .dz-layout 的类名
        if (themeVersion === "dark") {
            $('.dz-layout').removeClass('light');
            $('.dz-layout').addClass('dark');
            jQuery('body').attr('data-theme-version', 'dark');
        } else {
            $('.dz-layout').removeClass('dark');
            $('.dz-layout').addClass('light');
            jQuery('body').attr('data-theme-version', 'light');
        }
        
        $('.dz-layout').on('click', function() {
            // 切换主题版本并保存到本地存储
            var isDark = $(this).hasClass('dark'); // 检查 .dz-layout 是否有 dark 类名
            var newVersion = isDark ? 'light' : 'dark'; // 确定新的主题版本
        
            // 更新 .dz-layout 的类名
            $(this).removeClass('dark light'); // 移除现有的类名
            $(this).addClass(newVersion); // 添加新的类名
        
            // 更新本地存储
            localStorage.setItem('themeVersion', newVersion);
        
            // 更新 body 的 data-theme-version 属性
            jQuery('body').attr('data-theme-version', newVersion);
        });
    }
};

// 在文档加载完成后初始化
$(document).ready(function() {
    handleTheme();
});

/* ———————————————————————————————— 
    实现返回顶部
 ———————————————————————————————— */
$(document)
  .ready(function() {
    // 获取.inner-body元素的引用
    var $innerBody = $('.inner-body');

    // 当.inner-body滚动时，更新返回顶部按钮上的数字
    $innerBody.scroll(function() {
      var scrollTop = $innerBody.scrollTop(); // 获取当前滚动条的位置
      var maxHeight = $innerBody[0].scrollHeight - $innerBody.height(); // 获取最大滚动高度
      var percentage = (scrollTop / maxHeight) * 100; // 计算下滑的百分比

      // 限制百分比的最大值为100
      percentage = Math.min(percentage, 100);

      if (scrollTop > 100) { // 如果用户滚动超过100px，则显示按钮
        $('#back-to-top')
          .fadeIn() // 淡入显示按钮
          .text(percentage.toFixed(0) + '%'); // 在按钮上显示下滑的百分比
      } else {
        $('#back-to-top')
          .fadeOut(); // 淡出隐藏按钮
      }
    });

    // 点击返回顶部按钮，平滑滚动到.inner-body的顶部
    $('#back-to-top')
      .click(function(e) {
        e.preventDefault(); // 阻止默认的跳转行为
        $innerBody.animate({
          scrollTop: 0
        }, 800); // 在800ms内滚动到顶部
      });
  });
  
/* ———————————————————————————————— 
    实现加载更多
 ———————————————————————————————— */
 
jQuery(document).ready(function($) {
  // 点击下一页的链接(即那个a标签)
  $('.next').click(function() {
    var $this = $(this);
    $this.addClass('loading').text('正在努力加载'); //给a标签加载一个loading的class属性，用来添加加载效果
    var href = $this.attr('href'); //获取下一页的链接地址
    if (href != undefined) { //如果地址存在
      $.ajax({ //发起ajax请求
        url: href,
        type: 'get',
        dataType: 'html', // 确保你期望的数据类型
        error: function(request) {
          //如果发生错误怎么处理
          $this.removeClass('loading').text('加载失败');
        },
        success: function(data) { //请求成功
          $this.removeClass('loading').text('点击查看更多'); //移除loading属性
          var $newContent = $(data).find('article'); //从数据中挑出文章数据，请根据实际情况更改
          if ($newContent.length) {
            // 将新内容插入到当前内容下方
            $newContent.hide().appendTo('.content').fadeIn(500); // 假设文章列表的容器类名为.posts-loop

            var newhref = $(data).find('.next').attr('href'); //找出新的下一页链接
            if (newhref != undefined) {
              $this.attr('href', newhref);
            } else {
              $this.after('<p class="text-xs" style="text-align: center;">没有了</p>');
              $this.remove(); //如果没有下一页了，隐藏
            }
            // 更新滚动位置到新内容
            var scrollAmount = $newContent.first().outerHeight(true) + 350; // 向下滚动新内容的高度加上一点额外的空间
            $('.inner-body').animate({
              scrollTop: $('.inner-body').scrollTop() + scrollAmount
            }, 600);
          } else {
            $this.removeClass('loading').text('没有更多内容');
          }
        }
      });
    }
    return false;
  });
});

/* ———————————————————————————————— 
    文章目录
 ———————————————————————————————— */
 
$(document)
  .ready(function() {
    let $stickyModule = $('#sticky');
    let $innerBody = $('.inner-body'); // 定义innerBody变量
    if ($stickyModule.length) {
      var stickyModuleOffset = $stickyModule.offset().top;
      var isSticky = false;

      function checkSticky() {
        var moduleRect = $stickyModule[0].getBoundingClientRect();
        var moduleWidth = moduleRect.width;
        if ($innerBody.scrollTop() > stickyModuleOffset) {
          if (!isSticky) {
            $stickyModule.css('width', moduleWidth).addClass('sticky');
            isSticky = true;
          }
        } else {
          if (isSticky) {
            $stickyModule.css('width', '').removeClass('sticky');
            isSticky = false;
          }
        }
      }
      $innerBody.on('scroll', function() {
        requestAnimationFrame(checkSticky);
      });

      // 监听滚动事件，更新目录项样式
      var $tocLinks = $('.toc-link');
      var $headers = $('.post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5');

      function scrollCheck() {
        var scrollTop = $innerBody.scrollTop();
        var activeIndex = -1;
        $headers.each(function(index) {
          if ($(this).offset().top - scrollTop < 40) {
            activeIndex = index;
          }
        });
        $tocLinks.removeClass('active');
        if (activeIndex >= 0) {
          $tocLinks.eq(activeIndex).addClass('active');
        } else {
          // 当没有找到高亮的标题时，默认高亮第一个目录项
          $tocLinks.eq(0).addClass('active');
        }
      }
      scrollCheck();
      $innerBody.on('scroll', function() {
        scrollCheck();
      });
    }
  });
