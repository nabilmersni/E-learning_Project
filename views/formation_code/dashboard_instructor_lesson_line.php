<!--lesson line-->
<div id="lesson_lines<?php echo $i; ?>" class="chapter-lesson" class="lesson_lines_test">
    <?php
    $listeLessons = $lessonC->afficher_lessons_page_order($chapter['chapter_id']);
    foreach ($listeLessons as $lesson) {
    ?>
        <!--quiz lesson-->
        <?php if (strcmp($lesson['lesson_type'], "quiz") == 0) { ?>
            <div class="chapter-lesson-l1-icon-aligne">
                <div class="chapter-lesson-l1">
                    <svg class="chapter-lesson-l1-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.649 3.084A1 1 0 015.163 4.4 13.95 13.95 0 004 10c0 1.993.416 3.886 1.164 5.6a1 1 0 01-1.832.8A15.95 15.95 0 012 10c0-2.274.475-4.44 1.332-6.4a1 1 0 011.317-.516zM12.96 7a3 3 0 00-2.342 1.126l-.328.41-.111-.279A2 2 0 008.323 7H8a1 1 0 000 2h.323l.532 1.33-1.035 1.295a1 1 0 01-.781.375H7a1 1 0 100 2h.039a3 3 0 002.342-1.126l.328-.41.111.279A2 2 0 0011.677 14H12a1 1 0 100-2h-.323l-.532-1.33 1.035-1.295A1 1 0 0112.961 9H13a1 1 0 100-2h-.039zm1.874-2.6a1 1 0 011.833-.8A15.95 15.95 0 0118 10c0 2.274-.475 4.44-1.332 6.4a1 1 0 11-1.832-.8A13.949 13.949 0 0016 10c0-1.993-.416-3.886-1.165-5.6z" clip-rule="evenodd"></path>
                    </svg>
                    <h4 class="chapter-lesson-v1">
                        <?php echo $lesson['lesson_title'] ?> </h4>
                </div>


                <div style="padding-right: 1.9rem;">

                <span class="option_quiz" >
                <a style="text-decoration:none;color:currentColor" href="dash_instructor-quiz-add.php?id_f=<?php echo $_GET['id']; ?>&id_l=<?php echo $lesson['lesson_id']; ?> ">
                    
               <i class="fas fa-question" style="padding-right: 1.25rem;position:relative;bottom: 0.25em;"></i>
            </a>    
            </span>
                
                    <span class="update_lesson_btn_hover" id="edit_quiz<?php echo $lesson['lesson_id']; ?>"  onclick="quiz_show_update_x_button( x='<?php echo $lesson['lesson_id']; ?>')">
                    <svg  class="chapter-lesson-l1-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                    </span>

                        <svg id="update_lesson_button" class="chapter-lesson-l1-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    

                </div>
            </div>
            
        <?php } ?>
        <!--end quiz lesson-->


        <!--video lesson -->
        <?php if (strcmp($lesson['lesson_type'], "video") == 0) { ?>
            <div class="chapter-lesson-l1-icon-aligne">
                <div class="chapter-lesson-l1">
                    <svg class="chapter-lesson-l1-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                        </path>
                    </svg>
                    <h4 class="chapter-lesson-v1"><?php echo $lesson['lesson_title'] ?> </h4>
                </div>


                <div style="padding-right: 1.9rem;">

                    <span id="update_lesson_button_show<?php echo $lesson['lesson_id']; ?>" style="text-decoration:none; color:currentColor" onclick="lesson_show_update_x_button( x='<?php echo $lesson['lesson_id']; ?>')" >
                        <svg id="update_lesson_button" class="chapter-lesson-l1-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
        </span>

                    <a style="text-decoration:none;color:currentColor" href="formation_code/delete_lesson.php?id_f=<?php echo $_GET['id']; ?>&id_l=<?php echo $lesson['lesson_id']; ?> ">
                        <svg id="update_lesson_button" class="chapter-lesson-l1-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>

                </div>
            </div>
        <?php } ?>
        <!--end video lesson-->




<?php include("formation_code/dashboard_instructor_update_lesson.php"); ?>
<?php include("formation_code/dashboard_instructor_update_quiz.php"); ?>  
    <?php
    }
    ?>
          
</div>
<!--lesson line-->