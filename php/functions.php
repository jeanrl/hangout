<?php
      function p($val){
            echo '<pre>'.print_r($val, true).'</pre>';
      }
      

      function __autoload($name) {
            //formatando
            $class = strtolower(str_replace('\\', '/', $name)) . '.php';

            //procurando o arquivo
            if(file_exists(PPHP.$class)) return require_once PPHP.$class;
            if(file_exists(CONTROLLER.$class)) return require_once CONTROLLER.$class;

            trigger_error('AUTOLOAD: Não foi possivel localizar a classe "'.$name.'".');
      }



      function htmlHead(){
            return '<!doctype html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Teste</title>
                    <link rel="stylesheet" href="style/main.css">
                    <link rel="author" href="humans.txt">
                </head>
                <body>
                  <div class="container">';
      }

      function htmlFooter(){
            return '
                  </div>
                  <script src="script/main.js"></script>
                </body>
            </html>';
      } 