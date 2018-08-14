window.onload = function()
{
	/* Initialisation de TinyMCE */
	tinymce.init({
		selector: 'textarea#bDesc',
		plugin: 'a_tinymec_plugin',
		a_plugin_option: 'true',
		a_configuration_option: 300,
		plugins: 'autolink link preview',
		toolbar: [
			'undo redo | bold italic underline | alignleft aligncenter alignright | link | preview'
		]
	});
}