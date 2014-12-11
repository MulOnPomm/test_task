<?php
/**
 * Created by PhpStorm.
 * User: IBM-PC
 * Date: 10.12.2014
 * Time: 16:55
 */
session_start();
require('connect.php');

# Post variables
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$country = $_POST['country'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$country = $_POST['country'];
$captcha = $_POST['captcha'];

$errors = "";

    #Name variable validation
    if ($name == NULL || strlen($name) > 20 || !preg_match('/^[a-zA-ZÀ-ž -]*$/',$name)) {
        $errors .= '<p>* Inserted Name is invalid</p>';
    }

    #Surname variable validation
    if ($surname == NULL || strlen($surname) > 20 || !preg_match('/^[a-zA-ZÀ-ž -]*$/',$surname)) {
        $errors .= '<p>* Inserted Surname is invalid</p>';
    }

    #E-mail variable validation
    if ($email == NULL || strlen($email) > 30 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= '<p>* Inserted E-mail is invalid</p>';
    }

    #Ciy variable validation
    if ($city == NULL || strlen($city) > 20 || !preg_match('/^[a-zA-ZÀ-ž -]*$/',$city)) {
        $errors .= '<p>* Inserted City is invalid</p>';
    }

    #Postcode variable validation
    if ($postcode == NULL || strlen($postcode) > 10 || !preg_match('/^[0-9]*$/',$postcode)) {
        $errors .= '<p>* Inserted postcode is invalid</p>';
    }

    #Captcha variable validation
    if ($captcha != $_SESSION['code']) {
        $errors .= '<p>* Inserted captcha is invalid</p>';
    }

    #User registration
    if ($errors == NULL) {
        $password = randomPassword();
        $stmt = $mysqli->prepare("INSERT INTO members(name, surname, email, age, sex, country, city, postcode, password) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssisssis', $name,
            $surname,
            $email,
            $age,
            $sex,
            $country,
            $city,
            $postcode,
            $password);
        if ($stmt->execute()) {
            $stmt->close();
            echo 'Registration Successful!';
            sendRegistrationEmail($email, $name, $surname, $age, $sex, $country, $city, $postcode, $password);
        } else {
            echo 'Registration Failed: Database error';
            $stmt->close();
        }
    }else{
        echo '<p>Registration failed due reasons below:</p>'.$errors;
    }

    function randomPassword() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pass = array();
        $charsLength = strlen($chars) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $charsLength);
            $pass[] = $chars[$n];
        }
        return implode($pass);
    }

    function sendRegistrationEmail($email, $name, $surname, $age, $sex, $country, $city, $postcode, $password){
        $to = $email;
        $subject = "Registration Details!";

        $message = '
        <html>
        <head>
            <title>Thank you for registration</title>
        </head>
        <body>
            <p><h3>Thank you for registration!</h3></p>
            <p>See your registration details below</p>
            <table>
                <tr>
                    <td><b>Name</b></td>
                    <td>'.$name.'</td>
                </tr>
                <tr>
                    <td><b>Surname</b></td>
                    <td>'.$surname.'</td>
                </tr>
                <tr>
                    <td><b>E-mail</b></td>
                    <td>'.$email.'</td>
                </tr>
                 <tr>
                    <td><b>Age</b></td>
                    <td>'.$age.'</td>
                </tr>
                <tr>
                    <td><b>Sex</b></td>
                    <td>'.$sex.'</td>
                </tr>
                <tr>
                    <td><b>Country</b></td>
                    <td>'.$country.'</td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td>'.$city.'</td>
                </tr>
                <tr>
                    <td><b>Postcode</b></td>
                    <td>'.$postcode.'</td>
                </tr>
                <tr>
                    <td><b>Password</b></td>
                    <td>'.$password.'</td>
                </tr>
            </table>
        </body>
        </html>
        ';


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <webmaster@test.com>' . "\r\n";

        mail($to,$subject,$message,$headers);
    }

unset($_SESSION['captcha']);
?>