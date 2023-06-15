<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Stream controller</title>
        <meta name="description" content="Stream controller" />
        <link rel="stylesheet" href="css/actions.css"/>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    </head>
    <body>
        <div class="panel">
            <div class="panel-body">
                <div>
                    <form name="actions" action="">
                        <input type="text" name="valueholder" id="valueholder" style="display: none;">
                        <input name="action" onclick="changeValue(this.value)" type="button" value="action1" />
                        <input name="action" onclick="changeValue(this.value)" type="button" value="action2" />
                        <input name="action" onclick="changeValue(this.value)" type="button" value="action3" />
                    </form>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            function changeValue(value) {
                valueholder = document.getElementById('valueholder');
                valueholder.value = value;
            }

            $(document).ready(function () {
                $("input[name='action']").click(function () {
                    var value = $("#valueholder").val();
                    $.post("post.php", { action: value });
                    $("#valueholder").val("");
                    return false;
                });
            })
        
        </script>
    </body>
    <footer>
        <?php
            include 'includes/navbar.php'
        ?>
    </footer>
</html>