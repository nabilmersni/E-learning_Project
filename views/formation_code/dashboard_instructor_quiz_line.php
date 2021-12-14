<!--lesson line-->
<div id="lesson_lines<?php echo $i; ?>" class="chapter-lesson add_option_content-v1" class="lesson_lines_test">
    <?php
    $listeReponses = $reponseC->afficher_reponses_page_order($question['question_id']);
    foreach ($listeReponses as $reponse) {
    ?>

        <!--quiz lesson -->

        <div class="chapter-lesson-l1-icon-aligne">
            <div class="chapter-lesson-l1">

            <a href="formation_code/bonne_reponse.php?id=<?php echo $reponse['reponse_id']; ?>&true=<?php echo $reponse['bonne_reponse']; ?>&id_f=<?php echo $_GET['id_f']; ?>&id_l=<?php echo $_GET['id_l']; ?>" id="checkkk" class="checkbox_option">
                <?php if($reponse['bonne_reponse'] == 0){ ?>
            <i class="far fa-square"></i> 
            <?php } ?>
            <?php if($reponse['bonne_reponse'] == 1){ ?>
            <i class="fas fa-check-square"></i>
            <?php } ?>
            </a>    
            
                <h4 class="chapter-lesson-v1" style="max-width: 45rem;"><?php echo $reponse['reponse_content']; ?> </h4>
                <?php if($reponse['bonne_reponse'] == 1){ ?>
                <span class="check_bonne_reponse"><i class="far fa-check-circle" style="color: green;"></i></span>
                <?php } ?>
            </div>


            <div style="padding-right: 1.9rem;">

                <span id="update_lesson_button_show<?php echo $reponse['reponse_id']; ?>" style="text-decoration:none; color:currentColor" onclick="lesson_show_update_x_button( x='<?php echo $reponse['reponse_id']; ?>')">
                    <svg id="update_lesson_button" class="chapter-lesson-l1-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                </span>

                <a style="text-decoration:none;color:currentColor" href="formation_code/delete_reponse.php?id=<?php echo $reponse['reponse_id']; ?>&id_l=<?php echo $_GET['id_l']; ?>&id_f=<?php echo $_GET['id_f']; ?> ">
                    <svg id="update_lesson_button" class="chapter-lesson-l1-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>
        </div>
        <!--end quiz lesson-->




        <?php include("formation_code/dashboard_instructor_update_option.php"); 
        ?>
       
    <?php
    }
    ?>

</div>
<!--lesson line-->