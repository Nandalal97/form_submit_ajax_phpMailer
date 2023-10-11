$(document).ready(function(){
    $("#homecollect").submit(function(event){
        event.preventDefault();
        let formData={
            name: $('#name').val(),
            phone: $('#phone').val(),
            date: $('#date').val(),
            gender: $('#gender').val(),
            age: $('#age').val(),
            time: $('#time').val(),
            message: $('#message').val(),
            mailTitle:$('#mailTitle').val()
        };
       
        $.ajax({
            type:'post',
            url: 'mail.php',
            data: formData,
            dataType: 'json',
            encode: true,
        }).done(function(data){
            // console.log(data+'333a');
            // alert ('a');
            if (!data.success) {
                if (data.errorsForm.name) {
                  $("#name-group").addClass("has-error");
                  $("#name-group").append(
                    '<div class="help-block">' + data.errorsForm.name + "</div>"
                  );
                }
        
                // if (data.errorsForm.email) {
                //   $("#email-group").addClass("has-error");
                //   $("#email-group").append(
                //     '<div class="help-block">' + data.errorsForm.email + "</div>"
                //   );
                // }
        
                if (data.errorsForm.phone) {
                  $("#phone-group").addClass("has-error");
                  $("#phone-group").append(
                    '<div class="help-block">' + data.errorsForm.phone + "</div>"
                  );
                }
                // if (data.errorsForm.subject) {
                //   $("#subject-group").addClass("has-error");
                //   $("#subject-group").append(
                //     '<div class="help-block">' + data.errorsForm.subject + "</div>"
                //   );
                // }
              }
              else {
                $("#homecollect").html(
                  '<div class="alert alert-success">' + data.message + "</div>"
                );
              }
        });

    });
});
