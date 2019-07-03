<?php

function send_email() {
    echo "hello ".$_POST["name"];
}

if(isset($_POST['submit'])) {
    send_email();
}

?>