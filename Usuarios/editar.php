<?php
require '../Banco-de-Dados/controleDeAcesso.php';
require_once '../Banco-de-Dados/conexao.php';

$id = preg_replace('/\D/', '', $_POST['id']);