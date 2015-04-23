<!doctype html>
<html lang="en">
    <head>
        <meta charset="gbk">
        <title>后台登录</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <script type="text/javascript" src="/public/js/jquery.js"></script>
        <script type="text/javascript" src="/public/js/angular-1.0.1.min.js"></script>
      <script>
            var formApp = angular.module('formApp', []);

            function formController($scope, $http)
            {
                $scope.formData = {};

                // 处理表单
                $scope.processForm = function ()
                {
                    $http({
                        method: 'post',
                        url: '/admin/ajaxlogin',
                        data: $.param($scope.formData),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).success(
                            function (data)
                            {
                                console.log(data);
                                if (!data.success)
                                {
                                    $scope.errorName = data.errors.name;
                                    $scope.errorSuperhero = data.errors.superheroAlias;
                                }
                                else
                                {
                                    $scope.message = data.messages; // 提示验证成功

                                    //window.location = "http://www.angular.test/welcome.html";
                                }
                            }
                    );

                };

            }
        </script>
        <body ng-app="formApp" ng-controller="formController">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <!-- page title -->
                <div class="page-header">
                    <h1>Angular</h1>
                </div>

                <!-- messages -->
                <div id="messages" ng-show="message"  ng-hide="">{{message}}dfxxxxxdfgdfgddd</div>

                <form ng-submit="processForm()">
                    <!-- NAME -->
                    <div id="name-group" class="form-group" ng-class="{ 'has-error' : errorName }">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Bruce Wayne" ng-model="formData.name">
                        <span class="help-block" ng-show="errorName" ng-hide="">{{ errorName}}</span>
                    </div>

                    <!-- SUPERHERO NAME -->
                    <div id="superhero-group" class="form-group" ng-class="{ 'has-error' : errorSuperhero }">
                        <label>Superhero Alias</label>
                        <input type="text" name="superheroAlias" class="form-control" placeholder="Caped Crusader" ng-model="formData.superheroAlias">
                        <span class="help-block" ng-show="errorSuperhero"  ng-hide="">{{ errorSuperhero}}</span>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        <span class="glyphicon glyphicon-flash"></span> Submit!
                    </button>
                </form>

                <!-- SHOW DATA FROM INPUTS AS THEY ARE BEING TYPED -->
                <pre>
            {{ formData}}
                </pre>

            </div>
        </div>
    </body>
</html>