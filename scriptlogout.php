<?php
session_start();
session_destroy(); //Encerrar todas as sessões

header('Location: index.html');


?>