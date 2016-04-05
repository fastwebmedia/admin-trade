$(function() {
    var $slug = $('.slug');
    var $title = $slug.parent().prev().find('input');

    var uri_edited = $slug.val() == '' ? false : true;
    $title.keyup(function() {
        if( (! uri_edited || $(this).val() == '') && $slug.length > 0 ){
            var new_val = toUri($(this).val());
            $slug.val(new_val);
            uri_edited = false;
        }
    });
    $slug.keyup(function() {
        if($(this).val()) uri_edited = true;
    });
});

function toUri(string)
{
    return string.replace(/[^a-zA-Z0-9 \-\/]+/g, "").replace(/[ ]/g, "-").toLowerCase();
}
