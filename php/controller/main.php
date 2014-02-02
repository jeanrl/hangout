<?php


class Main {

	function index(){
		$parms = func_get_args();

		$ano  = isset($parms[0]) ? 0 + $parms[0] : date('Y');
		$mes  = isset($parms[1]) ? 0 + $parms[1] : date('m');
		$link = isset($parms[2]) ? $parms[2] : '';		

		$db = new Db\Conn();
/*		$result = $db->query('SELECT * 
								FROM POST 
								WHERE ANO = :ano
								  AND MES = :mes
								  AND LINK = :link', Array('ano'=>$ano, 'mes'=>$mes, 'link'=>$link));*/
		$result = $db->query('SELECT * 
								FROM POST 
								WHERE ANO = :ano', Array('ano'=>$ano));

		if($result){
			foreach($result as $res) {
				echo '<h2>'.$res['TITULO'].'</h2>
					 <div class="conteudo">'.$res['CONTEUDO'].'</div>
					 <p>Publicado em '.date('d/m/Y', strtotime($res['DATA'])).' as '.date('H:i', strtotime($res['DATA'])).'</p>
					 <hr/>';
				}
		} else echo '<h2>Nenhum post localizado!</h2>';
	}

	function id(){
		echo 'Main::id';
	}

}