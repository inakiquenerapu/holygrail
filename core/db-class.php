<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

  $database = new Database();
  $db = $database->getConnection();

  class Database {

    public function __construct() {
    }

    # Asigna os datos correspondentes á túa conexión á base de datos,
    # editando os valores de $host, $db_name, $username e $password

    private $host     = "";
    private $db_name  = "";
    private $username = "";
    private $password = "";

    public $conn;

    public function getConnection() {

      $this->conn = null;

      try {
        $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name.";charset=utf8mb4",$this->username,$this->password
          , array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET SESSION group_concat_max_len=100000")
          );
        }

      catch(PDOException $exception) {
//      echo "<h3>Database error: ".$exception->getMessage().". Bye.</h3>"; die();
        echo "<h3>Database error. Bye.</h3>"; die();
        }

      unset($this->host,$this->db_name,$this->username,$this->password);
      return $this->conn;

      }

    }

?>