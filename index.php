<?php
if(isset($_GET) && !empty($_GET)) {
    include_once('views/redirecturl.php');
} else {
    include_once('views/form.php');
}
?>