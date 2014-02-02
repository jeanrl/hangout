<?php 

$msg = '';
$user = 'root';
$pass = '';

if(isset($_POST['user']) && isset($_POST['pass'])) {

	$user = trim($_POST['user']);
	$pass = trim($_POST['pass']);

	//conectando ao banco de dados
	$db = new PDO('mysql:host=localhost;charset=UTF8', $user, $pass);

	//Criando o banco de dados
	$db->exec('CREATE DATABASE IF NOT EXISTS phpstart 
				DEFAULT CHARACTER SET utf8 
				COLLATE utf8_general_ci');

	//Conexão ao novo banco de dados
	$db = new PDO('mysql:host=localhost;dbname=phpstart;charset=UTF8', $user, $pass);

	//Rodando a query para criar a tabela.
	$db->exec('CREATE TABLE IF NOT EXISTS `post` (
				  `ID` int(11) NOT NULL AUTO_INCREMENT,
				  `AUTOR` int(11) DEFAULT \'0\',
				  `ANO` int(11) NOT NULL,
				  `MES` int(11) NOT NULL,
				  `LINK` varchar(200) NOT NULL,
				  `TITULO` varchar(200) NOT NULL,
				  `CONTEUDO` text NOT NULL,
				  `DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`ID`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT=\'Postagens do blog\' AUTO_INCREMENT=3');

	//Inserindo valores
	$db->exec('INSERT INTO `post` (`ID`, `AUTOR`, `ANO`, `MES`, `LINK`, `TITULO`, `CONTEUDO`, `DATA`) VALUES
				(1, 0, 2014, 1, \'meu-primeiro-post-no-blog\', \'Meu Primeiro Post no Blog\', \'Este é o conteúdo da primeira postagem do blog.\', \'2014-02-02 14:48:08\'),
				(2, 0, 2014, 2, \'segundo-post-de-teste-no-blog\', \'Segundo Post de Teste no Blog\', \'Conteúdo do segundo post.\', \'2014-02-02 15:23:45\');');

	$msg = '<div class="msg">Banco de dados criado com êxito!</div>';
}
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Criar Banco de Dados Mysql</title>
        <link rel="shortcut icon" href="style/image/favicon.ico" />
        <link rel="stylesheet" href="style/main.css">
	</head>
	<body>
		<div class="container">
			<h2>Criar Banco de Dados</h2>
			<blockquote>
				<p>Preencha os dados para acesso ao banco de dados mysql local</p>
				<p>Banco de Dados: <b>PHPSTART</b></p>
				<p>Tabela: <b>POST</b></p>
			</blockquote>
			<form method="post" action="criardb.php">
				<label>Usuário Administrador:</label>
				<input name="user" placeholder="administrador" value="<?php echo $user;?>" />

				<label>Senha:</label>
				<input type="password" name='pass' value="<?php echo $pass;?>" />

				<button type="submit">Criar</button> ou baixe o <a href="post,sql">script SQL</a>
				</form>

				<?php echo $msg;?>
		</div>
	</body>
</html>