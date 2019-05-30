<?php

		function codigo_captcha(){

				$k="";
				$paramentros="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrs";
				$maximo=strlen($paramentros)-1;

				for($i=0; $i<5; $i++){

					$k.=$paramentros{mt_rand(0,$maximo)};

				}

				return $k;


		}

		echo codigo_captcha();

?>