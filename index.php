<?php 
      ob_start();     
      
      //Defaults
      $controller = 'Main';
      $action = 'index';
      $param = array();

      //Constantes
      define('PATH', __DIR__.'/');
      define('PPHP', PATH.'php/');
      define('CONTROLLER', PPHP.'controller/');

      //funçoes de apoio
      include PPHP.'functions.php';
         
      //confirmando a variável   
      if(!isset($_GET['phpstarturl'])) $_GET['phpstarturl'] = '';
         
      //criando um array com os dados da URL   
      $u = explode ('/', trim($_GET['phpstarturl'], ' /') );         
         
      //Localizando o CONTROLLER
      if(isset($u[0]) && file_exists(CONTROLLER.$u[0].'.php')) {
            $controller = $u[0];
            array_shift($u);
      }
      $ctrl = new $controller();
         
      //Localizando a ACTION
      if(isset($u[0]) && method_exists($ctrl, $u[0])) {
            $action = $u[0];
            array_shift($u);
      }
      
      //Pegando os Parâmetros      
      $param = $u;
      
      //Rodando a action
      call_user_func_array(array($ctrl, $action), $param);



      //Output
      header('Content-Type: text/html; charset=utf-8');
      exit( htmlHead() . ob_get_clean() . htmlFooter() );