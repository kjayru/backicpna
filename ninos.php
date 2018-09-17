<?php
include 'start.php';
require dirname(__FILE__).'/vendor/autoload.php';
use Vespula\Paginator\Paginator;
use Vespula\Paginator\Decorator\Generic;
use Zend\Diactoros\Uri;

$decorator = new Generic();
$paginator = new Paginator($decorator);
$uri = new Uri('/cms/ninos.php');

use Controllers\Home; 
use Controllers\Registros;
$page = $_GET['page'];
if(!$page){
 $page = 1;
}
home::estoy();
?>
<!doctype html>
<html class="no-js" lang="es">
    <head prefix="og: http://ogp.me/ns#">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>IPCNA</title>
        <meta name="description" content="">
        <meta name="kerwords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
    
        <link rel="shortcut icon" href="favicon.ico" />
        
        <link href="https://fonts.googleapis.com/css?family=Lato:300, 400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/site.css?version=<?php echo rand(11111,99999); ?>">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>

        <header class="limit cms__bg cms__header">
            <img class="cms__logo" src="img/icpna.png" alt="">
            <nav class="cms__nav">
                <a class="cms__nav__enlace" href="adultos.php">Programa jóvenes y adultos</a>
                <a class="cms__nav__enlace act" href="ninos.php">Programa niños</a>
                <a class="cms__nav__enlace cms__nav__enlace--salir" href="logout.php">Cerrar Sesión</a>
                <div class="clear"></div>
            </nav>
        </header>

        <section class="limit cms__bg">
            <div class="cms__botones">
                <?php  $resultados = Registros::getRegistroNinos($page);  ?>
                <div class="cms__nav__enlace cms__nav__enlace--numero" href="#"><?php echo $resultados['totalreg'];?> REGISTROS</div>
                <a class="cms__nav__enlace cms__nav__enlace--download" href="registros-ninos.php">Descargar Registros</a>
                <div class="clear"></div>
            </div>
            <table>
                <tr class="table__titulo">
                    <th></th>
                    <td>Nombres</td>
                    <td>Tipo Documento</td>
                    <td>N° Documento</td>
                    <td>Correo</td>
                    <td>Publicidad</td>
                    <td>Pauta</td>
                    <td>Fecha de registro</td>
                </tr>

                <?php
                
                foreach($resultados["registros"] as $key => $f):
                ?>
                <tr>
                <th><?php $key+1; ?></th>
                    <td style="text-transform: capitalize;"><?php echo $f['nombres']; ?></td>
                    <td><?php echo $f['tipodocumento']; ?></td>
                    <td><?php echo $f['numerodocumento']; ?></td>
                    <td><?php echo $f['correo']; ?></td>
                     <td><?php echo $f['pauta']; ?></td>
                    <td><?php echo $f['utm_source']!='' || $f['utm_medium']!='' || $f['utm_campaign']!='' || $f['utm_term']!='' || $f['utm_content']!='' || $f['gclid']!='' ? 'SÍ':'NO' ; ?></td>
                    <td><?php echo $f['fecha']; ?></td>
                </tr>
                <?php
                   endforeach;
                ?>
                
            </table>
            <div class="paginador">
            <?php 
               
                $paging = $resultados['cantidad'];
                $total = ceil($resultados['total']-1);
                
                echo $paginator->paginate($page, $total, $uri, $paging);  
            ?>
                
            </div>
        </section>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js?version=<?php echo rand(11111,99999); ?>"></script>
        <script>
          /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-101861204-1', 'auto');
          ga('send', 'pageview');*/

        </script>
    </body>
</html>