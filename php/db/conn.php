<?php

namespace Db;
use PDO;


class Conn {
	
	//Configurações de conexões aos Dbs
	private $config = Array('mysql'=>Array('dsn'=>'mysql:host=localhost;dbname=phpstart',
										  'user'=>'phpstart',
										  'pass'=>'ufjnLeszFzrKzjGA'),
						   'sqlite'=>Array('dsn'=>'sqlite:/db/blog.db'));

	//nó de montagem do PDO
	private $conn = null;

	//resultados de consultas
	private $result = null;



	function __construct($alias = 'mysql'){
		if(isset($this->config[$alias])){
			//criando uma instância PDO e conectando ao banco de dados
			$this->conn = new PDO($this->config[$alias]['dsn'], 
								  $this->config[$alias]['user'],
								  $this->config[$alias]['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			
			//checando se o PDO foi conectado/criado
			if(!is_object($this->conn)) trigger_error('DB: Não consegui criar o PDO!');

		} else 
			//Alias não existe . .  . 
			trigger_error('DB: Configuração "'.$alias.'" não existe.');

	}

	function query($sql, $param = Array()){

		$sth = $this->conn->prepare($sql);
		$sth->execute($param);

		return $this->result = $sth->fetchAll(PDO::FETCH_ASSOC);

	}





}