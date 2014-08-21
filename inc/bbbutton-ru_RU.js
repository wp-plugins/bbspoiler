( function() {
    tinymce.PluginManager.add( 'bbspoiler_test', function( editor, url ) {

        // Add a button that opens a window
        editor.addButton( 'bbspoiler_test_button_key', {
			title : 'Спойлер',
            text: false,
			image : url + '/spoiler.png',
            
            onclick: function() {
                // Open window
                editor.windowManager.open( {
                    title: 'BBSpoiler',
                    body: [
					{type: 'textbox', name: 'title', label: 'Заголовок'},
					{type: 'textbox', name: 'text', label: 'Текст', 'multiline': 'true', 'minWidth': 350, 'minHeight': 100},
					{name: 'collapse_link', type: 'checkbox', checked: 'true', label: 'Выводить ссылку свернуть?'}
					],
                    onsubmit: function( e ) {
                        // Insert content when the window form is submitted
                        editor.insertContent('[spoiler title=\'' + e.data.title + '\'' + ' collapse_link=\'' + e.data.collapse_link + '\']' + e.data.text + '[/spoiler]');
                    }

                } );
            }

        } );

    } );

} )();