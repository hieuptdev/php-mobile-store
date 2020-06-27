<?php
    session_start();
    session_destroy();
    echo $_SESSION['mail'].'<br>'.$_SESSION['pass'];
