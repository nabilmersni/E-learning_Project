
<?php

include_once ('../../controllers/reponseC.php');


$reponseC = new ReponseC();
$lesson_id = $_GET['lesson_id'];
$reponse_id = $_GET['reponse_id'];
$page_order = $_GET['page_order'];
$formation_id=$_GET['formation_id'];

$num = $reponseC->get_checked($reponse_id);

if($num ==0)
{
    $numero =1;
}
 if($num ==1){
    $numero = 0;
}
        
      
        $reponseC->modifier_bonne_reponse($reponse_id ,$numero);
       header("Location: ../acceder_cours_achete-quiz.php?formation_id=$formation_id&lesson_id=$lesson_id&test=quiz&page_order=$page_order");
    



?>


