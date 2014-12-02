$('document').ready(function()
{
	//hide show create subject
	$(".create_subject").hide();

	$(".show_create_subject").click(function(){
		$(".create_subject").show();
	});

	//hide show create message in subject

	$(".new_message").hide();

	$(".create_new_message").click(function(){
		$(".new_message").show();
	});

	$("hide_bloc").click(function(){
		$(".new_message").hide();
	});
});