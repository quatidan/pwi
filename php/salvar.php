<?php
include"conect.php";
$rm = $_POST['rm'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$uploaddir = 'img/capa/'; /*directório onde será gravado a imagem*/
/* para fazer com que a imagem seja salva no banco com o caminho e com o nome do rm*/
$arquivo = $_FILES["userfile"]["name"];
$separa = explode(".",$arquivo);
$separa = array_reverse($separa);
$tipo = $separa[0];
$imagem = $rm.'.' .$tipo;
/* recebe o $uploaddir com o caminho da pasta onde as imagens são salvas e a $imagem com o nome da imagem transformado para o rm */
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $imagem)) {
    $uploadfile = $uploaddir . $imagem;
} else {
    echo"não foi possível concluir o upload da imagem.";
}
$sql->query("INSERT INTO imagem(rm, foto, nome, email)
VALUES ('$rm','$uploadfile', '$nome', '$email')");
?>