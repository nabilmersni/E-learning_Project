<!--show update chapter-->
<div id="show_update_chapter<?php echo $i; ?>" hidden>
    <div class="add_new_lesson">



        <div class="add_new_lesson_v1">
            <div class="add_lesson_header">
                <div class="add_new_lesson_v1_title">Update chapter</div>
                <div id="x_update_chapter<?php echo $i; ?>" class="x_botton_lesson" onclick="chapter_hide_update_button( x='<?php echo $i; ?>')">
                    <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>

                </div>

            </div>



            <hr class="hr-border" style="position: relative; bottom: 10px; ">
            <div class="dash__content" style="position: relative;bottom: 100px;">

                <form id="update_chapter_id" action="formation_code/update_chapter.php?id=<?php echo $chapter['chapter_id']; ?>&id_f=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="dash__instructor-my-courses">
                    <?php
                        $chapter_row = $chapterC->recuperer_chapitre($chapter['chapter_id']);
                        foreach ($chapter_row as $row) {
                        ?>    
                    <div class="add_new_lesson-v1__item">
                            <h4>chapter title</h4>
                        </div>

                          <div>
                                <input class="add_new_lesson-v1__input-border" name="chapter_title" value="<?php echo $row['chapter_title']; ?>">
                            </div>

                            <div class="add_new_lesson-v1__item" style="padding-top:2rem;">
                                <h4>Chapter Description</h4>
                            </div>

                            <div>
                                <textarea name="chapter_description" id="" class="add_new_lesson-v1__texterea-border"><?php echo $row['chapter_description']; ?></textarea>
                            </div>

                            <div class="add_new_lesson-v1__item">
                            <h4>chapter duration</h4>
                        </div>

                          <div>
                                <input type="number" class="add_new_lesson-v1__input-border" name="chapter_duration" value="<?php echo $row['chapter_duration']; ?>">
                            </div>


                        <?php
                        }
                        ?>

                        <input name="update_chapter_button" class="save-btn save-btn-topbar" type="submit" value="Update" style="position:relative;bottom:0px;">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--show update chapter-->