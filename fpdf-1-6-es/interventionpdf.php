<?php
        
    session_start();
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;    
    if(isset($_POST["print"])){
        $id = $_POST["id"];
        $intervention = mysql_query("SELECT * FROM historique WHERE id = $id", $con);
        $intervenant = mysql_fetch_assoc($intervention);

        $numero = strtoupper($intervenant['numero_intervention']);
        $matricule = strtoupper($intervenant['matricule_technicien']);
        $code = strtoupper($intervenant['code_client']);
        $num1 = strtoupper($intervenant['numero_utilisateur']);
        $nature = strtoupper($intervenant['nature']);
        $date = ($intervenant['dates']);
        require('fpdf.php') ;
    //creation d'un nouveau doc pdf

    $pdf = new FPDF( $orientation='P', $unit='mm', $size='A4' );
    
    //ajout de la nouvelle page

    $pdf->AddPage();

    //entete

    $pdf->Image($file='entete.jpg', $x=10, $y=5, $w=130, $h=20);

    //saut de line

    $pdf->Ln( $h= 18);

    //police

    $pdf->SetFont( $family='arial', $style='B', $size=16);

    //Titre

    $pdf->Cell( $w=0, $h=10, $txt="FICHE D'INTERVENTION " , $border='LTRB', $in =1, $align='center');
    $pdf->Cell( $w=0, $h=10, $txt=' N', $border=0, $in =1, $align='c');

    //saut de ligne

    $pdf->Ln( $h= 5);

    //police

    $pdf->SetFont( $family='arial', $style='', $size=10);
    $h= 7;
    $retrait = "      ";
    $pdf->Write($h, $txt= " Fiche Tiré de l'intervention de: \n");
    $pdf->Write($h, $txt= $retrait . "N° intervention: ");

    //ecriture gras en italique

    $pdf->SetFont( $family= '', $style='BIU');
    $pdf->Write($h, $txt= $numero . "\n");

    //ecriture normale

    $pdf->Write($h, $txt= $retrait . " Matricule du technicien: " . $matricule. "\n");

    $pdf->Write($h, $txt= $retrait . " Code du client: " . $code. "\n");

    $pdf->Write($h, $txt= $retrait . " Matricule de l'utilisateur: " . $num1. "\n");

    $pdf->Write($h, $txt= $retrait . " Nature de l'intervention: " . $nature. "\n");

    $pdf->Write($h, $txt= $retrait . " Date de l'intervention: " . $date. "\n");
    
    $pdf->Output($des='', $name='', $isUTF8=true);

    }
        

    
?>