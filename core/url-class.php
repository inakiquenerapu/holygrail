<?php

  class Url {

    function __construct($self) {

      $this->fullUrl          = "http".
                                (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]!=="off"?"s":"").
                                "://".
                                $_SERVER["HTTP_HOST"].
                                (!in_array($_SERVER["SERVER_PORT"],[80,443])?":".$_SERVER["SERVER_PORT"]:"").
                                $_SERVER["REQUEST_URI"];

      $this->scheme           = parse_url($this->fullUrl,PHP_URL_SCHEME);
      $this->domain           = parse_url($this->fullUrl,PHP_URL_HOST);
      $this->fullPath         = parse_url($this->fullUrl,PHP_URL_PATH);
      $this->realPath         = $self;
      $this->virtualPath      = str_replace_plus("fo",$this->realPath,"",$this->fullPath);
      $this->virtualPathArray = explode("/",str_replace_plus("fo","/","",$this->virtualPath));
      $this->urlQuery         = parse_url($this->fullUrl,PHP_URL_QUERY);
                                parse_str($this->urlQuery,$this->urlQueryArray);
      $this->baseUrl          = $this->scheme."://".$this->domain.$this->realPath."/";

    }

  }

?>