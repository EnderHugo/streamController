
<!DOCTYPE html>

<html>
    <head>
        <link rel="manifest" href="manifest.json">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Stream controller</title>
        <meta name="description" content="Stream controller" />
        <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="characterBackground">
            <img id="character" src="">
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/handler.js"></script>
        <script src="js/sound.js"></script>
        <script>
            if('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js', { scope: '/obs/streamController/' });
            }
        </script>
    </body>
    <footer>
        <?php
            include 'includes/navbar.php'
        ?>
    </footer>
</html>