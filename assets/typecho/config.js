document.addEventListener('DOMContentLoaded', function() {
    var linkTags = document.getElementsByTagName('link');
    for (var i = 0; i < linkTags.length; i++) {
        if (linkTags[i].href.includes('style.css')) {
            document.head.removeChild(linkTags[i]);
            break;
        }
        if (linkTags[i].href.includes('grid.css')) {
            document.head.removeChild(linkTags[i]);
            break;
        }
    }
});
window.onload = function () {
    const span = document.querySelectorAll('.tabLinks'); // css选择器
    const div = document.querySelectorAll('.tabContent');
    
    // 初始时给第一个span和对应的div添加.active类名
    span[0].classList.add('active');
    div[0].classList.add('active');
    // 同时给body添加.open类名
    document.body.classList.add('open');

    for (let i = 0; i < span.length; i++) { // 循环span标签
        span[i].idx = i;
        span[i].onclick = function () {
            for (let j = 0; j < span.length; j++) { // 循环所有span标签
                span[j].classList.remove('active');
            }
            for (let j = 0; j < div.length; j++) { // 循环所有div标签
                div[j].classList.remove('active');
            }
            this.classList.add('active'); // 给当前点击的span增加active类名
            div[this.idx].classList.add('active'); // 给对应的div增加active类名

            // 如果当前点击的span不是第一个span，则移除body上的.open类名
            if (this.idx !== 0) {
                document.body.classList.remove('open');
            } else {
                // 如果当前点击的span是第一个span，则添加body上的.open类名
                document.body.classList.add('open');
            }
        }
    }
}

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


var handleProfileBox = function() {
    $(".button-toggle-menu").click(function() {
        $(".menuitem-active").toggleClass("active");
        $(".content-page").toggleClass("active");
        $("body").toggleClass("active");
    });
};


// 在文档加载完成后初始化
$(document).ready(function() {
    handleTheme();
    handleProfileBox();
});
$(document).ready(function() {
    $(".accordion-header").click(function() {
        // 首先，移除所有标题的.active类
        $(".accordion-header").removeClass("active");
        // 然后，给当前点击的标题添加.active类
        $(this).addClass("active");

        // 检查当前点击的标题下的内容是否已经可见
        if ($(this).next(".accordion-content").is(":visible")) {
            // 如果已经可见，则收起
            $(this).next(".accordion-content").slideUp();
        } else {
            // 如果不可见，则收起所有其他内容
            $(".accordion-content").slideUp();
            // 展开当前点击的标题下的内容
            $(this).next(".accordion-content").slideDown();
        }
    });
});