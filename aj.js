$(document).ready(function () {


    $('form').submit(function (event) {
        event.preventDefault();


        $("#form").on("submit", function(){
            $.ajax({
                url: '/dadate.php',
                method: 'post',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(data){
                    $('#message').html(data);
                }
            });
        });
    });

});