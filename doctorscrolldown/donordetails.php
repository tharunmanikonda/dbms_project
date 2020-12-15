<?php 
require_once "../pdo.php";

session_start();
if(isset($_POST['Cancel'])){
    header('Location: docterpage.php');
    return;
}
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
              <?php require_once "bootstrap.php";?>
     
        </head>
        <body>
            <?php   $count = 1;
                    $stmt3 = $pdo->query("SELECT D_NAME,blood_id FROM `doner`");
                    $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                    
                    
            ?>
            <h1>donors are</h1>
                <table class="table table-striped">
                   <thead>
                        <tr>
                             <th scope="col">sno</th>
                             <th scope="col">name</th>
                             <th scope="col">blood group</th>
                        </tr>
                    </thead>
                            <tbody>
                                <?php
                                    foreach ( $rows3 as $row ) {
                                        echo "<td class=''>".$count."</td>";
                                        echo "<td class=''>".htmlentities($row['D_NAME'])."</td>";
                                        $stmt4 = $pdo->query("SELECT TYPE_OF_BLOOD FROM `blood_group`where BLOOD_ID ='".$row['blood_id']."'");
                                        $rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                        echo "<td class=''>".htmlentities($rows4[0]['TYPE_OF_BLOOD'])."</td>";
                                        echo "</tr>";
                                        $count++;
                                        }
                                ?>
                            </tbody>
                </table>
                <a class="btn btn-primary btn-lg btn-block"  href="../doctorpage.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                                back
                </a>
        </body>
        </html>
        
