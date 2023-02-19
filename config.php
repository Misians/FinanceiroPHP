<?php
//$db_name = 'financeiro';
//$db_host = 'localhost';
//$db_user = 'root';
//$db_pass = '';
//$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user, $db_pass);
	
	session_start();
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);


	define('INCLUDE_PATH','http://localhost/sis_financeiro');
	//define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	


//Conexão do banco de dados//
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','financeiro');

//Funções//
	function pegaCargo($cargo){
		$arr = [
			'0' => 'Normal',
			'1' => 'Administrador',
			'2' => 'Master'];

			return $arr[$cargo];
	}
?>