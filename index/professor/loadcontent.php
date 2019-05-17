<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();


$username=$_SESSION['user'];


 $res = mysqli_query($con, "SELECT * FROM groupe WHERE pseudo_prof = '$username' LIMIT 2");
$row = mysqli_fetch_assoc($res);
     echo '<tr>
         <td id="img-group-td"><img id="group-pic" src="assets/groups-images/'.$row['image_groupe'].'" class="img-responsive" style="height:60px;border-radius:50%">
             <style scoped>
                 @media (max-width:768px) {
                     #group-pic {
                         height: auto !important;
                     }
                 }
             </style>
         </td>';
         echo '<td id="nom-group-td">'.$row['nom'].'</td>';
         echo '<td>'.$row['description'].'</td>';
         echo '<td>'.$row['date_creation'].'</td>';
         echo '<td>'.$row['nbr_fichier'].'</td>';
         echo '<td>'.$row['nbr_etudient'].'</td>';
         echo '<td class="code-td" onclick="copyvalue(this)"><code class=".code" id="codeid">'.$row['groupe_cle'].'</code>
             <span class="copied" style="position: absolute;display:none;margin-top: 28px;margin-left:-8.7%;color: white;
                                                        background: #333;
                                                        padding: 5px 5px;
                                                        width:8%;
                                                        text-align:center;
                                                        border-radius: 15px;"></span></td>';
         echo '<td><button style="color: #fff;background-color: #138496; border: none;" type="button" id="btn-edit" class="btn btn-primary">Edit</button></td>';
         echo '<td><button style="color: #fff;background-color: #dc3545; border: none;" type="button" id='.$row['id'].' class="btn-delete btn btn-danger">delete</button></td>
     </tr>';