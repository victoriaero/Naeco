<?php
$to = "naeco.startup@gmail.com";
$subject = "E-mail do Fale com a gente";
$from=$_POST["email"];
$msg="Novo assinante: " . $_POST["email"];

mail($to,$subject,$msg);
echo "Obrigado por assinar nossa Newsletter!";
?>