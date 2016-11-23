(function() {
    tinymce.create('tinymce.plugins.bliccaThemes', {
        init : function(ed, url) {

            ed.addButton('landmark_construction_theme_dropcap', {
                title : 'bliccaThemes Drop Cap',
                cmd : 'landmark_construction_theme_dropcap',
                image : url + '/img/dropcap.jpg'
            });
          
            ed.addButton('landmark_construction_theme_highlight', {
                title : 'bliccaThemes Highlight',
                cmd : 'landmark_construction_theme_highlight',
                image : url + '/img/highlight.png'
            });

            ed.addButton('landmark_construction_theme_tooltip', {
                title : 'bliccaThemes Tooltip',
                cmd : 'landmark_construction_theme_tooltip',
                image : url + '/img/tooltip.jpg'
            });

            ed.addCommand('landmark_construction_theme_highlight', function() {
               var highlight_content = prompt ("Highlight Content", "Lorem ipsum..");
               var highlight_style = prompt ("Highlight Style", "write a style: highlight, highlight2 or highlight3");
         
               ed.execCommand('mceInsertContent', false, '[landmark_construction_theme_highlight highlight_style="'+highlight_style+'" highlight_content="'+highlight_content+'"][/landmark_construction_theme_highlight]');

            });
            

            ed.addCommand('landmark_construction_theme_dropcap', function() {
               var drop_text = prompt ("Drop Cap Text", "D");
               var drop_style = prompt ("Dropcap Style", "write a style: dropcap1, dropcap2... dropcap6");
         
               ed.execCommand('mceInsertContent', false, '[landmark_construction_theme_dropcap drop_style="'+drop_style+'" drop_text="'+drop_text+'"][/landmark_construction_theme_dropcap]');

            });
 
            ed.addCommand('landmark_construction_theme_tooltip', function() {
               var tooltip_text = prompt ("Your Content", "Write your content")
               var tooltip_hover = prompt ("Tooltip", "Write your tooltip for hover");
               
               var tooltip_style = prompt ("Tooltip Style", "write a style: tooltip1 or tooltip2");
         
               ed.execCommand('mceInsertContent', false, '[landmark_construction_theme_tooltip tooltip_style="'+tooltip_style+'" tooltip_text="'+tooltip_text+'" tooltip_hover="'+tooltip_hover+'"][/landmark_construction_theme_tooltip]');

            });            

        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'landmark_construction_theme_tiny', tinymce.plugins.bliccaThemes );
})();