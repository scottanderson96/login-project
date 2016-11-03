<?php

require("dbconnect.php");

if($_SERVER['REQUEST_METHOD']== 'POST' || $_SESSION['login']===1){
    
// mysql_escape_string prevents sql injection attacks. POST calls to the form below.
$uname = mysql_escape_string($_POST['namebox']);
$password = mysql_escape_string($_POST['passwordbox']);


$sql = mysql_query("SELECT * FROM users WHERE username='$uname' AND password='$password' ");

$numberrows = mysql_num_rows($sql);
$_SESSION['login']=1;

if ($numberrows>0){
    //login has been successful so it will show the sweet stock
    $sweets = "SELECT * FROM sweets";
    $result = mysql_query($sweets);
    
    while($row=mysql_fetch_assoc($result)){
        echo $row["name"];
    }
}

else {
    echo '<p>You have not logged in.</p>';
    
    echo '
<form method="POST" action="index.php">
    
    Username:  <input type="text" name="namebox"><br/>
    Password:  <input type="text" name="passwordbox"><br/>
    <input type="submit" name="submit" value="Log in">
    
    
    
</form>';
}


} //closes statement for submitting form
?>
