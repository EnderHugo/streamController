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
                        <input name="expression" onclick="changeValue(this.value)" type="button" value="idle" />
                        <input name="expression" onclick="changeValue(this.value)" type="button" value="happy" />
                        <input name="expression" onclick="changeValue(this.value)" type="button" value="sad" />
                        <input name="expression" onclick="changeValue(this.value)" type="button" value="angry" />
                        <input name="expression" onclick="changeValue(this.value)" type="button" value="sus" />
                        <input name="expression" onclick="changeValue(this.value)" type="button" value="think" />
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
                $("input[name='expression']").click(function () {
                    var value = $("#valueholder").val();
                    $.post("post.php", { expression: value });
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