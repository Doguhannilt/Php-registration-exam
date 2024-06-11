<?php

    include("connect.php");
    header('Content-Type: application/json');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        $response = ["success" => false, "message" => ""];


        $email = $_POST['email'];
        $password = $_POST['password'];

        if(strlen($email) <= 0 || strlen($password) <= 0){
            $errors[] = "Tüm boşlukları doldurunuz!";
        } else {

            if($connect){
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($connect, $sql);
        
                if ($result->num_rows > 0) {
                    $user = mysqli_fetch_assoc($result);
                    $hashed_password = $user["password"];

                    if (password_verify($password, $hashed_password)){
                        $response["success"] = true;
                        $response["message"] = "Giriş başarılı!";
                    } else {
                        $errors[] = "E-posta veya şifre hatalı!";
                    }
                } else {
                    $errors[] = "E-posta veya şifre hatalı!";
                }
        
            }else{
                $errors[] = "Veritabanı hatası";
            }

        }

        if (!empty($errors)) {
            $response["message"] = implode("<br>", $errors);
        }

        echo json_encode($response);
    }
?>
