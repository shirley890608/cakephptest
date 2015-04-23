<!doctype html>
<html lang="en">
    <head>
        <meta charset="gbk">
        <title>后台登录</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <script type="text/javascript" src="/public/js/jquery.js"></script>
    <body>
     <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <!-- page title -->
                <div class="page-header">
                    <h1>后台管理系统</h1>
                </div>

                <!-- messages -->
                <div id="messages"></div>

                <!-- form -->
                <form method="post">
                    <!-- name -->
                    <div id="name-group" class="form-group">
                        <label>姓 名</label>
                        <input type="text" id="username" name="name" class="form-control" placeholder="<?php echo __('Please input username');?>">
                        <span class="help-block"></span>
                    </div>

                    <!-- user password -->
                    <div id="userpwd-group" class="form-group">
                        <label>密 码</label>
                        <input type="password" id="userpassword" name="userpassword" class="form-control" placeholder="<?php echo __('Please input userpwd');?>">
                        <span class="help-block"></span>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        提交
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
<script>
     $(document).ready(function () {
        // process the form
        $('form').submit(function (event) {
            // remove the past errors
            $('#name-group').removeClass('has-error');
            $('#name-group .help-block').empty();
            $('#userpwd-group').removeClass('has-error');
            $('#userpwd-group .help-block').empty();

            // remove success messages
            $('#messages').removeClass('alert alert-success').empty();

            // get the form data
            var formData = {
                'name': $('#username').val(),
                'userpassword': $('#userpassword').val()
            };

            // process the form
            $.ajax({
                type: 'post',
                url: '/admin/ajaxlogin',
                data: formData,
                dataType: 'json',
                success: function (data) {

                    // 输出日志信息到控制台
                   //console.log(data);

                    // 如果验证失败
                    // 提示错误信息
                    if (!data.success) {

                        if (data.errors.name) {
                            $('#name-group').addClass('has-error'); //错误类
                            $('#name-group .help-block').html(data.errors.name); //显示错误信息
                        }

                        if (data.errors.userpassword) {
                            $('#userpwd-group').addClass('has-error');
                            $('#userpwd-group .help-block').html(data.errors.userpassword);
                        }
                        
                    } else {
                        // 验证成功
                       // $('#messages').addClass('alert alert-success').append('<p>' + data.messages + '</p>');
                        window.location.href = '/admin';
                    }
                }
            });

            // stop the form from submitting and refreshing
            event.preventDefault();
        });
    });


</script>
