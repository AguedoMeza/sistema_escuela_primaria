
<?php 
   
    include '../configuracion/conexion.php';

    session_name("login_supsys"); 
    session_start(); 
	
	$s_idUsuario = $_SESSION["s_IdUser"];

	

	$p_id=$_POST["id"];
	$p_nombre=$_POST["txtNombre"];
	$descripcion=$_POST["txtDescripcion"];
	$enlace=$_POST["enlace"];
	$fecha_entrega=$_POST["fechaEntrega"];
	$idMateria=$_POST["id_materia"];
    

	date_default_timezone_set('America/Monterrey');
	$fecha=date('Y-m-d');
	$hora=date('h:m:s');

	//Imagen UP1 
       
    $folder_path = 'uploads/';

    $filename = basename($_FILES['archivo']['name']);
    $newname = $folder_path . $filename;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['archivo']['tmp_name'], $newname);

    $link = 'http://'.$_SERVER['HTTP_HOST']."/SYEBEL/maestroContenido/uploads/".$filename;       


      //Imagen UP1 

    //Imagen UP1 
        
        $tmp_name2 = $_FILES['img_op1']["tmp_name"];
        $name2 = $_FILES['img_op1']["name"];

        $temp = explode(".", $_FILES["img_op1"]["name"]);
        $newfilename = md5($tmp_name2) . '.' . end($temp);

        $nuevo_path="uploads/".$newfilename;

        move_uploaded_file($tmp_name2,$nuevo_path);

        $array2=explode('.',$nuevo_path);

        $ext2= end($array2);

        $imagen = 'http://'.$_SERVER['HTTP_HOST']."/SYEBEL/maestroContenido/".$nuevo_path;  
//Fin Imagen UP1
        
         



	$qry = "INSERT INTO contenidos (id_grupo, id_materia, 
	        id_maestro, 
	        nombre, 
	        descripcion, 
	        enlace, 
	        archivoPDF,
	        imagen,
	        fecha_publicacion, 
	        fecha_cierre, 
	        activo) 
	        VALUES (
	        '$p_id',
	        '$idMateria',
	        '$s_idUsuario',
	        '$p_nombre',
	        '$descripcion',
	        '$enlace',
	        '$link',
	        '$imagen',
	        '$fecha',
	        '$fecha_entrega',
	        1)";
	




		
	   $actualizar = mysqli_query($conexion,$qry) or die (mysql_error());
	
	   echo"<script language=\"javascript\">window.location=\"indexDirectorContenido.php\" </script>";

?>