<?php

  session_start();

  ini_set("display_startup_errors",1);
  ini_set("display_errors",1);
  error_reporting(E_ALL);

  define("PANXOLINHAS",true);

  include("core/functions.php");
  include("core/url-class.php");
  include("core/login-class.php");
  include("core/mail-class.php");

  $url = new Url(dirname($_SERVER["PHP_SELF"]));

  $login = new Login($url->baseUrl);
  $login->isLogged();
  if(isset($_GET["logout"])){ $login->logout(); }



  $pax = "stuff/404.php";
  $sec = false;

  if(isset($url->virtualPathArray[0]) && $url->virtualPathArray[0] != "") {

      if(file_exists("stuff/".$url->virtualPathArray[0].".php")) {

        $pax = "stuff/".$url->virtualPathArray[0].".php";

      }

      if(file_exists("stuff/".$url->virtualPathArray[0]."/index.php")) {

        $pax = "stuff/".$url->virtualPathArray[0]."/index.php";
        $sec = true;

      }

  } else {

    $pax = "stuff/home.php";

  }

  include($pax);

?>