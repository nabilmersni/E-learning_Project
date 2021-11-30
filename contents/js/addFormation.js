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

//x_buton
$(document).ready(function (){
    $("#x_button").click(function(){
        $("#show_create_chapter").hide(300)

    });

});



////////////////////////////////
function lesson_add_button_show(x) {

    $("#lesson_hover_v1" + x).click(function() {
        $("#show_add_new_lesson").show(300)



    });

}
/////////////////////////////////

$(document).ready(function (){
    $("#lesson_hover").mouseenter(function(){
        $(this).css({
            "color":"#FF7244",
        })
        $("#lesson_hover_v1").css({
            "color":"#FF7244",

    })

    });
});
$(document).ready(function (){
    $("#lesson_hover").mouseleave(function(){
        $(this).css({
            "color":"#551a8b",
        })
        $("#lesson_hover_v1").css({
            "color":"#551a8b",
        })

    });
});

$(document).ready(function (){
    $("#lesson_hover_v1").mouseenter(function(){
        $(this).css({
            "color":"#FF7244",
    })
        $("#lesson_hover").css({
            "color":"#FF7244",
    })

    });
});
$(document).ready(function (){
    $("#lesson_hover_v1").mouseleave(function(){
        $(this).css({
            "color":"#551a8b",
    })
        $("#lesson_hover").css({
            "color":"#551a8b",
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

//select option :video/quiz

function lesson_select_option(x){

    $("#select_option"+ x).change(function(){
        var val = $(this).val();
        if(val == "video" ){
            $("#quiz_add_comment"+ x).hide()
            $("#drop_video"+ x).show(300)   
        }
        if(val == "quiz" ){
            $("#drop_video"+ x).hide()
            $("#quiz_add_comment"+ x).show(300)
        }
    });
}


//show lesson
/*
$(document).ready(function (){
    $("#lesson_hover_v1").click(function(){
        $("#show_add_new_lesson").show(300)

    });

});
*/
//hide lesson
function lesson_add_x_button(x){
    $("#x_button_lesson" + x).click(function(){
        $("#show_add_new_lesson"+x).hide(300)

    });

}



//preview image befor upload
function loadVideo(event, i) {
    //$("#show_add_new_lesson"+i).hide(300)
        var x = URL.createObjectURL(event.target.files[0]);
        $("#lesson_video"+i).attr("src", x);
        $("#lesson_video"+i).show(0);

        console.log(event);
}
//show video option lesson
/*
function loadVideo(x, event) {
    
        var x = URL.createObjectURL(event.target.files[0]);
        $("#lesson_video").attr("src", x);
        $("#lesson_video").show(0);

        console.log(event);
}

var loadFile = function(event) {
    var image = document.querySelector('.upload-file__img');
    image.src = URL.createObjectURL(event.target.files[0]);
};*/

