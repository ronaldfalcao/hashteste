<?php

	header('Content-Type: text/html; charset=utf-8');
	
	$senha = "hashingteste";

	$options = [
					'cost' => 11,
					'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
				];

	$hash = password_hash($senha, PASSWORD_BCRYPT, $options);

	echo "O Hash gerado foi: ".$hash.'<br/>';

/*
Explicação

-> $2y$ representa o algoritmo utilizado (bcrypt)
-> $12$ representa o custo do algoritmo (potência)
-> O restante é o hash gerado
*/

	$senhaFornecida = "hashingteste";

	echo "Verificando se a senha {$senhaFornecida} é válida." .'<br/>';

	if(password_verify($senhaFornecida, $hash))
		echo 'Senha válida!'.'<br/>';
	else
		echo 'Senha inválida!'.'<br/>';

	$senhaFornecida = "hashingteste01";

	echo "Verificando se a senha {$senhaFornecida} é válida." .'<br/>';

	if(password_verify($senhaFornecida, $hash))
		echo 'Senha válida!'.'<br/>';
	else
		echo 'Senha inválida!'.'<br/>';