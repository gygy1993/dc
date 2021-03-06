<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>登录</title>
    <!-- Loading Bootstrap -->
    <link href="/Public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- customer -->
    <link href="/Public/css/main.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">
    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
<div class="message center-block" style="display: none">
    <h2></h2>
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><?php echo ($error); ?></strong>
    </div>
</div>
<form class="loginBox j-validator" method="post">

    <div class="form-group">
        <input type="text" name="username" class="form-control"  value="<?php echo ($username); ?>" placeholder="用户名" data-bv-notempty data-bv-notempty-message="用户名不能为空!">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" value="<?php echo ($password); ?>" placeholder="密码" data-bv-notempty data-bv-notempty-message="密码不能为空!">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">立即登录</button>
    </div>
    <div class="text-right"><a href="register" >立即注册</a></div>
</form>


<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="/Public/libs/jquery/jquery.1.11.3.min.js"></script>
<script src="/Public/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- plugins -->
<link rel="stylesheet" href="/Public/libs/plugins/bootstrapvalidator-master/dist/css/bootstrapValidator.min.css"/>
<script src="/Public/libs/plugins/bootstrapvalidator-master/dist/js/bootstrapValidator.min.js"></script>

<!-- 公共组件 -->
<script src="/Public/js/common.js"></script>

<script>
    var error = '<?php echo ($error); ?>';
    if (error){
        $(".message").show();
    }
</script>

</body>
</html>