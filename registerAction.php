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
        $stmt = $mysqli->prepare("INSERT INTO members(name, surname, email, age, sex, country, city, postcode, password) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssisssis', $name,
            $surname,
            $email,
            $age,
            $sex,
            $country,
            $city,
            $postcode,
            $country);
        if ($stmt->execute()) {
            echo 'Registration Successful!';
            $stmt->close();
        } else {
            echo 'Registration Failed: Database error';
            $stmt->close();
        }
    }else{
        echo '<p>Registration failed due reasons below:</p>'.$errors;
    }

unset($_SESSION['captcha']);
?>