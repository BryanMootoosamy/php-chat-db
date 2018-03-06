<?php
    function attribution($input) {
        if (isset($_POST[$input])){
            return $_POST[$input];
        }
    }
?>
