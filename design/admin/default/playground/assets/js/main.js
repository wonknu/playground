jQuery(document).ready(function()
{
    'use strict';
    
    if(jQuery('#tabs').size() > 0) {
        $('#tabs').tab();
    }
    
    if(jQuery('.datepicker').size() > 0) {
        $('.datepicker').datepicker({
            dateFormat : 'dd/mm/yy'
        });
    }
    
    if(jQuery('.date').size() > 0) {
        $('.date').datepicker({
            dateFormat : 'dd/mm/yy'
        });
    }
    
    // INIT GRISTER IF EXIST
    if(jQuery('.gridster').size() > 0) {
        jQuery(".gridster ul").gridster({
            widget_margins: [10, 10],
            widget_base_dimensions: [250, 250]
        });
    }
    
    if(jQuery('#answer_entry').size() > 0) {
        var template = $('#answer_entry > fieldset > span');
        var datatemplate = $('#answer_entry > fieldset > span').data('template');
        template.data('template', '<fieldset id="answers__index__">'+datatemplate+'</fieldset>');
        
        $('#answer_entry button').live('click',function(){
            $(this).parent().parent().empty();
            return false;
        });
    }
    
    if(jQuery('#prize_entry button').size() > 0) {
        var template = $('#prize_entry > fieldset > span');
        var datatemplate = $('#prize_entry > fieldset > span').data('template');
        template.data('template', '<fieldset id="prizes__index__">'+datatemplate+'</fieldset>');
        
        $('#prize_entry button').on('click',function()
        {
            $(this).parent().empty();
            return false;
        });
    }
});

function add_answer() {
    var currentCount = $('#answer_entry textarea').length;
    var template = $('#answer_entry > fieldset > span').data('template');
    template = template.replace(/__index__/g, currentCount);
    $('#answer_entry').append(template);
    $('#answer_entry').append('<hr/>');

    return false;
}

function add_prize() {
    var currentCount = $('#prize_entry textarea').length;
    var template = $('#prize_entry > span').data('template');
    template = template.replace(/__index__/g, currentCount);
    $('#prize_entry').append(template);

    return false;
}