<?php
    $destino = "upload/".$_FILES["archivoASubir"]["name"];
    $flag=TRUE;
    
    var_dump($_FILES);
    
    $formatoImagen = $_FILES["archivoASubir"]["type"];
    //echo '<a href="mostrarimagen.html">Mostrar</a>'
    //echo '<img src="upload/Jellyfish.jpg" alt="Jellyfish">';
    //echo '<img src="'.$destino.'">';

    if($formatoImagen!="image/jpeg" && $formatoImagen!="image/png")
    {
        echo "El archivo no es una imagen";
        $flag=FALSE;
    }

    if($_FILES["archivoASubir"]["size"]>1000000)
    {
        echo "Archivo demasiado grande";
        $flag=FALSE;
    }

    if(file_exists($destino))
    {
        echo "El archivo ya existe";
        copy($destino,"backup/");
    }

    if($flag=TRUE)
    {
       
        move_uploaded_file($_FILES["archivoASubir"]["tmp_name"],$destino);
    }
?>