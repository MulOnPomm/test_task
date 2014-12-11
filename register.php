<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <meta charset="UTF-8">
</head>
<body>
    <p><h2>Register</h2></p>
    <form action="registerAction.php" method="post" ng-app="" ng-controller="validateController" name="registerForm" novalidate>
        <table border = 0>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" ng-model="name" ng-maxlength=10 ng-pattern="/^[a-zA-ZÀ-ž -]*$/" placeholder="Name" required></td>
                <td><span style="color:red" ng-show="registerForm.name.$dirty && registerForm.name.$invalid"><span ng-show="registerForm.name.$error.required">Name is required.</span><span ng-show="registerForm.name.$error.pattern">Name must contain only alphabetic letters.</span><span ng-show="registerForm.name.$error.maxlength">Name too long.</span></span></td>
            </tr>
            <tr>
                <td>Surname</td>
                <td><input type="text" name="surname" ng-model="surname" ng-maxlength=10 ng-pattern="/^[a-zA-ZÀ-ž -]*$/" placeholder="Surname" ng-pattern="[a-zA-Z]" required></td>
                <td><span style="color:red" ng-show="registerForm.surname.$dirty && registerForm.surname.$invalid"><span ng-show="registerForm.surname.$error.required">Surname is required.</span><span ng-show="registerForm.surname.$error.pattern">Surname must contain only alphabetic letters.</span><span ng-show="registerForm.surname.$error.maxlength">Surname too long.</span></span></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" ng-model="email" ng-maxlength=10 placeholder="E-mail" required></td>
                <td><span style="color:red" ng-show="registerForm.email.$dirty && registerForm.email.$invalid"><span ng-show="registerForm.email.$error.required">Email is required.</span><span ng-show="registerForm.email.$error.email">Invalid email address.</span><span ng-show="registerForm.email.$error.maxlength">E-mail too long.</span></span></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><select name="age"><?php echo getAges();?></select></td>
                <td></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td><select name="sex"><option value="male">Male</option><option value="female">Female</option></select></td>
                <td></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php include('html/countries.html'); ?></td>
                <td></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" ng-model="city" ng-maxlength=10 ng-pattern="/^[a-zA-ZÀ-ž -]*$/" placeholder="City" ng-pattern="[a-zA-Z]" required></td>
                <td><span style="color:red" ng-show="registerForm.city.$dirty && registerForm.city.$invalid"><span ng-show="registerForm.city.$error.required">City is required.</span><span ng-show="registerForm.city.$error.pattern">City must contain only alphabetic letters.</span><span ng-show="registerForm.city.$error.maxlength">City too long.</span></span></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input type="number" name="postcode" ng-model="postcode" ng-maxlength=10 placeholder="Postcode" required ></td>
                <td><span style="color:red" ng-show="registerForm.postcode.$dirty && registerForm.postcode.$invalid"><span ng-show="registerForm.postcode.$error.required">Postcode is required.</span><span ng-show="registerForm.postcode.$error.email">Invalid postcode.</span><span ng-show="registerForm.postcode.$error.maxlength">Postcode too long.</span></span></td>
            </tr>
            <tr>
                <td rowspan="2">Captcha</td>
                <td><input type="text" name="captcha" ng-model="captcha" placeholder="Enter the code below" required></td>
                <td><span style="color:red" ng-show="registerForm.captcha.$dirty && registerForm.captcha.$invalid"><span ng-show="registerForm.captcha.$error.required">Captcha is required.</span></span></td>
            </tr>
            <tr>
                <td>Captcha</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Register" ng-disabled="registerForm.name.$invalid || registerForm.surname.$invalid || registerForm.city.$invalid || registerForm.postcode.$invalid ||registerForm.captcha.$invalid || registerForm.email.$invalid"></td>
            </tr>
        </table>

    </form>
</body>
</html>
<?php

    function getAges(){
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
