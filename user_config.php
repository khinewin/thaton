<?php
session_start();
class User{
    public function __construct()
    {
        try{
            $this->db=new PDO('mysql:host=localhost; dbname=phpAuth', 'root' ,'password');
        }catch (PDOException $e){
            die("Connection failed to database server.");
        }
    }
    public function login($name, $password){
        $row="select * from users where name='$name'";
        $user=$this->db->query($row)->fetch(PDO::FETCH_ASSOC);
        if($user['name']){
            $db_password=$user['password'];
            $enc_password=sha1($password);
            if($enc_password==$db_password){
                $_SESSION['login']=$name;
                header("location: home.php");
            }else{
                echo "Password invalid.";
            }
        }else{
            echo "User account not exists";
        }
    }
    public function register($name, $email, $password, $password_again){
        $enc_password=sha1($password);
        $sql="insert into users (name, email, password, created_at) values ('$name', '$email', '$enc_password', now())";
        $this->db->query($sql);
        header("location: register.php");
    }
}