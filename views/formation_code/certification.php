<?php 

include_once('../../controllers/formationC.php');

$formationC = new FormationC();
$listeFormations = $formationC->recuperer_formation($_GET['id']);



    foreach ($listeFormations as $formation) {

header('Content-type: image/jpeg');
$font=realpath('Montserrat-Black.ttf');
$image=imagecreatefromjpeg("certif.jpg");
$color=imagecolorallocate($image, 61, 61, 61);
$date=date('d F, Y');
imagettftext($image, 10, 0, 695, 573, $color,$font, $date);

$color_name=imagecolorallocate($image, 255, 114, 68);
$name=$formation['fullname'];
$font_name=realpath('FREESCPT.ttf');
imagettftext($image, 58, 0, 320, 315, $color_name,$font_name, $name);

$name=$formation['name'];
imagettftext($image, 18, 0, 180, 400, $color,$font, $name);
imagejpeg($image,"certificate/$name.jpg");
imagejpeg($image);
imagedestroy($image);


    }
?>