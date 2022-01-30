<?php


#caminho do diretorio root até a pasta do projeto 
#como uso o xamp, a pasta do projeto esta na raiz(htdocs), logo nao é necessario alterações
#caso o projeto esteja dentro de outro local que alteraria a url da api é necessario alterar a variavel $path abaixo:
#ex a pasta TESTE_IPM estar no caminho htdocs/testesdesenvolvedores/lucas/teste_ipm
# a variavel a baixo necessita ser:
# $path  = "/testesdesenvolvedores/lucas/teste_ipm/endpoints/"
$path = '/teste_ipm/api/endpoints';
$apiUrl = $_SERVER['HTTP_HOST'].$path;