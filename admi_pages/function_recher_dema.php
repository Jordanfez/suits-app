<?php

include 'main2.php';
    
   function results($search){

       $where = "";
       $search = preg_split('/[\s\-]/', $search);

       $count = count($search);

       foreach($search as $key=>$searches){
           $where .= "lieu_intervention LIKE '%$searches'";
           if($key != ($count - 1)){
               $where .= " AND ";
           }
       }
       $query = mysql_query("SELECT * FROM demande WHERE  $where AND etat ='on'");
       $rows = mysql_num_rows($query);
       if($rows){
           while($nom = mysql_fetch_assoc($query)){
            echo  "<font size ='4'><u> NUMERO DEMANDE </u></font><strong>:</strong>&nbsp ".$nom['numero_demande']."<strong>;</strong>&nbsp  Numero planning &nbsp<strong>:</strong> ".$nom['numero_planning']."<strong>;</strong>&nbsp code &nbsp<strong>:</strong> ".$nom['code']."<strong>;</strong>&nbsp date demande &nbsp<strong>:</strong>".$nom['date_demande']."<strong>;</strong>&nbsp objet  &nbsp<strong>:</strong> ".$nom['objet']."<strong>;</strong>&nbsp reception &nbsp<strong>:</strong> ".$nom['reception']."<strong>;</strong>&nbsp lieu intrevention &nbsp<strong>:</strong>  ".$nom['lieu_intervention']."<strong>;</strong>&nbsp date aller &nbsp<strong>:</strong> ".$nom['date_aller']."<strong>;</strong>&nbsp date retour &nbsp<strong>:</strong> ".$nom['date_retour']."<strong>;</strong>&nbsp date retour &nbsp<strong>:</strong> ".$nom['prioriter']."<br/> <br/>";
        }
       }else{
           echo "pas de resultat trouver";
       }

   }
?>