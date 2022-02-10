<?php
class Conn{
	public $host= "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "minhacena";
	public $port = 3306;
	public $connect = null;

public function conectar (){
	try {
	 $this->connect = new PDO('mysql:host='.$this->host . ';port='. $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            echo "Conexão com o banco de dados realizada com sucesso!";
            return $this->connect;
	} catch (Exception $e) {
		return false;
		
	}

}
}

?>