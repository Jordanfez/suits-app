<?php

include 'main2.php';
    
   function results($search){

       $where = "";
       $search = preg_split('/[\s\-]/', $search);

       $count = count($search);

       foreach($search as $key=>$searches){
           $where .= "nom LIKE '%$searches'";
           if($key != ($count - 1)){
               $where .= " AND ";
           }
       }
       $query = mysql_query("SELECT * FROM administrateurs WHERE  $where AND etat ='on'");
       $rows = mysql_num_rows($query);
       if($rows){
           while($nom = mysql_fetch_assoc($query)){
            echo  "<font size ='4'><u> CODE DE ADMINISTRATEUR </u></font><strong>:</strong>&nbsp ".$nom['code']."<strong>;</strong>&nbsp  NOM &nbsp<strong>:</strong> ".$nom['nom']."<strong>;</strong>&nbsp PRENOM &nbsp<strong>:</strong> ".$nom['prenom']."<strong>;</strong>&nbsp TELEPHONE &nbsp<strong>:</strong>".$nom['telephone']."<br/> <br/>";
        }
       }else{
           echo "pas de resultat trouver";
       }

   }
?>