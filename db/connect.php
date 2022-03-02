<?php
class connect{
    public static function connection(){
        $host="localhost";
        $port=3306;
        $socket="";
        $user="root";
        $password="12345678";
        $dbname="guiasalamano";
    
        $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
            or die ('Could not connect to the database server' . mysqli_connect_error());
        
        return $con;
    }
}
  

//$con->close();

    
?>