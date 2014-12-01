setInterval(function(){
	$.get('index.php?page=header&ajax=true', function(data){
		$(".refresh_message").html(data);
	});
},10000);