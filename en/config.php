<?php
	session_start();
	#error_reporting(0);
    #ini_set('output_buffering', 4096);
    #ini_set('session.auto_start', 1);
    #ini_set('display_errors','on');

    setlocale(LC_ALL, 'Portuguese_Brazilian');
    date_default_timezone_set('America/Sao_Paulo');
    
    $cfg = array(
        'titulo'=>'X-9'
        );
?>
