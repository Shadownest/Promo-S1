$('document').ready(function()
{

	//Envoi du message à PHP

	//Envoi du message à PHP en appuyant sur la touche entrée
	$('#chat').keypress(function(info) {
		if(info.keyCode == 13)
		{
			var content = $('#chat').val();

			$.post('index.php?page=tchat&ajax=true', {"content":content}, function(data) {

			});

			$('#chat').val("");
		}
	});

	//Envoi du message à PHP

	//Envoi du message à PHP au click du bouton
	$('#click_chat').click(function(info) {
		var content = $('#chat').val();

		$.post('index.php?page=tchat&ajax=true', {"content":content}, function(data) {

		});

		$('#chat').val("");
	});

	//Réception des messages
	setInterval(function(){
		$.get('index.php?page=tchat&ajax=true&refresh=true', function(data){
			$("#aff_chat").html(data);
		});
	},5000);



	//suppresion de messages
	$("#click_sup").click(function() {
		$.get('index.php?page=tchat&ajax=true&delete=true', function(data) {
			
		});
	});
});
