//suppression d'une categorie dans l'UPC admin
$('.js_del_category').click(function(){
	var id = $(this).data('id');
	$.post("index.php?page=ucp_admin", {"delete_category" : id}, function(){
		location.reload();
	});
}); 

//autocomplete pour rechercher une utilisateur dans l'UPC admin (en vue de modifier ses permissions d'accès : utilisateur/moderateur/administrateur)
$('#searchName').autocomplete({
	source : 'index.php?page=ucp_admin'
});
