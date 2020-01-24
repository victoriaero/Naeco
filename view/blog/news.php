<?php
$to = "administracao@na.eco.br";
$subject = "E-mail da newsletter";
$from=$_POST["email"];
$msg="Novo assinante: " . $_POST["email"];

mail($to,$subject,$msg);
echo "Obrigado por assinar nossa Newsletter!";
?>