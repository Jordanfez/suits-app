<?php
        
    session_start();
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;    
    if(isset($_POST["print"])){
        $id = $_POST["id"];
        $intervention = mysql_query("SELECT * FROM intervention WHERE id = $id", $con);
        $intervenant = mysql_fetch_assoc($intervention);

        $nom = strtoupper($intervenant['nom']);
        $localisation = strtoupper($intervenant['localisation']);
        $date = strtoupper($intervenant['dates']);
        $statut = strtoupper($intervenant['statut']);
        $fin = strtoupper($intervenant['fin']);
        $description = strtoupper($intervenant['descriptions']);
        $client = strtoupper($intervenant['nom_client']);
        $tech = strtoupper($intervenant['nom_technicien']);

        $intervenention2 = "SELECT nom_technicien FROM effectuer WHERE nom = '$nom' ";
        $sql = mysql_query($intervenention2, $con) or die(mysql_error()) ;
        $intervenant2 = mysql_fetch_assoc($sql);

       // $tech2 = strtoupper($intervenant2['nom_technicien']);

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
    $pdf->Write($h, $txt= $nom . "\n");

    //ecriture normale

    $pdf->Write($h, $txt= $retrait . " lieu de l'intervention: " . $localisation. "\n");

    $pdf->Write($h, $txt= $retrait . " date de debut de l'intervention : " . $date. "\n");

    $pdf->Write($h, $txt= $retrait . " statut de l'intervention : " . $statut. "\n");

    $pdf->Write($h, $txt= $retrait . " date de fin de l'intervention: " . $fin. "\n");

    $pdf->Write($h, $txt= $retrait . " description de l'intervention: " . $description. "\n");
    
    $pdf->Write($h, $txt= $retrait . " Nom du client : " . $client. "\n");

    $pdf->Write($h, $txt= $retrait . " Nom du chef de l'equipe technique : " . $tech. "\n");

    $i = 1 ;
    while($intervenant2 = mysql_fetch_assoc($sql)){

        $pdf->Write($h, $txt= $retrait . " Nom des differents autres technicien sur l'intervention: " . $intervenant2['nom_technicien']. ','."\n");
       
        $i++;
    }

    $pdf->Output($des='', $name='', $isUTF8=true);

    }
        

    
?>