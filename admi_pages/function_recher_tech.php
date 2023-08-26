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
       $query = mysql_query("SELECT * FROM techniciens WHERE  $where AND etat ='on'");
       $rows = mysql_num_rows($query);

       if($rows)
       {
           $i = 1 ;
               echo "<table id='tableau' class='table table-striped table-bordered' style='font-size: 14px; text-align: center; '>
                       <thead style='color: blue;text-align: center;' class='w3-blue'>
                           <th>Matricule</th>
                           <th>Nom</th>
                           <th>prenom</th>
                           <th>specialiter</th>
                           <th>Adrese</th>
                       </thead>
                       <tbody>";
            while($nom = mysql_fetch_assoc($query))
             { 
               echo "   <tr>";
                        echo "<td>".$nom['matricule']."</td>
                              <td>".$nom['nom']."</td>
                              <td>".$nom['prenom']."</td>
                              <td>".$nom['specialiter']."</td>
                              <td>".$nom['adresse']."</td>
                       ";
                     echo "   </tr>";
                    $i++ ; 
           }
        echo "   </tbody>
               </table>";
       }else {
           echo " Aucun resultat trouver";
       }

   }
?>
