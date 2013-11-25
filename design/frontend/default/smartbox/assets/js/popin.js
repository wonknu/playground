$(function(){
	popinTerms('#link-terms', ' #terms');
	popinTerms('#link-conditions', ' #conditions');
});

function popinTerms(link, page) {
    $(link).on('click', function()
    {
        $('#terms-popin .modal-body').load($(this).attr('href') + page, function()
        {
            $('#terms-popin').modal();
        });
        return false;
    });
}
