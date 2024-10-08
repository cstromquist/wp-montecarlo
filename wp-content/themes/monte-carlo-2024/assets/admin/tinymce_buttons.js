(function() {
  tinymce.PluginManager.add('c5ctabutton', function( editor, url ) {
    editor.addButton( 'c5ctabutton', {
      text: ' Add button',
      icon: 'link',
      tooltip: tinyMCE_object.button_name,
      classes: 'add--cta--btn',
      onclick: function() {
        editor.windowManager.open( {
          title: tinyMCE_object.button_title,
          classes: 'add--cta--btn--modal',
          body: [
            {
              type: 'textbox',
              name: 'text',
              label: tinyMCE_object.link_text,
              value: '',
            },
            {
              type   : 'container',
              name   : 'spacer1',
              label  : '',
              html   : '<div style="height: 20px;"></div>',
            },
            {
              type: 'textbox',
              name: 'url',
              label: tinyMCE_object.link_url,
              tooltip: 'It is best to use relative URLs here i.e. /about or /blog, absolute URLs will work too though i.e. https://xyz.com',
              value: '',
            },
            {
              type   : 'container',
              name   : 'spacer2',
              label  : '',
              html   : '<div style="height: 6px;"></div>',
            },
            {
              type   : 'checkbox',
              name   : 'target',
              label  : tinyMCE_object.link_target,
              tooltip: 'Check this if you want the link to open in a new tab',
              text   : '',
              checked : false
            },
            {
              type   : 'container',
              name   : 'spacer3',
              label  : '',
              html   : '<div style="height: 20px;"></div>',
            },
            {
              type   : 'listbox',
              name   : 'buttonalignment',
              label  : tinyMCE_object.button_alignment,
              tooltip: 'How the button will align in the container',
              values : [
                { text: 'Left', value: 'left' },
                { text: 'Center', value: 'center' },
                { text: 'Right', value: 'right' },
              ],
              value : 'left' // Sets the default
            },
            {
              type   : 'container',
              name   : 'spacer4',
              label  : '',
              html   : '<div style="height: 20px;"></div>',
            },
            {
              type   : 'listbox',
              name   : 'buttonstyle',
              label  : tinyMCE_object.button_style,
              tooltip: 'See below for styles',
              values : [
                { text: 'Primary CTA - LG', value: 'btn btn-lg' },
                { text: 'Primary CTA - MD', value: 'btn btn-md' },
                { text: 'Primary CTA - SM', value: 'btn btn-sm' },
                { text: 'Secondary CTA - LG', value: 'link link-lg' },
                { text: 'Secondary CTA - MD', value: 'link link-md' },
                { text: 'Secondary CTA - SM', value: 'link link-sm' }
              ],
              value : 'btn btn-lg' // Sets the default
            },
            {
              type   : 'container',
              name   : 'spacer4',
              label  : '',
              html   : '<div style="height: 20px;"></div>',
            },
            {
              type   : 'container',
              name   : 'container',
              classes: 'styles__reference',
              label  : 'Button/Link styles for reference',
              html   : '<table class="fixed widefat wp-list-table"><thead><tr><th><b>Primary CTA - LG</b><th><b>Primary CTA - MD</b><th><b>Primary CTA - SM</b><tbody><tr><td><a class="btn btn-lg">Btn</a><td><a class="btn btn-md">Btn</a><td><a class="btn btn-sm">Btn</a></table><table class="fixed widefat wp-list-table"><thead><tr><th><b>Secondary CTA - LG</b><th><b>Secondary CTA - MD</b><th><b>Secondary CTA - SM</b><tbody><tr><td><a class="link link-lg">Link</a><td><a class="link link-md">Link</a><td><a class="link link-sm">Link</a></table>'
            }
          ],
          onsubmit: function( e ) {
            editor.insertContent( '[styled-button text="' + e.data.text + '" url="' + e.data.url + '" target="' + e.data.target + '" buttonstyle="' + e.data.buttonstyle + '" buttonalignment="' + e.data.buttonalignment + '"]');
          }
        });
      },
    });
  });

})();