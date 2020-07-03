<?php

  class Mail {

    function sendMail() {

      $this->headers  = "MIME-Version: 1.0"."\r\n";
      $this->headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

      if (mail($this->to, $this->subject, $this->message, $this->headers) !== false) {
        echo "Mensaxe enviada";
      } else {
        echo "Algo foi mal";
      }

    }

  }

?>