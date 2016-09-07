$(document).ready(function(){
    var i = parseInt($("#anwsers .anwser_update:last-child .radio-inline input").attr('value'));

    $('#add-btn').click(function(){

        i = i + 1;
        div = '<div class="form-group">\
            <label for="task-name" class="col-sm-3 control-label">Anwser</label>\
            <div class="col-sm-4">\
            <input type="text" name="anwsers[' + i + ']" id="task-name" class="form-control">\
            </div>\
            <div class="col-sm-2">\
            <label class="radio-inline"><input type="radio" name="is_anwser" value="' + i + '">is anwser</label>\
            </div>\
            <div class="col-sm-1 delete">\
            <i class="glyphicon glyphicon-remove"></i>\
            </div>\
            </div>';
        $('#anwsers').append(div);
        $('.delete').click(function(){
            $(this).parent().remove();
        });
    });

    $(".DelButton").on('click',function() {
        var anwser_id = $(this).data('id');
        var url = $(this).data('url');
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            headers: {'X-CSRF-TOKEN': token},
            type: 'DELETE',
            success: function (resp) {
                if (resp.success) {
                    var id = "#anwser-" + resp.anwser_id;
                    $(id).remove();
                }
            }
        });
    });
});
