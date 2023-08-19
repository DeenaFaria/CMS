tinymce.init({
	
	selector:"textarea.tinymce",
	plugins:['image','link','emoticons','lists'],
	menubar:['file','edit','view','format'],
    toolbar:"insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
	branding:false
	
});