<?php
date_default_timezone_set('America/Sao_Paulo');
include "conect.php";
$rm = $_POST['rm'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$pass = $_POST['pass'];
$sexo = $_POST['sexo'];
$tipou = $_POST['tipo'];
$dtcadastro = date('Y/m/d');
$uploaddir = '../img/avatar/';
$arquivo = $_FILES["avatar"]["name"];
$separa = explode(".",$arquivo);
$separa = array_reverse($separa);
$tipo = $separa[0];
$imagem = $rm.'.' .$tipo;
if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir . $imagem)) {
    $uploadfile = $uploaddir . $imagem;
    
} else {
    echo"não foi possível concluir o upload da imagem.";
}

$sql->query("INSERT INTO usuario(rm, nome, email,sexo,tipo,celular,pass,avatar,dtcadastro)
VALUES ('$rm','$nome','$email','$sexo','$tipou','$celular','$pass','$uploadfile','$dtcadastro')");


//alerta de mensagem de cadastro
echo "<script type=\"text/javascript\">alert('Dados Cadastrado com Sucesso!');</script>";
//redirecionamento da pagina
echo "<script type=\"text/javascript\">window.location=\"../html/cadastarlivro.html\";</script>";


?>