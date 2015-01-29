<?php
class Util {
    function __construct() {
    }
    function alertmsg($prm) {
        echo "
            <html>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            </head>
            <body>
            <script> alert('".$prm['msg']."'); </script>
            </body>
            </html>
            ";
    }
}
?>
