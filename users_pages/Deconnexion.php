<?php 
    session_start() ;
    if(isset($_SESSION["nom"])){
        session_destroy() ;
        mysqli_close() ;
        header("location: index.php") ;
    }
?>