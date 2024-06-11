<?php

    include("connect.php");

    $response = ["success" => false, "data" => [], "message" => ""];

    $sql = "SELECT first_name, last_name, email, birth_date, register_date FROM users";
    $result = mysqli_query($connect, $sql);

    if ($result && $result->num_rows > 0) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        $response["success"] = true;
        $response["data"] = $users;
    } else {
        $response["message"] = "Kayıtlı kullanıcı bulunamadı.";
    }

    mysqli_close($connect);

    header('Content-Type: application/json');
    echo json_encode($response);

?>
