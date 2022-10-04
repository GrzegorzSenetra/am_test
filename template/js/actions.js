$('#add_category_button').click(function() {
    let addCategoryInputVal = $('#add_category_input').val();

    if (addCategoryInputVal) {
        $.ajax({
            url: '/controllers/MainController.php',
            type: 'POST',
            data: { 
                action: 'AddCategory',
                payload: {
                    category_name: addCategoryInputVal
                }
            },
            success: function(data) {
                data = JSON.parse(data);
                $('#add_category_input').val('');
                $('#add_category_input').focus();
                $('#category_select').append('<option value="' + data.id + '">' + data.name + '</option>');
            }
        });
    }
    
});

