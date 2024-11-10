<?php
class EchoHtml extends Typecho_Widget_Helper_Layout {
	public function __construct($html) {
		$this->html($html);
		$this->start();
		$this->end();
	}
	public function start() {
	}
	public function end() {
	}
}
//主题静态资源的绝对地址
function themeConfig($form)
{
    ?>
    <link rel="stylesheet" href="<?php _getAssets('assets/typecho/config.css'); ?>">
    <link href="https://jsd.onmicrosoft.cn/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <script src="<?php _getAssets('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php _getAssets('assets/typecho/config.js'); ?>"></script>
    <script src="<?php _getAssets('assets/js/view-image.min.js'); ?>"></script>
    <script>
        window.ViewImage && ViewImage.init('.accordion-content img');
    </script>
    <?php 
        
    //侧边导航
    $form->addItem(new EchoHtml('<div class="wrapper">'));
        
        $form->addItem(new EchoHtml('<div class="tab leftside-menu menuitem-active">'));
        
            $form->addItem(new EchoHtml('<p class="side-nav-title">分类</p>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-zzz-line"></i><span>关于主题</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-tools-line"></i><span>基础设置</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-home-2-line"></i><span>首页设置</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-layout-bottom-2-line"></i><span>底部设置</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-planet-line"></i><span>开发设置</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-mail-settings-line"></i><span>邮箱设置</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-more-2-line"></i><span><span>更多设置</span></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><i class="ri-megaphone-line"></i><span><span>广告设置</span></div>'));
            
            $form->addItem(new EchoHtml('<p class="side-nav-title">其他</p>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><a href="./themes.php"><i class="ri-shirt-line"></i><span>切换外观</span></a></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><a href="./theme-editor.php"><i class="ri-code-s-slash-line"></i><span>编辑外观</span></a></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><a href="./write-post.php"><i class="ri-edit-2-line"></i><span>撰写新文</span></a></div>'));
            $form->addItem(new EchoHtml('<div class="tabLinks side-nav-item"><a href="./manage-posts.php"><i class="ri-article-line"></i><span>管理文章</span></a></div>'));
            
            $form->addItem(new EchoHtml('<p class="side-nav-title">设置</p>'));
            
            $form->addItem(new EchoHtml('<div class="side-nav-item flex between-center">
											<span class="ms-2">昼夜切换</span>
											<div class="dz-layout dark">
												<i class="sun">☀️</i>
												<i class="moon">🌙</i>
											</div>
										</div>'));
			    
            
        $form->addItem(new EchoHtml('</div>'));
        
        $form->addItem(new EchoHtml('<div class="content-page">'));
            $form->addItem(new EchoHtml('<br><div class="button-toggle-menu">
                                            <i class="ri-menu-2-fill"></i>
                                        </div>'));
                                        
            $form->addItem(new EchoHtml('<div class="bg-flower">
                                            <img src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/11/897619571.png">
                                        </div>
                                        <div class="bg-flower-2">
                                            <img src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/11/4053881463.png">
                                        </div>'));
            
            // 关于主题
            $form->addItem(new EchoHtml('<div class="none tabContent ">'));
            
                $form->addItem(new EchoHtml('<div class="alert alert-primary alert-dismissible text-bg-primary border-0 fade show" role="alert"><strong>通知 - </strong> 以下 <b style="color:red">注意事项</b> 必看 ! ! !</div>'));
                $form->addItem(new EchoHtml('<div class="accordion">'));
                    $form->addItem(new EchoHtml('<h3 class="accordion-header active">注意事项</h3>'));
                    $form->addItem(new EchoHtml('<div class="accordion-content" style="display:block;">
                                                    <p>防止不必要的问题您需满足以下环境条件：Typecho1.2.1、MySQL5+、PHP>=8.0；为了保证使用体验，请使用服务器部署。</p>
                                                    <p>主题自用随意修改，但二次修改后请勿售出！模板许可移植任何平台。</p>
                                                    <p><b style="color:rgb(109 160 156);">导航图标: </b> 请在设置新分类时在分类描述填写图标代码，否则默认使用主题图标。格式:&lt;i&gt; xxx &lt;/i&gt; 比如：&lt;i class="ri-zzz-line"&gt;&lt;/i&gt; 再比如&lt;i&gt; 💤 &lt;/i&gt;</p>
                                                    <p><b style="color:rgb(109 160 156);">文章缩略图: </b>文件夹assets/thumb里没有图片的话请填写基础设置里的自定义缩略图。 （默认文件夹是空的）</p>
                                                    <p><b style="color:rgb(109 160 156);">右侧自定义: </b>可以在开发设置里的自定义CSS里添加.sidebar-none{display:none;}去掉右侧栏的全部东西，然后在添加侧栏内容里自由发挥。</p>
                                                    <p><b style="color:rgb(109 160 156);">链接/友链处理: </b>写一个新的页面，直接使用链接。如下图(点击图片可放大)：<br><img src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/11/4280744769.png" height="180px"> 浏览该页面会发现页面标题和时间碍眼，这个时候就可以在自定义字段自定义CSS框里添加.article-top .info{display:none;}去掉头部标题等内容。</p>
                                                    <p><b style="color:rgb(109 160 156);">遇到 BUG 处理: </b>前往<a href="https://ouyu.me/">偶遇博客</a>留言您所遇到的BUG问题，如果您是位大佬并且把发现的BUG修复，请在博客关于里找寻邮箱留言您所修复的BUG文件。</p>
                                                    <p>到此结束了请食用愉快！</p>
                                                    <p>
                                                    附上收款码，说不定就有好心人赐杯奶茶喝。
                                                        <img src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/10/3925282529.png" height="200px">
                                                        <img src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/10/1167228765.png" height="200px">
                                                    </p>
                                                </div>'));
                    $form->addItem(new EchoHtml('<h3 class="accordion-header">文件介绍</h3>'));
                    $form->addItem(new EchoHtml('<div class="accordion-content"">
                                                       <p>· / - index 首页</p>
                                                       <p>· / - footer 底部</p>
                                                       <p>· / - header 左栏</p>
                                                       <p>· / - sidebar 侧栏</p>
                                                       <p>· / - public/sticy 首页文章置顶</p>
                                                       <p>· / - public/census 首页统计内容</p>
                                                       <p>· / - public/header 首页头部导航</p>
                                                       <p>· / - public/Logout 管理员登入插件</p>
                                                </div>'));
                $form->addItem(new EchoHtml('</div>'));
                
                $name = "Atopos";
$db = Typecho_Db::get();
if (isset($_POST['type'])) {
    if ($_POST["type"] == "备份设置") {
        $value = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name))['value'];
        if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . '_backup'))) {
            $db->query($db->update('table.options')->rows(array('value' => $value))->where('name = ?', 'theme:' . $name . '_backup')); ?>
            <script>
                alert("备份更新成功！");
                window.location.href = '<?php Helper::options()->adminUrl('options-theme.php'); ?>'
            </script>
        <?php } else { ?>
            <?php
            if ($value) {
                $db->query($db->insert('table.options')->rows(array('name' => 'theme:' . $name . '_backup', 'user' => '0', 'value' => $value)));
            ?>
                <script>
                    alert("备份成功！");
                    window.location.href = '<?php Helper::options()->adminUrl('options-theme.php'); ?>'
                </script>
            <?php }
        }
    }
    if ($_POST["type"] == "还原备份") {
        if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . '_backup'))) {
            $_value = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . '_backup'))['value'];
            $db->query($db->update('table.options')->rows(array('value' => $_value))->where('name = ?', 'theme:' . $name)); ?>
            <script>
                alert("还原成功！");
                window.location.href = '<?php Helper::options()->adminUrl('options-theme.php'); ?>'
            </script>
        <?php } else { ?>
            <script>
                alert("未备份过数据，无法恢复！");
                window.location.href = '<?php Helper::options()->adminUrl('options-theme.php'); ?>'
            </script>
        <?php } ?>
    <?php } ?>
    <?php if ($_POST["type"] == "删除备份") {
        if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . '_backup'))) {
            $db->query($db->delete('table.options')->where('name = ?', 'theme:' . $name . '_backup')); ?>
            <script>
                alert("删除成功");
                window.location.href = '<?php Helper::options()->adminUrl('options-theme.php'); ?>'
            </script>
        <?php } else { ?>
            <script>
                alert("没有备份内容，无法删除！");
                window.location.href = '<?php Helper::options()->adminUrl('options-theme.php'); ?>'
            </script>
        <?php } ?>
    <?php } ?>
<?php } ?>
<?php
echo '<div class="backup" style="">
    <form class="backup" action="?Atopos_backup" method="post" style="display: flex;gap: 0.5rem;">
        <span><input type="submit" name="type" value="备份设置" /></span>
        <span><input type="submit" name="type" value="还原备份" / style="border: 1px solid rgb(229 233 0)"></span>
        <span><input type="submit" name="type" value="删除备份" / style="border: 1px solid rgb(233 0 0);"></span>
    </form>
    </div>';
            $form->addItem(new EchoHtml('</div>'));
            //基础设置
            $form->addItem(new EchoHtml('<div class="none tabContent">'));
            
                //站标设置
                $Favicon = new Typecho_Widget_Helper_Form_Element_Text('Favicon', NULL, NULL, _t('博客ICO'), _t('请输入博客ICO地址'));
                $form->addInput($Favicon);
                
                $LOGO = new Typecho_Widget_Helper_Form_Element_Text('LOGO', NULL, NULL, _t('博客LOGO'), _t('请输入博客 LOGO 链接'));
                $form->addInput($LOGO);
                
                $NAME = new Typecho_Widget_Helper_Form_Element_Text('NAME', NULL, 'OUYU.ME', _t('LOGO旁的标题'), _t('请输入要显示博客LOGO旁边的标题'));
                $form->addInput($NAME);
                
                $Logout = new Typecho_Widget_Helper_Form_Element_Text('Logout', NULL, 'https://www.dmoe.cc/random.php', _t('登录显示的图片'), _t('请输入弹出登录时旁边会显示的图片链接'));
                $form->addInput($Logout);
      
                // 自定义头像源
                $CustomAvatarSource = new Typecho_Widget_Helper_Form_Element_Text(
                'CustomAvatarSource',
                NULL,
                NULL,
                '自定义头像源（非必填）',
                '介绍：用于修改全站头像源地址 <br>
                     例如：https://gravatar.ihuan.me/avatar/ <br>
                     其他：非必填，默认头像源为https://gravatar.helingqi.com/wavatar/ <br>
                     注意：填写时，务必保证最后有一个/字符，否则不起作用！'
                );
                $form->addInput($CustomAvatarSource);
                
                //静态资源
                $AssetsURL = new Typecho_Widget_Helper_Form_Element_Text(
                    'AssetsURL',
                    NULL,
                    NULL,
                    '自定义静态资源CDN地址（非必填）',
                    '介绍：自定义静态资源CDN地址，不填则走本地资源 <br />
                     教程：<br />
                     1. 将整个assets目录上传至你的CDN <br />
                     2. 填写静态资源地址访问的前缀 <br />
                     3. 例如：https://npm.elemecdn.com/typecho'
                );
                $form->addInput($AssetsURL);
                
                $Thumbnail = new Typecho_Widget_Helper_Form_Element_Textarea(
                    'Thumbnail',
                    NULL,
                    'https://www.dmoe.cc/random.php',
                    '自定义缩略图',
                    '介绍：用于修改主题默认缩略图 <br/>
                         格式：图片地址，一行一个 <br />
                         注意：不填写时，则使用主题内置的默认缩略图
                         '
                );
                $form->addInput($Thumbnail);

      
            $form->addItem(new EchoHtml('</div>'));
    
            //首页设置
            $form->addItem(new EchoHtml('<div class="none tabContent">'));
            
                $首页样式 = new Typecho_Widget_Helper_Form_Element_Select('首页样式', array('one' => '样式一（默认）', 'two' => '样式二'), 'one', '首页文章样式', '介绍：切换首页文章列表样式');
                $form->addInput($首页样式->multiMode());
            
                // 推荐文章
                $sticky = new Typecho_Widget_Helper_Form_Element_Text(
                    'sticky',
                    NULL,
                    NULL,
                    '首页置顶文章（非必填）',
                    '介绍：填写显示前头的文章Id，多的使用||隔开，比如 1 || 2。广告文章不允许置顶'
                );
                $form->addInput($sticky);
                
                $stickyzdy = new Typecho_Widget_Helper_Form_Element_Textarea(
                    'stickyzdy',
                    NULL,
                    '<span style="color:red">置顶</span>',
                    '自定义置顶（必填）',
                    '介绍：自定义置顶样式，支持使用HTML。'
                );
                $form->addInput($stickyzdy);
                
                $Index_Links = new Typecho_Widget_Helper_Form_Element_Textarea(
                'Index_Links',
                NULL,
                NULL,
                '首页友链',
                '介绍：用于显示首页友链，请务必填写正确的格式 <br />
                     格式：图片地址 || 跳转链接 || 标题 （中间使用两个竖杠分隔）<br />
                     其他：一行一个，一行代表一个友链 <br />
                     例如：<br />
                        https://puui.qpic.cn/media_img/lena/PICykqaoi_580_1680/0 || https://baidu.com || 百度一下 <br />
                        https://puui.qpic.cn/tv/0/1223447268_1680580/0 || https://v.qq.com || 腾讯视频
                     '
                  );
                  $form->addInput($Index_Links);

                
            $form->addItem(new EchoHtml('</div>'));
            
            //底部设置
            $form->addItem(new EchoHtml('<div class="none tabContent">'));
            
                // 增加底部内容
                $Footer_left = new  Typecho_Widget_Helper_Form_Element_Textarea('Footer_left', NULL, NULL, _t('自定义增加底部左边内容（非必填）'), _t('可以添加统计代码等可以使用HTML来实现！！！'));
                $form->addInput($Footer_left);
                
                $Footer_right—icp = new  Typecho_Widget_Helper_Form_Element_Text('Footer_right—icp', NULL, NULL, _t('底部右侧边ICP（非必填）'), _t('显示在底部右侧栏，备案必填！'));
                $form->addInput($Footer_right—icp);
                
                $Footer_right—beian = new  Typecho_Widget_Helper_Form_Element_Text('Footer_right—beian', NULL, NULL, _t('底部右侧边公安备案（非必填）'), _t('显示在底部右侧栏，备案必填！'));
                $form->addInput($Footer_right—beian);
                
                $主题版权 = new Typecho_Widget_Helper_Form_Element_Select('主题版权', array('one' => '显示（默认）', 'two' => '不显示'), 'one', '显示主题版权', '底部右侧是否显示主题版权');
                $form->addInput($主题版权->multiMode());
                
                $Footer_right = new  Typecho_Widget_Helper_Form_Element_Textarea('Footer_right', NULL, NULL, _t('自定义增加底部右侧边内容（非必填）'), _t('可以添加统计代码等可以使用HTML来实现！！！<br>在版权上方显示 当然可以添加css把版权去掉。<br>.copyright{display:none;}'));
                $form->addInput($Footer_right);
                
                
                
            $form->addItem(new EchoHtml('</div>'));
            
            // 开发设置
            $form->addItem(new EchoHtml('<div class="none tabContent">'));
            
                // 侧栏添加自定义内容
                $sidebar = new  Typecho_Widget_Helper_Form_Element_Textarea('sidebar', NULL, NULL, _t('添加侧栏内容（非必填）'), _t('侧栏添加新内容，支持使用HTML代码！'));
                $form->addInput($sidebar);
            
                // 自定义CSS
                $CustomCSS = new  Typecho_Widget_Helper_Form_Element_Textarea('CustomCSS', NULL, NULL, _t('自定义CSS（非必填）'), _t('请填写自定义CSS内容，填写时无需填写style标签！！！'));
                $form->addInput($CustomCSS);
                
                // 增加css链接
                $CustomHeadEnd = new  Typecho_Widget_Helper_Form_Element_Textarea('CustomHeadEnd', NULL, NULL, _t('自定义增加&lt;head&gt;&lt;/head&gt;里内容（非必填）'), _t('此处用于在&lt;head&gt;&lt;/head&gt;标签里增加自定义内容！！！'));
                $form->addInput($CustomHeadEnd);
                
                // 自定义js
                $CustomScript = new Typecho_Widget_Helper_Form_Element_Textarea(
                'CustomScript',
                NULL,
                NULL,
                '自定义JS（非必填）',
                '介绍：请填写自定义JS内容，例如网站统计等，填写时无需填写script标签。'
              );
              $form->addInput($CustomScript);
     
                // 增加js链接
                $CustomBodyEnd = new Typecho_Widget_Helper_Form_Element_Textarea(
                'CustomBodyEnd',
                NULL,
                NULL,
                '自定义&lt;body&gt;&lt;/body&gt;末尾位置内容（非必填）',
                '介绍：此处用于填写在&lt;body&gt;&lt;/body&gt;标签末尾位置的内容 <br>
                     例如：可以填写引入第三方js脚本等等'
              );
              $form->addInput($CustomBodyEnd);
                
            $form->addItem(new EchoHtml('</div>'));
            
            // 邮箱设置
            $form->addItem(new EchoHtml('<div class="none tabContent">'));
                // 邮件通知
                $JCommentMail = new Typecho_Widget_Helper_Form_Element_Select('JCommentMail', array('off' => '关闭（默认）', 'on' => '开启'), 'off', '是否开启评论邮件通知', '介绍：开启后评论内容将会进行邮箱通知 <br />
                     注意：此项需要您完整无错的填写下方的邮箱设置！！ <br />
                     其他：下方例子以QQ邮箱为例，推荐使用QQ邮箱');
                $form->addInput($JCommentMail->multiMode());
                // 邮箱服务器地址
                $JCommentMailHost = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailHost', NULL, NULL, '邮箱服务器地址', '例如：smtp.qq.com');
                $form->addInput($JCommentMailHost->multiMode());
                $JCommentSMTPSecure = new Typecho_Widget_Helper_Form_Element_Select('JCommentSMTPSecure', array('ssl' => 'ssl（默认）', 'tsl' => 'tsl'), 'ssl', '加密方式', '介绍：用于选择登录鉴权加密方式');
                $form->addInput($JCommentSMTPSecure->multiMode());
                $JCommentMailPort = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailPort', NULL, NULL, '邮箱服务器端口号', '例如：465');
                $form->addInput($JCommentMailPort->multiMode());
                $JCommentMailFromName = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailFromName', NULL, NULL, '发件人昵称', '例如：帅气的象拔蚌');
                $form->addInput($JCommentMailFromName->multiMode());
                $JCommentMailAccount = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailAccount', NULL, NULL, '发件人邮箱', '例如：2323333339@qq.com');
                $form->addInput($JCommentMailAccount->multiMode());
                $JCommentMailPassword = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailPassword', NULL, NULL, '邮箱授权码', '介绍：这里填写的是邮箱生成的授权码 <br>
                     获取方式（以QQ邮箱为例）：<br>
                     QQ邮箱 > 设置 > 账户 > IMAP/SMTP服务 > 开启 <br>
                     其他：这个可以百度一下开启教程，有图文教程');
                $form->addInput($JCommentMailPassword->multiMode());
                
            $form->addItem(new EchoHtml('</div>'));
            // 更多设置
            $form->addItem(new EchoHtml('<div class="none tabContent">'));
                // 字体设置
                $CustomFont = new Typecho_Widget_Helper_Form_Element_Text('CustomFont', NULL, NULL, _t('自定义网站字体（非必填）'), _t('字体URL链接（推荐使用woff格式的字体，网页专用字体格式），字体文件一般有几兆，建议使用cdn链接！！！'));
                $form->addInput($CustomFont);
                
                
            $form->addItem(new EchoHtml('</div>'));
            
             // 广告设置
            $form->addItem(new EchoHtml('<div class="none tabContent ">'));
            
                $Gg一 = new Typecho_Widget_Helper_Form_Element_Text('Gg一', NULL, NULL, _t('顶部广告（非必填）'), _t('首页和页面顶部广告链接，介意使用高度＜=100px的图片。'));
                $form->addInput($Gg一);
                
                $Gger = new Typecho_Widget_Helper_Form_Element_Text('Gger', NULL, NULL, _t('低部广告（非必填）'), _t('首页和页面底部广告链接，介意使用高度＜=100px的图片。'));
                $form->addInput($Gger);
                
                $Gg三 = new Typecho_Widget_Helper_Form_Element_Text('Gg三', NULL, NULL, _t('侧栏广告（非必填）'), _t('侧栏广告链接，介意使用高度＜=150px的图片。'));
                $form->addInput($Gg三);
                
                $Gg四 = new Typecho_Widget_Helper_Form_Element_Text('Gg四', NULL, NULL, _t('文章页头部广告（非必填）'), _t('文章页头部广告链接，介意使用高度＜=100px的图片。'));
                $form->addInput($Gg四);
                
                $Gg五 = new Typecho_Widget_Helper_Form_Element_Text('Gg五', NULL, NULL, _t('文章页头部广告（非必填）'), _t('文章页底部广告链接，介意使用高度＜=100px的图片。'));
                $form->addInput($Gg五);
                    
            $form->addItem(new EchoHtml('</div>'));
            
            
            $form->addItem(new EchoHtml('<button class="btn btn-outline-primary rounded-pill button-toggle-themes">保存</button>'));
        
        $form->addItem(new EchoHtml('</div>'));
        
       
        
    //结束
    $form->addItem(new EchoHtml('</div>'));
    
}