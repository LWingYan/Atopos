<div style="" class="login-open">
    <div class="login-card">
        <div class="column">
            <h1>登陆</h1>
            <p>欢迎回来，请输入账号密码！</p>
            
            <form action="<?php $this->options->loginAction()?>" method="post" name="login" rold="form">
                
                <div class="form-item">
                    <input type="hidden" name="referer" class="form-element" value="<?php $this->options->siteUrl(); ?>">
                </div>
                <div class="form-item">
                    <input type="text" name="name" class="form-element" autocomplete="username" placeholder="请输入用户名" required/>
                </div>
                <div class="form-item">
                    <input type="password" name="password" class="form-element" autocomplete="current-password" placeholder="请输入密码" required/>
                </div>
                <div class="flex gap-2">
                    <button type="submit">登录</button>
                    <button type="button" class="login-no">取消</button>
                </div>
            </form>
        </div>
        <div class="column" style="--img: url('<?php $this->options->Logout(); ?>');">
            <h2><?php $this->options->title(); ?></h2>
            <p><?php $this->options->description() ?></p>
        </div>
    </div>
</div>