<!--Nombre: Estefanía Anaya Cárdenas-->
<!--Materia: Desarrollo de aplicaciones web-->
<!--Fecha: 1 de marzo de 2021-->
<!--Proyecto: Proyecto Integrador 1 Intersemestral - Página de Calendy Qro-->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="initial-scale=1">
    <title>Calendy Qro</title>
    <link rel="stylesheet" href="estilos.css"> 
    <?php require_once 'lib/config.php'; ?>
</head>
<body>
<?php
             spl_autoload_register(function($clase){
             require_once "lib/$clase.php";
             });
             $db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
             $array = $db->getContacto();
             if($_POST){
             extract($_POST,EXTR_OVERWRITE);
             if($db->preparing("INSERT INTO contacto VALUES(NULL,'$nombre','$correo','$comentarios','$subscripcion')")){
             $db->run();
             trigger_error("The sign in was correct!", E_USER_NOTICE);
             $ok = true;
             $db->closeConn();

             }
             }
?>
   <nav>
      <div id="logo">
           <h4>CALENDY QRO.</h4>
      </div>
      <div id = "links">
            <ul type = "disc">
                <li><a href="#info">Inicio</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#galeria">Galería</a></li>
                <li><a href="#contacto">Contáctanos</a></li>
                <li><a href=""><button type = "button" id = "btn2">Estilos</button></a></li>
            </ul>
      </div>  
   </nav>
   <header>
        <div class = "info-header">
            <h2>ORDENA YA</h2>
            <hr/>
            <p style = "color: white; font-size: 200%">Postres de la mejor calidad preparados por una empresa 100% mexicana.</p>
        </div>
   </header>
   <section id="productos">
       
   </section>
   <section id = "contacto">     
       <div style = "text-align: center; margin-bottom: 20px">
            <h1>¿Quieres ponerte en contacto con nosotros?</h1><br/>
            <h2 style = "color: white; font-size: 110%">Déjanos tu información</h2>
       </div>
           <?php
            echo "<table class='table table-cell'
                <thead>
                    <tr>
                        <td>id</td>
                        <td>nombre</td>
                        <td>correo</td>
                        <td>comentarios</td>
                        <td>suscripcion</td>
                    </tr>
                    <tbody>
                ";        
                foreach ($array as $v){
                    echo "<tr>";
                    foreach($v as $v2){
                            echo "<td>$v2</td>";                
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            ?>
            <form method="post" id = "formulario" style="color:white" enctype="multipart/form-data">
               <div>
                   <input class = "formal" type="text" name="nombre" placeholder = "Nombre Completo">
                    <input class = "formal" type="email" name = "correo" placeholder = "Correo Electrónico">
                    <textarea class = "formal" name="comentarios" id="" cols="30" rows="10" placeholder = "¿Qué te gustaría compartirnos?"></textarea>
                    <input type="checkbox" name="suscripcion">
                    <label for="subs" style = "color: white; font-size: 102%">¡Entérate de nuestras ofertas!</label>
               </div>
                <div class = "btn" style = "margin-left: 79%">
                   <button type = "submit">Enviar</button>
                </div>
            </form>
    </section>
    <footer class = "bg1" style = "padding: 30px 0">
        <div style = "display: flex; align-items: center">
            <span class = "c2" style = "width: 60%; font-size: 100%">Copyright 2021 EAC</span>
            <div class = "redes-sociales" style = "width: 40%; text-align: right">
                <a href="https://api.whatsapp.com/send?phone=524424917752&text=¡Hola!%20Me%20gustar%C3%ADa%20hacer%20un%20pedido%20😁" target = "_blank">
                    <i class = "fab fa-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/Calendyqro" target = "_blank">
                    <i class = "fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/calendy_qro/" target = "_blank">
                    <i class = "fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/channel/UC2K0vQS4MrL7q6OYHp78buQ" target = "_blank">
                    <i class = "fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </footer>
    <script>
        window.addEventListener('scroll', function(){
            let nav = document.querySelector('nav'); 
            let windowPosition = window.scrollY > 0;
            nav.classList.toggle('scrolling-active', windowPosition);    
        })
    </script>
</body>
</html>