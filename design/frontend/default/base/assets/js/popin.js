$(function(){
	$('#reglement a').on('click', function ()
	{
        $('#reglement-popin .modal-body').load($(this).attr('href') + ' #terms', function ()
        {
            $('#reglement-popin').modal();
        });
		return false;
	});
});
