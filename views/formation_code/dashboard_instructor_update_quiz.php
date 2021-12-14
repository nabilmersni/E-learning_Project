<!--show edit quiz part1 -->
<?php
$quiz_row = $lessonC->recuperer_lesson($lesson['lesson_id']);
foreach ($quiz_row as $quiz) {
?>

<div id="show_update_quiz_p1<?php echo $quiz['lesson_id']; ?>" style="display: none;">

<div class="add_new_lesson">



    <div class="add_new_lesson_v1">
        <div class="add_lesson_header">
            <div class="add_new_lesson_v1_title">Add a lesson</div>

            <div id="x_button_quiz_p1<?php echo $quiz['lesson_id']; ?>" class="x_botton_lesson" onclick="quiz_update_x_button( x='<?php echo $quiz['lesson_id']; ?>'  )">

                <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>


            </div>

        </div>



        <hr class="hr-border" style="position: relative; bottom: 10px; ">
        <div class="dash__content" style="position: relative;bottom: 100px;">

        <form id="update_quiz_form" action="formation_code/update_lesson.php?formation_id=<?php echo $_GET['id']; ?>&lesson_id=<?php echo $lesson['lesson_id'] ?>" method="POST" >

            <div class="dash__instructor-my-courses">
                <div class="add_new_lesson-v1__item">
                    <h4>Lesson title</h4>
                </div>

                <div>
                    <input class="add_new_lesson-v1__input-border" value="<?php echo $quiz['lesson_title']; ?>" name="lesson_title" placeholder="My lesson title">
                </div>

                <div class="add_new_lesson-v1__item" style="padding-top:2.5rem">
                    <h4>Description du cours</h4>
                </div>

                <div>
                    <textarea name="lesson_description" id="" class="add_new_lesson-v1__texterea-border" placeholder="Description for my lesson"><?php echo $quiz['lesson_description']; ?></textarea>
                </div>



                <input class="save-btn save-btn-topbar" type="submit" value="Save" style="position:relative ;bottom:3rem">

            </div>
            </form>
        </div>

    </div>
</div>
</div>
<?php  } ?>
<!--show edit quiz part1 -->