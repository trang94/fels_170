$(document).ready(function(){
    var i = 1;

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
});
