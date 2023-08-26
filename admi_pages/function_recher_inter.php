<?php

include 'main2.php';
    
   function results($search){

       $where = "";
       $search = preg_split('/[\s\-]/', $search);

       $count = count($search);

       foreach($search as $key=>$searches){
           $where .= "nature LIKE '%$searches'";
           if($key != ($count - 1)){
               $where .= " AND ";
           }
       }
       $query = mysql_query("SELECT * FROM intervention WHERE  $where AND etat ='on'");
       $rows = mysql_num_rows($query);
       if($rows){
           while($nom = mysql_fetch_assoc($query)){
            echo  "<font size ='4'><u> NUMERO INTERVENTION </u></font><strong>:</strong>&nbsp ".$nom['numero_intervention']."<strong>;</strong>&nbsp  Date &nbsp<strong>:</strong> ".$nom['dates']."<strong>;</strong>&nbsp nature &nbsp<strong>:</strong> ".$nom['nature']."<strong>;</strong>&nbsp Observation &nbsp<strong>:</strong>".$nom['observation']."<strong>;</strong>&nbsp Matricule du techinicien  &nbsp<strong>:</strong> ".$nom['matricule_technicien']."<br/> <br/>";
        }
       }else{
           echo "pas de resultat trouver";
       }

   }
?>