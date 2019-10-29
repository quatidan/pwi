<?php
date_default_timezone_set('America/Sao_Paulo');
include "conect.php";
$cod = $_POST['cod'];
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$autor = $_POST['autor'];
$editora = $_POST['editora'];
$edicao = $_POST['edicao'];
$isbn = $_POST['isbn'];
$etaria = $_POST['etaria'];
$resumo = $_POST['resumo'];

$uploaddir = '../img/capa/';
$arquivo = $_FILES["capa"]["name"];
$separa = explode(".",$arquivo);
$separa = array_reverse($separa);
$tipo = $separa[0];
$imagem = $cod.'.' .$tipo;
if (move_uploaded_file($_FILES['capa']['tmp_name'], $uploaddir . $imagem)) {
    $uploadfile = $uploaddir . $imagem;
    
} else {
    echo"não foi possível concluir o upload da imagem.";
}

$sql->query("INSERT INTO livro(codigo, titulo, genero, autor,editora,edicao,isbn,etaria,resumo,capa,data_cad)
VALUES ('$cod','$titulo','$genero', '$autor','$editora','$edicao','$isbn','$etaria','$resumo','$uploadfile','$data')");


//alerta de mensagem de cadastro
echo "<script type=\"text/javascript\">alert('Livro Cadastrado com Sucesso!');</script>";
//redirecionamento da pagina
echo "<script type=\"text/javascript\">window.location=\"../html/cadastarlivro.html\";</script>";


?>