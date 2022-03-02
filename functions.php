<?php

function connect_to_db()
{
    $dbn = 'mysql:dbname=b3a31a8f2108ee2c67054fb56dfceaa0;charset=utf8mb4;port=3306;host=mysql-2.mc.lolipop.lan';
    $user = 'b3a31a8f2108ee2c67054fb56dfceaa0';
    $pwd = 'Urizenlp1223';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}

// ログイン状態のチェック関数
function check_session_id()
{
    if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) {
        header('Location:login_input.php');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}
