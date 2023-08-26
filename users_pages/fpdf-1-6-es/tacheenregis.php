<?php
        
    session_start();
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;    
    if(isset($_POST["print"])){
        $id = $_POST["id"];
        $intervention = mysql_query("SELECT * FROM historique2 WHERE id = $id", $con);
        $intervenant = mysql_fetch_assoc($intervention);

        $numero = strtoupper($intervenant['type_traitement']);
        $matricule = strtoupper($intervenant['descriptions']);
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

    $pdf->Cell( $w=0, $h=10, $txt=' FICHE DES TACHES EFFECTUEES', $border='LTRB', $in =1, $align='center');
    $pdf->Cell( $w=0, $h=10, $txt=' N°', $border=0, $in =1, $align='c');

    //saut de ligne

    $pdf->Ln( $h= 5);

    //police

    $pdf->SetFont( $family='arial', $style='', $size=10);
    $h= 7;
    $retrait = "      ";
    $pdf->Write($h, $txt= " Fiche Tiré des tache effectuees: \n");

    //ecriture gras en italique

    $pdf->SetFont( $family= '', $style='BIU');
    $pdf->Write($h, $txt= $numero . "\n");

    //ecriture normale

    $pdf->Write($h, $txt= $retrait . " NOM DE LA TACHE: " . $numero. "\n");

    $pdf->Write($h, $txt= $retrait . " DESCRIPTION DE LA TACHE EFFECTUEE: " . $matricule. "\n");

    $pdf->Write($h, $txt= $retrait . " DATE : " . $date. "\n");
    
    $pdf->Output($des='', $name='', $isUTF8=true);

    }
        

    
?>