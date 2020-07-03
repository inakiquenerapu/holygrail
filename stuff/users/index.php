<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

/*

-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_upd` datetime NOT NULL,
  `ip_upd` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_surname` (`name`,`surname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 2020-06-15 15:54:33

*/



  include("core/db-class.php");

  if(
        isset($url->virtualPathArray[1]) && $url->virtualPathArray[1] != ""
     && file_exists("stuff/".$url->virtualPathArray[0]."/".$url->virtualPathArray[1].".php")
    ) {

    include($url->virtualPathArray[1].".php");

  }else{

    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");

  }


class Users{

  private $conn;

  public function __construct($db) {
    $this->conn = $db;
    }



  function checkID() {

    $query = "SELECT COUNT(id) FROM users WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);

    if($stmt->execute()) {
      return $stmt->fetchColumn();
    }
    return false;

# .. END CHECK ID
# ...............................................

    }



  function addOne() {

    $query = "INSERT INTO users (name, surname, date_upd, ip_upd) VALUES (:name, :surname, now(), :ip_upd)";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":surname", $this->surname);
    $stmt->bindParam(":ip_upd", $_SERVER["REMOTE_ADDR"]);

    $this->error = false;

    if($stmt->execute()) {
      $this->lastid = $this->conn->lastInsertId();
    }else{
      $this->error = true;
    }
    return true;

# .. END ADD ONE
# ...............................................

    }



  function listAll() {

    $query = "SELECT * FROM users WHERE name LIKE :search OR surname LIKE :search ORDER BY name,surname ASC";

    $stmt = $this->conn->prepare($query);

    $this->fixed_search = "%".$this->search."%"; # We need to add % before/after the search

    $stmt->bindParam(":search", $this->fixed_search);

    $this->error = false;

    $this->list = [];

    if($stmt->execute()) {
      while($x=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $this->list[]=$x;
      }
    }else{
      $this->error = true;
    }
    return true;

# .. END LIST ALL
# ...............................................

    }



  function readOne() {

    $query = "SELECT * FROM users WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);

    $this->error = false;

    if($stmt->execute()) {
      $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
      $this->error = true;
    }
    return true;

# .. END READ ONE
# ...............................................

    }



  function updateOne() {

    $query = "UPDATE users SET name = :name, surname = :surname, date_upd = now(), ip_upd = :ip_upd WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":surname", $this->surname);
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":ip_upd", $_SERVER["REMOTE_ADDR"]);

    $this->error = false;

    if(!$stmt->execute()) {
      $this->error = true;
    }
    return true;

# .. END UPDATE ONE
# ...............................................

    }



  function deleteOne() {

    $query = "DELETE FROM users WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);

    $this->error = false;

    if(!$stmt->execute()) {
      $this->error = true;
    }
    return true;

# .. END UPDATE ONE
# ...............................................

    }


}

