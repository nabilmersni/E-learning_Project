$(document).ready(function (){
    $("#hide_prix").click(function(){
        $("#table_prix").toggle(300)

    });

});


function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }


$(document).ready(function (){
    $("#popup_id").click(function(){
        $(".course_information").toggle()

    });

});




function myFunction2() {
    var popup = document.getElementById("myPopup2");
    popup.classList.toggle("show");
  }


$(document).ready(function (){
    $("#popup_id2").click(function(){
        $("#bande_annance").toggle(300)

    });

});


$(document).ready(function (){
    $("#create_chapter").click(function(){
        $("#show_create_chapter").show(300)

    });

});

//lessons toggle
$(document).ready(function (){
    $("#up_button").click(function(){
        $("#lesson_lines").toggle(20)
        $("#down_button").toggle()
        $("#up_button").toggle()
        

    });

});

/////////////test
//lessons toggle

////////////////
$(document).ready(function (){
    $("#down_button").click(function(){
        $("#lesson_lines").toggle(20)
        $("#down_button").toggle()
        $("#up_button").toggle()

    });

});

//x_buton
$(document).ready(function (){
    $("#x_button").click(function(){
        $("#show_create_chapter").hide(300)

    });

});


$(document).ready(function (){
    $("#lesson_hover").mouseenter(function(){
        $(this).css({
            "color":"#FF7244",
            "width":"2.8rem"
        })
        $("#lesson_hover_v1").css({
            "color":"#FF7244",
            "font-size": "3.3rem"
    })

    });
});
$(document).ready(function (){
    $("#lesson_hover").mouseleave(function(){
        $(this).css({
            "color":"#551a8b",
            "width":"2.5rem"
        })
        $("#lesson_hover_v1").css({
            "color":"#551a8b",
            "font-size": "3rem"
        })

    });
});

$(document).ready(function (){
    $("#lesson_hover_v1").mouseenter(function(){
        $(this).css({
            "color":"#FF7244",
            "font-size": "3.3rem"
    })
        $("#lesson_hover").css({
            "color":"#FF7244",
            "width":"2.8rem"
    })

    });
});
$(document).ready(function (){
    $("#lesson_hover_v1").mouseleave(function(){
        $(this).css({
            "color":"#551a8b",
            "font-size": "3rem"
    })
        $("#lesson_hover").css({
            "color":"#551a8b",
            "width":"2.5rem"
    })

    });
});



//my device button hover
$(document).ready(function (){
    $("#my_device_icon").mouseenter(function(){
        $(this).css({
            "width":"29px",
            "height":"29px"
        })
        $("#my_device").css({
            "color":"#FF7244",
            "font-size": "1.8rem"
        })
        $("#my_device_icon_color").css({
            fill:"#FF7244"
        })

    });
});
$(document).ready(function (){
    $("#my_device_icon").mouseleave(function(){
        $(this).css({
            "width":"26px",
            "height":"26px"
        })
        $("#my_device").css({
            "color":"#525252",
            "font-size": "1.6rem"
        })
        $("#my_device_icon_color").css({
            fill:"#2275D7"
        })

    });
});
//////////////
$(document).ready(function (){
    $("#my_device").mouseenter(function(){
        $("#my_device_icon").css({
            "width":"29px",
            "height":"29px"
        })
        $(this).css({
            "color":"#FF7244",
            "font-size": "1.8rem"
        })
        $("#my_device_icon_color").css({
            fill:"#FF7244"
        })

    });
});
$(document).ready(function (){
    $("#my_device").mouseleave(function(){
        $("#my_device_icon").css({
            "width":"26px",
            "height":"26px"
        })
        $(this).css({
            "color":"#525252",
            "font-size": "1.6rem"
        })
        $("#my_device_icon_color").css({
            fill:"#2275D7"
        })

    });
});
//my device button hover

//select option :video
$(document).ready(function (){
    $("#select_option").change(function(){
        var val = $(this).val();
        if(val == "video" ){
            $("#quiz_add_comment").hide()
            $("#drop_video").show(300)
            
        }
    });
});

//select option: quiz
$(document).ready(function (){
    $("#select_option").change(function(){
        var val = $(this).val();
        if(val == "quiz" ){
            $("#drop_video").hide()
            $("#quiz_add_comment").show(300)

        }
    });
});


//show lesson
$(document).ready(function (){
    $("#lesson_hover_v1").click(function(){
        $("#show_add_new_lesson").show(300)

    });

});
//hide lesson
$(document).ready(function (){
    $("#x_button_lesson").click(function(){
        $("#show_add_new_lesson").hide(300)

    });

});



//preview image befor upload

//show add new requirement

