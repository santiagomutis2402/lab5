<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {

        $nombreDirectorio = "archivos/";

        //crear carpeta si no existe
        if (!is_dir($nombreDirectorio)) {
            mkdir($nombreDirectorio);
        }

        $nombrearchivo = $_FILES['archivo']['name'];
        $nombreCompleto = $nombreDirectorio . $nombrearchivo;




        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiara el nombre a $nombrearchivo 
    <br><br>";
        }
        move_uploaded_file(
            $_FILES['archivo']['tmp_name'],
            $nombreDirectorio . $nombrearchivo
        );

        echo "El archivo se ha subido satisfactoriamente al directorio  
    $nombreDirectorio <br>";
    } else
        echo "No se ha podido subir el archivo <br>";
}