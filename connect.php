<?php
$name = filter_input(INPUT_POST, 'nname');
$username = filter_input(INPUT_POST, 'uname');
$email = filter_input(INPUT_POST, 'ename');
$password = filter_input(INPUT_POST, 'pname');

if (!empty($name)) {
    if (!empty($username)) {
        if (!empty($email)) {
            if (!empty($password)) {
                $host = "ec2-52-44-235-121.compute-1.amazonaws.com";
                $dbusername = "bixojyvagkwzsj";
                $dbpassword = "5432";
                $dbname = "ddnpngbp2os80h";
                // Create connection
                $conn = new pg_connect($host, $dbusername, $dbpassword, $dbname);
                if (pg_connect_connect_error()) {
                    die('Connect Error (' . pg_connect_connect_errno() . ') ' . pg_connect_connect_error());
                } else {
                    $sql = "INSERT INTO registration (name, username, email, password) values ('$name','$username','$email','$password')";
                    if ($conn->query($sql)) {
                        header("location: register.php");
                    } else {
                        echo "Error: " . $sql . "" . $conn->error;
                    }
                    $conn->close();
                }
            } else {
                header("location: register.php");
                die();
            }
        } else {
            header("location: register.php");
            die();
        }
    } else {
        header("location: register.php");
        die();
    }
} else {
    header("location: register.php");
    die();
}
