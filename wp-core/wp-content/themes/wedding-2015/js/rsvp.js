$('#rsvpForm').on('submit', function(e) {

    e.preventDefault();

    var data = {
        action : 'wufoo_post',
        fields : $(this).serialize()
    };

    $.ajax({
        type     : 'POST',
        url      : '/wp-core/wp-admin/admin-ajax.php',
        data     : data,
        dataType : 'json',
        success  : function(response) {
            alert('Submission Success!');
            console.log(response);
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert('Submission Failed!');
            console.error(errorThrown);
        }
    });
});