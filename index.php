<?php

echo '<html><head></head><body>';
echo '<h1>Subir</h1>';
echo '<form method="post" enctype="multipart/form-data">';
echo 'Demen: <input type="file" name="myfile" /> <br />';
echo '<input type="submit" value="Enviar"';
echo '</form>';

if ( isset($_FILES) && isset( $_FILES['myfile']) && !empty($_FILES['myfile']['name'] && !empty($_FILES['myfile']['tmp_name']))){

	if (! is_uploaded_file($_FILES['myfile']['tmp_name'])){
		echo "ERROR: NO PROCESO DE MANERA CORRECTA";
		exit;
	}
	$source = $_FILES['myfile']['tmp_name'];
	$destination = __DIR__.'/upload/'.$_FILES['myfile']['name'];

	if( is_file($destination)){
		echo "error ya esta un fichero con ese nombre";
		@unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
		exit;
	}
	if( ! @move_uploaded_file($source, $destination)){
		echo "error no se pulo";
		@unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
		exit;
	}
	echo "Fichero subido correctamente a: ".$destination;
}
