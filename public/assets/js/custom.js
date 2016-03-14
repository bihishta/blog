
$(document).ready(function(){


//     jQuery(function(){

//     jQuery("html[lang=pr]").attr("dir", "rtl")
//             .find("body").addClass("right-to-left");

// });

    $(".join").click(function(){
        var student_id = $('.student_id').val().trim();
        var course_id = $(this).attr('name');

        $.ajax({
            type:'GET',
            url: 'join_course/'+ student_id +'/' + course_id,
            success: function(data){
                console.log(data);
             // $('.test').html(data);
               //$('.joined').html('you joined the course, wait for approval of course teacher.');
            }
        });
       
    });

    $("#search_form").submit(function(event){
        //alert('hi');
        var key = $("#keyword").val();
        if (key == '') {
            alert('no keyword recieved');
        }
        $.ajax({
            type: "POST",
            url: "search_course",
            data: 'key=' + key,
            success: function(data){
                // .html('') will empty the .chat element all data
                $('.chat').html('');
                for(i=0; i<data.length; i++){
                    $('.chat').append('<li>' + data[i]['name'] + '</li>');
                    // htmlData = '<li>'+ data[i]['name'];
                    // htmlData .= '<p><small>'+ data[i]['updated_at'] + '</small></p>';
                    // htmlData .= '<p>'+ data[i]['description'] + '</p></li>';

                    // $('.chat').append(htmlData);
                 }            

            }
        });
    event.preventDefault();   
});



//Add more skills to teachers
    $('.well').hide();

	$('.add-more-skill').click(function(){
	var id = $(this).attr('name');
	var constructor_id = $('.constructor_id_' + id).val().trim();

    var constructor_name = $('.constructor_name_' + id).val().trim();

       $(".dataTable_wrapper").append('<div class="well"><h4>Add More Skills to '+ constructor_name + '</h4><form method="post" action="add_skill/'+ constructor_id +'"><input name="skill" class="form-control" /><button type="submit" class="btn btn-success pull-right" style="margin-top:15px; margin-right:40px;">Add</button></form><button class="btn btn-info remove pull-right" style="margin-top:15px; margin-right:10px;">Cancel</button></div>');
	});

	$('body').on('click', '.remove', function(e){
		$(this).parent('.well').remove();
	});
// Add more skills to teachers

// //teacher info
//    $('.teacher_info').click(function(){
//     var id = $(this).attr('name');

//    });

//profile
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });

    $('[data-toggle="tooltip"]').tooltip();

// Form password
        $("#forgot-password").submit(function(event){
            var email = $("#email").val();

            $ajax({
            type: "POST",
            url: "forgot-password",
            data: email,
            success: function(data){
                console.log(data);
            }
            });
            event.preventDefault();
        });
// Forgot password


// Dashboard Search
    // var xmlObject;
    // if (window.ActiveXObject) {
    //     xmlObject = new ActiveXObject('Microsoft.XMLHTTP');
    // }else if (window.XMlHttpRequest) {
    //     xmlObject = new XMlHttpRequest();
    // }

    // xmlObject.onreadystatechange = function(){
    //     if (xmlObject.readystate==4 && xmlObject.status==200) {
    //         document.getElementById('course_list').innerHTML = xmlObject.responseText;
    //     }
    // }
    // var key = document.getElementById('keyword').value;
    // xmlObject.open('GET', 'search?key='+key , true);
    // xmlObject.send(null);
    // $("#keyword").onkeyup(function(){

    // });

//Dashboard Search

});
