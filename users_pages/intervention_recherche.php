<?php

include 'main2.php';

    function results($search)
    {
        $where = "";
        $search = preg_split('/[\s\-]/', $search);

        $count_keywords = count($search);

        foreach($search as $key=>$searches)
        {
            $where .= "nom LIKE '%$searches'";
            if ($key != ($count_keywords - 1))
            {
                $where .= " AND ";
            }
        }

        $query = mysql_query(" SELECT * FROM effectuer WHERE $where ");
        $query1 = mysql_query(" SELECT * FROM intervention WHERE $where ");
        $row = mysql_fetch_assoc($query1);
        $rows = mysql_num_rows($query);
        if($rows)
        {
            $i = 1 ;
            
                echo "<table id='tableau' class='table table-striped table-bordered' style='font-size: 14px; text-align: center; '>
                        <thead style='color: blue;text-align: center;' class='w3-blue'>
                            <th>code intervention</th>
                            <th style='text-align: center'>motif de l'intervention</th>
                            <th>date debut</th>
                            <th>date d'achèvement</th>
                            <th>Nom du client</th>
                            <th> nom des techniciens sur l'intervention</th>
                        </thead>
                        <tbody>";
             while($nom = mysql_fetch_assoc($query))
              { 
                echo "   <tr>";
                         echo "<td>".$row['code']."</td>
                               <td>".$nom['nom']."</td>
                               <td>".$row['dates']."</td>
                               <td>".$row['fin']."</td>
                               <td>".$row['nom_client']."</td>
                               <td>".$nom['nom_technicien']."</td>
                        ";
                      echo "   </tr>";
                     $i++ ; 
            }
         echo "   </tbody>
                </table>";
        }else {
            echo " <h4 style='text-align: center; color: red;'>Aucun resultat trouver</h4>";
        }

    }


?>