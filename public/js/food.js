var mask = 1;



function getInput(text, value, name, id) {
    return `
    <div class="form-group col-sm-2" id="${id}" style="display:none;">
        <div class="row">
            <div class="col-sm-9">
                <span class='text-info'><small>${text}</small></span>
                <input type="hidden" class="form-control" value="${value}" name='${name}' >
            </div>
            <div class="col-sm-1">
            <button type="button" class="test btn btn-sm btn-outline-info"><small><i class="fas fa-times"></i></small></button>
            </div>
        </div>
    </div>
   `;
}

function showErrorMessage(foodName) {
    $("#insert-error").css("display", "none");
    $("#insert-error").text(`El platillo ${foodName} ya se encuentra registrado`);
    $("#insert-error").fadeIn(500);
}

$("#foods").change(function() {

    var val = parseInt($(this).val());
    var foodName = $("#foods :selected").text();
    if (isNaN(val)) {
        return;
    }
    var offset = 1 << val;
    if ((mask & offset) == offset) {
        showErrorMessage(foodName);
        return;
    }
    mask |= offset;
    var id = `content-food-${val}`;
    $("#insert-error").text('')
    $("#food-selected").append(getInput($("#foods :selected").text(), $(this).val(), `food${val}`, id));
    $(`#${id}`).fadeIn(1500);
})
$(document).on("click", ".test", function() {

    var input = $(this).parent().parent().children().children('input');
    var value = parseInt(input.attr('value'));
    if (isNaN(value)) {
        return;
    }
    var parent = $(this).parent().parent().parent();
    parent.fadeOut(1500, function() {
        this.remove();
    })

    mask &= ~(1 << value)

});