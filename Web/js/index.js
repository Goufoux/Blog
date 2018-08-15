$(function()
{
	$('article').on('click', '.croix', function()
	{
		attr = $(this).parent('article').attr('class');
		attr = attr.split(" ");
		$('.'+attr[0]).fadeOut('slow');
	});
});