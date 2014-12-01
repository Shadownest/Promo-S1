$('document').ready(function()
{
	//Envoi du message à PHP
	$('#chat').keypress(function(info) {
		if(info.keyCode == 13)
		{
			var content = $('#chat').val();

			$.post('index.php?page=tchat&ajax=true', {"content":content}, function(data) {

			});

			$('#chat').val("");
		}
	});

	//Réception des messages
	setInterval(function(){
		$.get('index.php?page=tchat&ajax=true&refresh=true', function(data){
			$("#aff_chat").html(data);
		});
	},5000);
});
