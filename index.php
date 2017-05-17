﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<head>
		<title>Testando Hashing no PHP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<style type="text/css">
			.corpo .label{
					font-weight: bold;
				     }
		</style>

	</head>

	<body>
		<div class="corpo">

			<?php

				//Definindo uma senha para ser criptografada.
				$senha = "hashingteste";

				//Gerando as opções de cost e salt para a função password_hash().
				$options = [
						'cost' => 11,
						'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
					   ];

				//Criptografando a senha fornecida.
				$hash = password_hash($senha, PASSWORD_BCRYPT, $options);

				echo "<div class=\"label\">O Hash gerado foi</div>".$hash.'<br/>';

				/*
				Explicação sobre o hash gerado

				-> $2y$ representa o algoritmo utilizado (bcrypt)
				-> $12$ representa o custo do algoritmo (potência)
				-> O restante é o hash gerado
				*/

				//Fornecendo uma senha para comparação (senha válida).
				$senhaFornecida = "hashingteste";

				echo "<div class=\"label\">Verificando se a senha {$senhaFornecida} é válida.</div>" .'<br/>';

				//Comparando a senha para teste e o hash.
				if(password_verify($senhaFornecida, $hash))
					echo 'Senha válida!'.'<br/>';
				else
					echo 'Senha inválida!'.'<br/>';

				//Fornecendo uma senha para comparação (senha inválida).
				$senhaFornecida = "hashingteste01";

				echo "Verificando se a senha {$senhaFornecida} é válida." .'<br/>';

				if(password_verify($senhaFornecida, $hash))
					echo 'Senha válida!'.'<br/>';
				else
					echo 'Senha inválida!'.'<br/>';

				echo 'Os parâmetros utilizados: '.'<br/>';

				/*Verificando os parâmetros utilizados no hash*/
				var_dump(password_get_info($hash));
			?>

		</div>
	</body>
</html>


