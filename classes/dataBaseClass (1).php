<?php

class Dbh
{
	// ESTABLISHING CONNECTION

	private $host = "us-cdbr-east-06.cleardb.net";
	private $user = "b43edf0c48809a";
	private $pwd = "2f3b2e65";
	private $dbName = "heroku_cc80a156c2a249c";

	protected function connect()
	{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
		$pdo = new PDO($dsn, $this->user, $this->pwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	
		return $pdo;
	}
}
