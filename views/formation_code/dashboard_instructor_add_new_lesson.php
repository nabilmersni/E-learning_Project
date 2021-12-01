<!--show add new lesson-->
<div id="show_add_new_lesson<?php echo $i; ?>" hidden>


    <div class="add_new_lesson">



        <div class="add_new_lesson_v1">
            <div class="add_lesson_header">
                <div class="add_new_lesson_v1_title">Add a lesson</div>
                <div id="x_button_lesson<?php echo $i; ?>" class="x_botton_lesson" onclick="lesson_add_x_button( x='<?php echo $i; ?>'  )">
                    <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>

                </div>

            </div>



            <hr class="hr-border" style="position: relative; bottom: 10px; ">
            <div class="dash__content" style="position: relative;bottom: 100px;">

                <form id="add_new_lesson_form" action="formation_code/add_lesson.php?formation_id=<?php echo $_GET['id']; ?>&chapter_id=<?php echo $chapter['chapter_id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="dash__instructor-my-courses">
                        <div class="add_new_lesson-v1__item">
                            <h4>Lesson title</h4>
                        </div>

                        <div>
                            <input class="add_new_lesson-v1__input-border" name="lesson_title" placeholder="My lesson title">
                        </div>

                        <div class="add_new_lesson-v1__item" style="padding-top:1.5rem">
                            <h4 style="padding-top:1rem">Description du cours</h4>
                        </div>

                        <div>
                            <textarea name="lesson_description" id="" class="add_new_lesson-v1__texterea-border" placeholder="Description for my lesson"></textarea>
                        </div>

                        <div class="add_new_lesson-v1__item">
                            <h4 style="padding-top:2rem">Type of lesson</h4>
                        </div>

                        <select id="select_option<?php echo $i; ?>" name="lesson_type" class="add_new_lesson-v1__select-border" onclick="lesson_select_option( x='<?php echo $i; ?>'  )">
                            <option value="" selected disabled>Select lesson</option>
                            <option value="video">Video</option>
                            <!--   <option value="article">Article</option>   -->
                            <option value="quiz">Quiz</option>
                        </select>

                        <div id="drop_video<?php echo $i; ?>" hidden>
                            <div class="add_new_lesson-v1__item">
                                <h4>Video</h4>
                            </div>

                            <div class="add_new_lesson-v1__input_video">
                                
                            <div class="add_new_lesson-v1__input_video_border">
                            <video id="lesson_video<?php echo $i; ?>" src="" width="510px" height="300px"  controls hidden></video>    
                                
                                    <div class="add_new_lesson-v1__input_video_title">
                                        <span style="color: #3e87dc;">Drop a file here</span> or import from:
                                    </div>

                                    <div class="add_new_lesson-v1__input_video_device_icon">
                                        <svg id="my_device_icon" aria-hidden="true" focusable="false" width="26" height="26" viewBox="0 0 32 32">
                                            <g fill="none" fillRule="evenodd">
                                                <rect id="my_device_icon_color" class="uppy-ProviderIconBg" width="32" height="32" rx="16" fill="#2275D7">
                                                </rect>
                                                <path d="M21.973 21.152H9.863l-1.108-5.087h14.464l-1.246 5.087zM9.935 11.37h3.958l.886 1.444a.673.673 0 0 0 .585.316h6.506v1.37H9.935v-3.13zm14.898 3.44a.793.793 0 0 0-.616-.31h-.978v-2.126c0-.379-.275-.613-.653-.613H15.75l-.886-1.445a.673.673 0 0 0-.585-.316H9.232c-.378 0-.667.209-.667.587V14.5h-.782a.793.793 0 0 0-.61.303.795.795 0 0 0-.155.663l1.45 6.633c.078.36.396.618.764.618h13.354c.36 0 .674-.246.76-.595l1.631-6.636a.795.795 0 0 0-.144-.675z" fill="#FFF"></path>
                                            </g>
                                        </svg>
                                        <label id="my_device" class="add_new_lesson-v1__input_video_device" for="my_device_upload<?php echo $i; ?>">My Device
                                        </label>
                                        <input  onchange="loadVideo(event, <?php echo $i; ?>)" name="lesson_video" type="file" id="my_device_upload<?php echo $i; ?>" value="video" class="i" style="display:none">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--quiz comment-->
                        <div id="quiz_add_comment<?php echo $i; ?>" class="add_new_lesson-v1__item_comment" hidden>
                            Save the new lecture, and then you can edit the quiz
                        </div>

                        <input class="save-btn save-btn-topbar" type="submit" value="Save">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--show add new lesson-->