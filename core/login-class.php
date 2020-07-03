<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

  class Login {



    function __construct($baseUrl) {

      $this->baseUrl = $baseUrl;

    }


    function isLogged() {

      if(isset($_SESSION["logueado"])) {
        define("LOGUEADO",true);
      }

    }



    function checkLoginForm() {

//    $username = "";
//    echo password_hash($username, PASSWORD_BCRYPT, array('cost'=>12));
      $hashed_username = '$2y$12$7H/vKmC0elXNkBoo652PvOtdcHPUcC8JdaEIuosy3EOKdu0i251kK';
      # Forzosamente o hash ten que rodearse con comiñas simples e NUNCA COMIÑAS DOBRES

//    $password = "";
//    echo password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
      $hashed_password = '$2y$12$lpGw/DR6spF7TLjwihRkYeSTNbNYGRis0sJp0MM0iAninYbmhqTcC';
      # Forzosamente o hash ten que rodearse con comiñas simples e NUNCA COMIÑAS DOBRES

      if(
            password_verify($this->username,$hashed_username)
         && password_verify($this->password,$hashed_password)
        ){
        $_SESSION["logueado"] = true;
        header("location: ".$this->baseUrl);
        die();
      }else{
        $this->wrong = true;
      }

      return true;

    }



    function logout() {

      if(defined("LOGUEADO")){

        $_SESSION = array();
        session_destroy();
        header("location: ".$this->baseUrl);
        die();
        }

    }

  }

?>