<?php

if (!empty($_POST["conteudo"])){
    file_put_contents("blogpost1.php", $_POST["conteudo"]);
}

if (!empty($_FILES["arquivo"])){
    move_uploaded_file( $_FILES["arquivo"] ["tmp_name"], basename($_FILES["arquivo"] ["name"]) );
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS</title>
    <meta charset="utf-8">
    <?php header("Content-Type: text/html; charset=utf8"); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4" style="background-color:lavender;">

            <?php echo file_get_contents("blogpost1.php"); ?>

        </div>
        <div class="col-md-4" style="background-color:orange;">


            <form action="" method="post">

                <textarea name="conteudo"> <?php echo file_get_contents("blogpost1.php"); ?>  </textarea>

                <button type="submit">Enviar</button>

            </form>

            <script>
                CKEDITOR.replace( 'conteudo' );
            </script>


        </div>
        <div class="col-md-4" style="background-color:lavender;">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="arquivo" id="fileToUpload"><br><br>
                <input type="submit" value="Enviar imagem" id="submit">
            </form>
        </div>
    </div>
</div>

</body>
</html>
