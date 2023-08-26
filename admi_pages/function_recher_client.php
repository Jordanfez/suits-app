<?php

include 'main2.php';

    function results($search)
    {
        $where = "";
        $search = preg_split('/[\s\-]/', $search);

        $count_keywords = count($search);

        foreach($search as $key=>$searches)
        {
            $where .= "nom_client LIKE '%$searches'";
            if ($key != ($count_keywords - 1))
            {
                $where .= " AND ";
            }
        }

        $query = mysql_query(" SELECT nom_client, statut, nom, dates, fin, localisation FROM intervention WHERE $where AND etat='on' ");
        $rows = mysql_num_rows($query);
        if($rows)
        {
            $i = 1 ;
                echo "<table id='tableau' class='table table-striped table-bordered' style='font-size: 14px; text-align: center; '>
                        <thead style='color: blue;text-align: center;' class='w3-blue'>
                            <th>nom client</th>
                            <th>statut de l'intervention</th>
                            <th>nom de l'intervention</th>
                            <th>date debut</th>
                            <th> date de fin</th>
                            <th>localisation</th>
                        </thead>
                        <tbody>";
             while($nom = mysql_fetch_assoc($query))
              { 
                echo "   <tr>";
                         echo "<td>".$nom['nom_client']."</td>
                               <td>".$nom['statut']."</td>
                               <td>".$nom['nom']."</td>
                               <td>".$nom['dates']."</td>
                               <td>".$nom['fin']."</td>
                               <td>".$nom['localisation']."</td>
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