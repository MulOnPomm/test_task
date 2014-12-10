<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <p><h2>Register</h2></p>
    <form action="registerAction.php" method="post">
        <table border = 0>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Surname</td>
                <td><input type="text" name="surname"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><select name="age"><?php echo getAges();?></select></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td><select name="sex"><option value="sex">Select Gender</option><option value="male">Male</option><option value="female">Female</option></select></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php include('html/countries.html'); ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input type="text" name="postcode"></td>
            </tr>
            <tr>
                <td>Captcha</td>
                <td><input type="text" name="captcha"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Register"></td>
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
