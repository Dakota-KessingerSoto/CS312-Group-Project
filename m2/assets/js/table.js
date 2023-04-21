$(document).ready(function() {
    if($('html').css('filter')!="grayscale(1)"){
    // When dropdown value change check for dulication and restore if not---------
    // Get previous value in fown down menu by lisiting for mousedown event
    var prevValue;
    $('select[name="colorSelect[]"]').mousedown(function() {
        prevValue = $(this).val();
    });
    
    $('select[name="colorSelect[]"]').change( function() {
        // Check if it is already been chosen and warn then change back
        var newValue = $(this);
        var selected_colors = $('select[name="colorSelect[]"]').toArray();
        var dulplicate = false;
        // Check if color is already slected
        selected_colors.forEach(function(element) { if (newValue.val()==element.value && newValue.attr('id')!=element.id){dulplicate = true;} });
        if (dulplicate == true){
            newValue.css('color', 'red');
            setTimeout(() => {
                newValue.css('color', 'black');
                newValue.val(prevValue);
            }, 500);
        } else {
            // Cheange color of previous cells
            if (prevValue==selectedColor){
                selectedColor = newValue.val();
            }
            $('td').filter(function() {
                if ($(this).css('background-color') == colorNameToRgb(prevValue)) {
                    $(this).css('background-color', colorNameToRgb(newValue.val()));
                };
            })
        }
    });
    
    // Detect if radio button is changed and set change to selected color--------
    var selectedColor = "red";
    $('input[type="radio"]').change(function() {
        selectedColor = $(this).closest('tr').find('select').val();
    });

    // Main table click detection and drawing
    $('.draw-table td').click(function() {
        var row = $(this).parent().index() + 1;
        var col = $(this).index() + 1;
        if($(this).attr('id')!="title"){
            $(this).css('background-color', selectedColor);
        }
    });
});

function colorNameToRgb(colorName) {
    // create an invisible dummy element
    var dummy = $('<div>').css('color', colorName).hide().appendTo('body');
    // get the color in RGB format
    var colorRgb = dummy.css('color');
    // remove the dummy element
    dummy.remove();
    // return the RGB color as a string
    return colorRgb;
}

function sortSet(set) {
    const sortedArray = [...set]
    sortedArray.sort();
    return new Set(sortedArray);
}
  