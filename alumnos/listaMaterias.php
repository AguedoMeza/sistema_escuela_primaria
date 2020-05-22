 <?php 
   

include '../configuracion/conexion.php';

session_name("login_supsys"); 
session_start(); 
    
$s_idUsuario = $_SESSION["s_IdUser"];

    $qry = "SELECT materias.id, materias.nombre FROM materias
            INNER JOIN d_grupos_materias
            ON materias.id = d_grupos_materias.id_materia
            INNER JOIN usuarios 
            ON usuarios.id_grupo = d_grupos_materias.id_grupo
            WHERE usuarios.id = '$s_idUsuario'";
            
    $consulta = mysqli_query($conexion, $qry);
 ?>
    
 <?php 
    while($row = mysqli_fetch_array($consulta))
      {   ?>
         <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <div class="dropdown-menu-content">

                                            
                                             <a href="contenidosMaterias.php?id=<?php echo $row[0] ?>" class="dropdown-item"><i aria-hidden="true">Ver Contenidos</i></a>
                                            
                                    
                                        </div>
                                    </div>
                                </div>
                               
                                <p class="text-light"><?php echo $row[1]; ?></p>

                                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                    <canvas id="widgetChart1"></canvas>
                                </div>

                            </div>

                        </div>
                    </div>

       <?php 
        }
       ?>
                             