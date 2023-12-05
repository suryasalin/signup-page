$("#discussion_submit_button").on("click", function(e){
    //$("#discussion_form").submit(function(e){
        e.preventDefault();
        var title = $("#discussion_title").val();
        var discussion = $("#discussion_input_textarea").val();
    
        if (title == '' || discussion == '') { 
            $(".discussion_label_arrow, .discussion_required_fields").fadeIn("Slow");
            // error message, we select span tag with ID error_message and we change its content to this text
            setTimeout(function(){
                $('.discussion_label_arrow, .discussion_required_fields').fadeOut("Slow");
            }, 2000); 
        } else {
            var formData = new FormData(this);
            alert(formData);
            $.ajax({
                url: "widgets/discussion_board_submit.php",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success:function(data){
                    //alert(data);
                }
            });
        }
    });