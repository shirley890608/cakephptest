function InvoiceCntl($scope)
{
	$scope.qty = 1;
	$scope.cost = 19.95;
}

/*表单  --start*/
function Controller($scope)
{
  $scope.master= {};

  $scope.update = function(user)
  {
    $scope.master= angular.copy(user);
  };

  $scope.reset = function()
  {
    $scope.user = angular.copy($scope.master);
  };
  $scope.reset();
}

/*表单  --end*/

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
                'userpassword': $('input[name=userpassword]').val()
            };

            // process the form
            $.ajax({
                type: 'post',
                url: '/admin/ajaxlogin',
                data: formData,
                dataType: 'json',
                success: function (data) {

                    // 输出日志信息到控制台
                   console.log(data);

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

    

