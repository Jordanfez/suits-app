<?php 
    session_start() ;
    if(isset($_POST['okay'])){
        if(isset($_SESSION["pwd"])){
            //die($_SESSION["pwd"]) ;
            session_destroy() ;
            mysqli_close() ;
            header("location: index.php") ;
        }
    }
?>