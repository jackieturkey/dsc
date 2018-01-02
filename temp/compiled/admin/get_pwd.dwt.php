<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>找回密码</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validation.min.js"></script>
    <script type="text/javascript" src="../js/jquery.SuperSlide.2.1.1.js"></script>
</head>

<body>
<div class="backPwd_layout">
    <?php if ($this->_var['form_act'] == "forget_pwd"): ?>
    <form action="get_password.php" method="post" id="theForm">
        <div class="backPwd_form">
            <div class="title">找回密码</div>
            <div id="error"></div>
            <div class="formInfo">
                <div class="formText">
                    <input type="text" name="user_name" autocomplete="off" class="input-text" value="" placeholder="输入管理员账号" />
                </div>
                <div class="formText">
                    <input type="text" name="email" autocomplete="off" class="input-text" value="" placeholder="输入电子邮箱" />
                </div>
                <div class="formText btn_div">
                    <input type="submit" name="submit" onclick="send_validate()" class="sub" value="找回密码" />
                    <input type="button" name="qx" class="cancel" value="取消" />
                </div>
                <div class="formText">
                    <a href="privilege.php?act=login" class="return">返回登录</a>
                </div>
            </div>
        </div>
        <input type="hidden" name="action" value="get_pwd" />
        <input type="hidden" name="act" value="forget_pwd" />
    </form>

    <script type="text/javascript">
        /*  @author-bylu 找回密码输入验证 start  */
        $('#theForm input[name=submit]').on('click',function(){
            var username=true;
            var email=true;

            if($('#theForm input[name=user_name]').val() == ''){
                $('#error').html('<span class="error_msg">管理员用户名不能为空!</span>');
                $('#theForm input[name=user_name]').focus();
                username = false;
                return false;
            }

            if($('#theForm input[name=email]').val() == ''){
                $('#error').html('<span class="error_msg">邮箱不能为空!</span>');
                $('#theForm input[name=email]').focus();
                email = false;
                return false;
            }

            if(CheckMail($('#theForm input[name=email]').val()) == false){
                $('#error').html('<span class="error_msg">邮箱格式不正确!</span>');
                $('#theForm input[name=email]').focus();
                email = false;
                return false;
            }

            function CheckMail(mail) {
                var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (filter.test(mail)) return true;
                else {
                    return false;}
            }


            if(username && email){
                $('#theForm').submit();
            }else{
                return false;
            }
        });
        /*  @author-bylu  end  */
    </script>

    <?php endif; ?>

    <?php if ($this->_var['form_act'] == "reset_pwd"): ?>

    <form action="get_password.php" method="post" id="theForm">
        <div class="backPwd_form">
            <div class="title">重置密码</div>
            <div id="error"></div>
            <div class="formInfo">
                <div class="formText">
                    <input type="password"   style="display:none"/> 
                    <input type="password" name="password" autocomplete="off" class="input-text" value="" placeholder="输入新密码" />
                </div>
                <div class="formText">
                    <input type="password" name="confirm_pwd" autocomplete="off" class="input-text" value="" placeholder="确认密码" />
                </div>
                <div class="formText btn_div">
                    <input type="submit" name="submit" onclick="reset_validate()" class="sub" value="确定" />
                    <input type="button" name="qx" class="cancel" value="取消" />
                </div>
                <div class="formText">
                    <a href="privilege.php?act=login" class="return">返回登录</a>
                </div>
            </div>
        </div>
        <input type="hidden" name="action" value="reset_pwd" />
        <input type="hidden" name="act" value="forget_pwd" />
        <input type="hidden" name="adminid" value="<?php echo $this->_var['adminid']; ?>" />
        <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
    </form>

    <script type="text/javascript">
        /*  @author-bylu 重置密码输入验证 start  */
        $('#theForm input[name=submit]').on('click',function(){
            var password=true;
            var confirm_pwd=true;

            if($('#theForm input[name=password]').val() == ''){
                $('#error').html('<span class="error_msg">新密码不能为空!</span>');
                $('#theForm input[name=password]').focus();
                password = false;
                return false;
            }

            if($('#theForm input[name=confirm_pwd]').val() == ''){
                $('#error').html('<span class="error_msg">确认密码不能为空!</span>');
                $('#theForm input[name=confirm_pwd]').focus();
                confirm_pwd = false;
                return false;
            }

            if($('#theForm input[name=confirm_pwd]').val() != $('#theForm input[name=password]').val()){
                $('#error').html('<span class="error_msg">2次密码不一致!</span>');
                $('#theForm input[name=confirm_pwd]').focus();
                confirm_pwd = false;
                return false;
            }

            if(password && confirm_pwd){
                $('#theForm').submit();
            }else{
                return false;
            }
        });
        /*  @author-bylu  end  */
    </script>
    <?php endif; ?>
</div>
<div id="bannerBox">
    <ul id="slideBanner" class="slideBanner">
        <li><img src="images/banner_1.jpg"></li>
        <li><img src="images/banner_2.jpg"></li>
        <li><img src="images/banner_3.jpg"></li>
        <li><img src="images/banner_4.jpg"></li>
        <li><img src="images/banner_5.jpg"></li>
    </ul>
</div>
<script type="text/javascript">
    $("#bannerBox").slide({mainCell:".slideBanner",effect:"fold",interTime:3500,delayTime:500,autoPlay:true,autoPage:true,endFun:function(i,c,s){
        $(window).resize(function(){
            var width = $(window).width();
            var height = $(window).height();
            s.find(".slideBanner,.slideBanner li").css({"width":width,"height":height});
        });
    }});
</script>
</body>
</html>
