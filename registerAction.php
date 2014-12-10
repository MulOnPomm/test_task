<?php
/**
 * Created by PhpStorm.
 * User: IBM-PC
 * Date: 10.12.2014
 * Time: 16:55
 */
require('connect.php');

    if (isset($_POST['name'])){

        $stmt = $mysqli->prepare("INSERT INTO members(name, surname, email, age, sex, country, city, postcode, password) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param('sssisssis', $_POST['name'],
                $_POST['surname'],
                $_POST['email'],
                $_POST['age'],
                $_POST['sex'],
                $_POST['country'],
                $_POST['city'],
                $_POST['postcode'],
                $_POST['country']);
        $stmt->execute();
        $stmt->close();
    }

?>