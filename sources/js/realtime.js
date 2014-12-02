function startFeed()
{
	var container = $('.refresh_message');
	container.css('overflow', 'auto').css('height', '34px');
	//container.animate({scrollTop:'200px'}, '500');
	var id = 0;
	setInterval(function()
	{
		id = container.find('.feed').first().data('id');
		$.get("index.php?page=feed&ajax&last="+id, function(data)
		{
			try
			{
				data = JSON.parse(data);
			}
			catch(e)
			{
				data = new Array();
			}
			var i = 0;
			while (data[i] != undefined)
			{
				$(container).prepend(data[i]['html']);
				id = data[i]['id'];
				i++;
			}
		});
	}, 1500);
}
$('document').ready(function()
{
	startFeed();
});