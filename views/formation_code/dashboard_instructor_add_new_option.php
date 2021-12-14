<!--show add new lesson-->
<div id="show_add_new_lesson<?php echo $i; ?>" hidden>


    <div class="add_new_lesson">



        <div class="add_new_lesson_v1 update_question-v1">
            <div class="add_lesson_header">
                <div class="add_new_lesson_v1_title">Add an option</div>
                <div id="x_button_lesson<?php echo $i; ?>" class="x_botton_lesson" onclick="lesson_add_x_button( x='<?php echo $i; ?>'  )">
                    <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>

                </div>

            </div>



            <hr class="hr-border" style="position: relative; bottom: 10px; ">
            <div class="dash__content" style="position: relative;bottom: 100px;">

                <form id="add_new_lesson_form" action="formation_code/add_reponse.php?id=<?php echo $question['question_id']; ?>&id_f=<?php echo $_GET['id_f']; ?>&id_l=<?php echo $_GET['id_l'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="dash__instructor-my-courses">
                        <div class="add_new_lesson-v1__item">
                            <h4>Option content</h4>
                        </div>

                        <div>
                            <input class="add_new_lesson-v1__input-border" name="reponse_content" placeholder="Option content">
                        </div>

                        <input class="save-btn save-btn-topbar" type="submit" value="Save">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--show add new lesson-->