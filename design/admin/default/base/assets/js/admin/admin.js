$(function() {
	$('.remove-entry').click(function(){
		var url = $(this).attr('href');
		if(confirm('Supprimer cette entrée ?')){
			$(location).attr('href',url);
		}
		return false;
	});
});
console.log('admin.js still there really ?!'); 