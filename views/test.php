<?php
include_once('../controllers/chapterC.php');


$chapterC = new ChapterC();
$listeChapters = $chapterC->afficher_chapitres_page_order($_GET['id']);

$i=0;
?>

<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/css/notif.css" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="stylesheet" href="../contents/css/chart_style.css" />
    <link rel="stylesheet" href="../contents/css/dash_instructor-courses.css" />
    <link rel="stylesheet" href="../contents/css/dash_instructor-quiz.css" />


    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn-dash</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
      body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   #page_list li
   {
    padding:16px;
    background-color:#f9f9f9;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
      #page_list li.ui-state-highlight
   {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
  </style>
</head>

<body>


<div class="container box">
   <h1 align="center">Sorting Table Row using JQuery Drag Drop with Ajax PHP</h1>
   <br />
   <ul class="list-unstyled" id="page_list">
   <?php
    $i == 0;
    foreach ($listeChapters as $chapter) {
        $i=$chapter['page_order'] +1;
    ?>

    <li id="<?php echo $chapter['chapter_id']; ?>">Chaptre <?php echo $i; ?>: &nbsp</span><?php echo $chapter['chapter_title']; ?> </li>
    <?php } ?>
   </ul>
   <input type="hidden" name="page_order_list" id="page_order_list" />
  </div>
  <div class="course__add" style="padding: 0rem 0rem;">
  skdnvsljvnjslfnvjsbvs
  </div>








  <script>
$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
     document.location.reload();
    }
   });
  }
 });

});
</script>
</body>

</html>