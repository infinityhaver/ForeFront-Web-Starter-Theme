(function(){
	tinymce.PluginManager.add('wysiwyg_button', function( editor, url ) {
		editor.addButton( 'wysiwyg_button', {
			text: "Button",
			title: "Insert Button",
			onclick: function() {
				editor.windowManager.open( {
					title: 'Insert Button',
					width: 500,
					height: 300,
					body: [
					{
						type: 'textbox',
						name: 'url',
						label: 'URL'
					},
					{
						type: 'textbox',
						name: 'label',
						label: 'Link Text'
					},
					{
						type: 'checkbox',
						name: 'newtab',
						label: ' ',
						text: 'Open link in new tab',
						checked: false
					},
					{
						type: 'checkbox',
						name: 'fullwidth',
						label: ' ',
						text: 'Full Width',
						checked: false
					},
					{
						type: 'listbox',
						name: 'style',
						label: 'Button Style',
						'values': [
							{ text: "Brand", value: "solid" },
							{ text: "Ghost", value: "ghost" },
							{ text: "Dark", value: "dark" },
							{ text: "Dark Ghost", value: "dark-ghost" },
							{ text: "White", value: "white" },
							{ text: "White Ghost", value: "white-ghost" }
						]
					}],
					onsubmit: function( e ) {
						let $content = '[button href="' + e.data.url + '" style="' + (e.data.fullwidth ? 'btn-block ' : '') + (e.data.style !== 'solid' ? ' ' + e.data.style : 'solid') + '"' + (!!e.data.newtab ? ' target="_blank"' : '' ) + ']' + e.data.label + '[/button]';
						editor.insertContent( $content );
					}
				});
			}
		});
	});
})();