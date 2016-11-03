<?php

$conn = mysql_connect("localhost","scottanderson96","");
mysql_select_db("c9");
session_start();

if (false===$conn){
    die("Connection failed");
}

else{
    echo "Data-base is connected";
}