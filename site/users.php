<?php

    require 'config/db-connect.php';        //databse connect
    $query = "SELECT * FROM user WHERE auth='1'";

    echo $query;

?>