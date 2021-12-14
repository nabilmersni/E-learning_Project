<!--show update lesson-->
<?php
$Lesson_row = $lessonC->recuperer_lesson($lesson['lesson_id']);
foreach ($Lesson_row as $row) {
?>
    <div id="show_update_lesson<?php echo $row['lesson_id']; ?>" style="display: none;">


        <div class="add_new_lesson">



            <div class="add_new_lesson_v1">
                <div class="add_lesson_header">
                    <div class="add_new_lesson_v1_title">Update lesson</div>
                    <div id="x_button_lesson<?php echo $row['lesson_id']; ?>" class="x_botton_lesson" onclick="lesson_update_x_button( x='<?php echo $row['lesson_id']; ?>'  )">
                        <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>

                    </div>

                </div>



                <hr class="hr-border" style="position: relative; bottom: 10px; ">
                <div class="dash__content" style="position: relative;bottom: 100px;">

                    <form id="add_new_lesson_form" action="formation_code/update_lesson.php?formation_id=<?php echo $_GET['id']; ?>&lesson_id=<?php echo $lesson['lesson_id'] ?>" method="POST" enctype="multipart/form-data">

                        <div class="dash__instructor-my-courses">

                            <div class="add_new_lesson-v1__item">
                                <h4>Lesson title</h4>
                            </div>

                            <div>
                                <input class="add_new_lesson-v1__input-border" value="<?php echo $row['lesson_title']; ?>" name="lesson_title">
                            </div>

                            <div class="add_new_lesson-v1__item" style="padding-top:1.5rem">
                                <h4 style="padding-top:1rem">Description du cours</h4>
                            </div>

                            <div>
                                <textarea name="lesson_description" value="" id="" class="add_new_lesson-v1__texterea-border"><?php echo $row['lesson_description']; ?></textarea>
                            </div>

                            <div class="add_new_lesson-v1__item">
                                <h4 style="padding-top:2rem">Type of lesson</h4>
                            </div>

                            <select id="select_option" name="lesson_type" class="add_new_lesson-v1__select-border">
                                <option value="video">Video</option>
                            </select>

                            <div id="drop_video">
                                <div class="add_new_lesson-v1__item">
                                    <h4 style="padding-top: 2rem;">Video</h4>
                                </div>

                                <div class="add_new_lesson-v1__input_video" style="height: 80%;">

                                    <div class="add_new_lesson-v1__input_video_border">

                                        <video id="lesson_video<?php echo $row['lesson_id']; ?>" src="formation_code/uploads/<?php echo $row['lesson_video']; ?>" width="510px" height="300px" controls></video>

                                    </div>

                                </div>
                            </div>
                            <div>
                                <input type="text" class="add_new_lesson-v1__input-border" value="<?php echo $row['lesson_video']; ?>" name="lesson_video_url" style="display: none;">
                            </div>
                            
                            <div class="add_new_lesson-v1__input_video_device_icon" style="padding-left:33%">
                                <svg id="my_device_icon" aria-hidden="true" focusable="false" width="26" height="26" viewBox="0 0 32 32">
                                    <g fill="none" fillRule="evenodd">
                                        <rect id="my_device_icon_color" class="uppy-ProviderIconBg" width="32" height="32" rx="16" fill="#2275D7">
                                        </rect>
                                        <path d="M21.973 21.152H9.863l-1.108-5.087h14.464l-1.246 5.087zM9.935 11.37h3.958l.886 1.444a.673.673 0 0 0 .585.316h6.506v1.37H9.935v-3.13zm14.898 3.44a.793.793 0 0 0-.616-.31h-.978v-2.126c0-.379-.275-.613-.653-.613H15.75l-.886-1.445a.673.673 0 0 0-.585-.316H9.232c-.378 0-.667.209-.667.587V14.5h-.782a.793.793 0 0 0-.61.303.795.795 0 0 0-.155.663l1.45 6.633c.078.36.396.618.764.618h13.354c.36 0 .674-.246.76-.595l1.631-6.636a.795.795 0 0 0-.144-.675z" fill="#FFF"></path>
                                    </g>
                                </svg>
                                <label id="my_device" class="add_new_lesson-v1__input_video_device" for="<?php echo $row['lesson_id']; ?>">Change Video
                                </label>
                                <input onchange="updateVideo(event, <?php echo $row['lesson_id']; ?>)" name="lesson_video" type="file" id="<?php echo $row['lesson_id']; ?>" value="video" class="i" style="display:none">
                            </div>


                            <input class="save-btn save-btn-topbar" type="submit" value="Save">

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
<?php  } ?>
<!--end show update lesson-->