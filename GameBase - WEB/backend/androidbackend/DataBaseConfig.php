<?php
class DataBaseConfig
{
	public $servername;
	public $username;
	public $password;
	public $databasename;
	
	public function __construct(){
		$this->servername = 'mysql.nethely.hu';
		$this->username = 'gamebase';
		$this->password = '+2FmEgAdUNfk76+B';
		$this->databasename = 'gamebase';
	}
}
?>