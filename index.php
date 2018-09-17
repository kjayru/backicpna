<?php
session_start();
$_SESSION['web'] = true;

$utm_source = isset($_GET['utm_source']) && $_GET['utm_source']!='' ? $_GET['utm_source'] : '' ;
$utm_medium = isset($_GET['utm_medium']) && $_GET['utm_medium']!='' ? $_GET['utm_medium'] : '' ;
$utm_campaign = isset($_GET['utm_campaign']) && $_GET['utm_campaign']!='' ? $_GET['utm_campaign'] : '' ;
$utm_term = isset($_GET['utm_term']) && $_GET['utm_term']!='' ? $_GET['utm_term'] : '' ;
$utm_content = isset($_GET['utm_content']) && $_GET['utm_content']!='' ? $_GET['utm_content'] : '' ;
$gclid = isset($_GET['gclid']) && $_GET['gclid']!='' ? $_GET['gclid'] : '' ;
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

        <div class="login">
            <img class="login__logo" src="img/icpna.png" alt="">
            <form>
                <input id="usuario" class="login__input" type="text" placeholder="Usuario" name="usuario">
                <input id="contrasena" class="login__input" type="password" placeholder="Contraseña" name="contrasena">
                <input type="hidden" name="tipo" value="login">
                <button class="login__boton" type="submit">Acceder</button>
            </form>
            <div id="novalido" class="login__msg">Usuario y/o Contraseña invalido.</div>
        </div>

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