<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form action="registerAction.php" method="post" ng-app="" ng-controller="validateController" name="registerForm" class="form-horizontal" novalidate>
            <fieldset>
                <legend>Register</legend>

                <!-- Name-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Name</label>
                    <div class="col-md-3">
                        <input id="name" type="text" class="form-control input-md" name="name" ng-model="name" ng-maxlength=20 ng-pattern="/^[a-zA-ZÀ-ž -]*$/" placeholder="Name" required>
                        <p class="help-block"><span style="color:red" ng-show="registerForm.name.$dirty && registerForm.name.$invalid"><span ng-show="registerForm.name.$error.required">Name is required.</span><span ng-show="registerForm.name.$error.pattern">Name must contain only alphabetic letters.</span><span ng-show="registerForm.name.$error.maxlength">Name too long.</span></span></p>
                    </div>
                </div>

                <!-- Surname-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="surname">Surname</label>
                    <div class="col-md-3">
                        <input id="surname" type="text" class="form-control input-md" name="surname" ng-model="surname" ng-maxlength=20 ng-pattern="/^[a-zA-ZÀ-ž -]*$/" placeholder="Surname" ng-pattern="[a-zA-Z]" required>
                        <span class="help-block"><span style="color:red" ng-show="registerForm.surname.$dirty && registerForm.surname.$invalid"><span ng-show="registerForm.surname.$error.required">Surname is required.</span><span ng-show="registerForm.surname.$error.pattern">Surname must contain only alphabetic letters.</span><span ng-show="registerForm.surname.$error.maxlength">Surname too long.</span></span></span>
                    </div>
                </div>

                <!-- E-mail-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>
                    <div class="col-md-3">
                        <input id="email" type="email" class="form-control input-md" name="email" ng-model="email" ng-maxlength=30 placeholder="E-mail" required>
                        <span class="help-block"><span style="color:red" ng-show="registerForm.email.$dirty && registerForm.email.$invalid"><span ng-show="registerForm.email.$error.required">Email is required.</span><span ng-show="registerForm.email.$error.email">Invalid email address.</span><span ng-show="registerForm.email.$error.maxlength">E-mail too long.</span></span></span>
                    </div>
                </div>

                <!-- Age -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="age">Age</label>
                    <div class="col-md-3">
                        <select id="age" name="age" class="form-control">
                            <?php echo getAges();?>
                        </select>
                    </div>
                </div>

                <!-- Sex -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="sex">Sex</label>
                    <div class="col-md-3">
                        <select id="sex" name="sex" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <!-- Country -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="country">Country</label>
                    <div class="col-md-3">
                        <select id="country" name="country" class="form-control">
                            <?php include('html/countries.html'); ?>
                        </select>
                    </div>
                </div>

                <!-- City-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="city">City</label>
                    <div class="col-md-3">
                        <input id="city" type="text" class="form-control input-md" name="city" ng-model="city" ng-maxlength=20 ng-pattern="/^[a-zA-ZÀ-ž -]*$/" placeholder="City" ng-pattern="[a-zA-Z]" required>
                        <span class="help-block"><span style="color:red" ng-show="registerForm.city.$dirty && registerForm.city.$invalid"><span ng-show="registerForm.city.$error.required">City is required.</span><span ng-show="registerForm.city.$error.pattern">City must contain only alphabetic letters.</span><span ng-show="registerForm.city.$error.maxlength">City too long.</span></span></span>
                    </div>
                </div>

                <!-- Postcode-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="postcode">Postcode</label>
                    <div class="col-md-3">
                        <input id="postcode" type="number" class="form-control input-md" name="postcode" ng-model="postcode" ng-maxlength=10 placeholder="Postcode" required >
                        <span class="help-block"><span style="color:red" ng-show="registerForm.postcode.$dirty && registerForm.postcode.$invalid"><span ng-show="registerForm.postcode.$error.required">Postcode is required.</span><span ng-show="registerForm.postcode.$error.email">Invalid postcode.</span><span ng-show="registerForm.postcode.$error.maxlength">Postcode too long.</span></span></span>
                    </div>
                </div>

                <!-- Captcha-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="captcha">Captcha</label>
                    <div class="col-md-3">
                        <input id="captcha" type="text" class="form-control input-md" name="captcha" ng-model="captcha" placeholder="Enter the code below" required>
                        <span class="help-block"><p><img src="captcha/captcha.php" /></p><span style="color:red" ng-show="registerForm.captcha.$dirty && registerForm.captcha.$invalid"><span ng-show="registerForm.captcha.$error.required">Captcha is required.</span></span></span>
                    </div>
                </div>

                <!--Submit -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-3">
                        <input id="singlebutton" type="submit" class="btn btn-primary" value="Register" ng-disabled="registerForm.name.$invalid || registerForm.surname.$invalid || registerForm.city.$invalid || registerForm.postcode.$invalid ||registerForm.captcha.$invalid || registerForm.email.$invalid">
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</body>
</html>
<?php

    function getAges(){
        $ages = 0;
        for ($x = 18; $x <= 65; $x++) {
            $ages .= '<option value="'.$x.'">'.$x.'</option>';
        }
    return $ages;
    }

?>

    <script>
        function validateController($scope) {
            $scope.name = '';
            $scope.surname = '';
            $scope.email = '';
            $scope.city = '';
            $scope.postcode = '';
            $scope.captcha = '';
        }
    </script>
