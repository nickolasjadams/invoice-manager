



$( "select#status" ).change(function() {
    let status = $('select#status').val();
    if (status == 'draft') {
        $('button[type="submit"]').html('Save as Draft');
    } else {
        $('button[type="submit"]').html('Send Invoice');
    }
});