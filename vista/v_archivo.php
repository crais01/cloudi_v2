<?php
include "header.php";
?>	
<form id="f_subirArchivo" enctype="multipart/form-data" method="post">
	<label for="archivo">Selecciona un archivo</label>
	<input type="file" name="archivo" id="archivo" required="required" />
	<input type="button" id="subir" onclick="subir2();return false;" value="Registro"/>
</form>
<div id="resp"></div>
<?php
include "footer.php";
?>