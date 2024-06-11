<?php

    include("connect.php");
    header('Content-Type: application/json');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        $response = ["success" => false, "message" => ""];

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        if(strlen($firstName) <= 0 || strlen($lastName) <= 0 || strlen($email) <= 0 || strlen($password) <= 0 || strlen($confirmPassword) <= 0 || strlen($gender) <= 0){
            $errors[] = "Tüm boşlukları doldurunuz!";
        } else {

            if($connect){
                if ($password == $confirmPassword) {
                    $sql = "SELECT id FROM users WHERE email='$email'";
                    $result = mysqli_query($connect, $sql);
                    if ($result->num_rows > 0) {
                        $errors[] = "Bu e-posta adresi zaten kayıtlı!";
                    }else{
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (first_name, last_name, email, password, birth_date, gender) VALUES ('$firstName', '$lastName', '$email', '$password', '$dob', '$gender')";
            
                        if (mysqli_query($connect, $sql)) {
                            $response["success"] = true;
                            $response["message"] = "Kayıt başarılı!";
                        } else {
                            $errors[] = "Veritabanı hatası";
                        }
                    }
                }else{
                    $errors[] = "Şifreler uyuşmuyor!";
        
                }
            } else {
                $errors[] = "Veritabanı hatası";
            }

        }

        if (!empty($errors)) {
            $response["message"] = implode("\n", $errors);
        }

        echo json_encode($response);
    }
?>
