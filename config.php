<?php
	session_start();
	#error_reporting(0);
    #ini_set('output_buffering', 4096);
    #ini_set('session.auto_start', 1);
    #ini_set('display_errors','on');

    setlocale(LC_ALL, 'Portuguese_Brazilian');
    date_default_timezone_set('America/Sao_Paulo');
    
    $cfg = array(
        'titulo'=>'X-9',
        'empresa'=>'Embracore, Ltda.',
        'endereco1'=>'Rua Jos&eacute; Francisco Bernardes, 733',
        'endereco2'=>'Centro - Cambori&uacute; - SC',
        'telefone1'=>'(47)3365-4410',
        'telefone2'=>'(47)3365-4502',
        'site'=>'www.embracore.com.br'
    );
?>
