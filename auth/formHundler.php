<?php
session_start();
require_once "autoloader.php";

$pdo = Database::getInstance()->getConnection();

$id = 0;
$name = "";
$email = "";
$password = "";
$role = "";

if(isset($_POST["signUp"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // regex
    $reg_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $reg_password = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/";

    if(!preg_match($reg_email, $email) || !preg_match($reg_password, $password) || empty(trim($name)) || !in_array($role, ["admin", "journalist", "visitor"])){
        header("location: sign_up.php");
        exit;
    }

    $stmt = $pdo->prepare("insert into users (name, email, password, role) values(?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $role]);

    
}
elseif($_POST["login"]){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("select * from users where email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if(!(count($user) === 1) || $user["passowrd"] != $password){
        header("location: login.php");
        exit;
    }

    $id = $user["id"];

}

$_SESSION["id"] = $id;
$_SESSION["role"] = $role;

header("location: index.php");
exit;