<div class="w3-content w3-panel w3-theme-l1">
    <h3><i class="fa fa-paint-brush"></i> Colors</h3>
    <p>Customize <strong>color theme</strong> of your application by choosing a <a href="https://www.w3schools.com/w3css/w3css_color_themes.asp" target="_blank" rel="noopener">W3.CSS predefined color theme</a> or <a href="https://www.w3schools.com/w3css/w3css_color_generator.asp" target="_blank" rel="noopener">create your own theme</a>.</p>
    <p>Set your color theme by configuring the <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming-colors" target="_blank" rel="noopener"><code>CFG_MOBILE_W3CSS_THEME</code></a> PHP constant in the <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming" target="_blank" rel="noopener"><code>config.php</code></a> script of your application.</p>
</div>
<div id="choose-theme" class="w3-content"></div>
<script>
    var allColors = ['pink', 'red', 'purple', 'brown', 'green', 'deep-purple',
        'indigo', 'blue', 'light-blue', 'cyan', 'teal', 'light-green', 'lime',
        'khaki', 'yellow', 'amber', 'orange', 'deep-orange', 'blue-grey', 'grey',
        'dark-grey', 'black'
    ];
    $.each(allColors, function() {
        $('#choose-theme').append('<button class="w3-' + this + ' w3-btn w3-block w3-section">Try it</button>');
    });
    $('#choose-theme').on('click', 'button', function() {
        var themeLink = $('link[href*="w3-theme-"]'),
            newThemeLink = $('<link rel="stylesheet" type="text/css"/>'),
            cssPathGen = "https://www.w3schools.com/lib/w3-theme-%color%.css",
            buttonClassList = this.classList,
            color = buttonClassList[0].split('w3-')[1];
        newThemeLink[0].onload = function(){
            z4m.ajax.toggleLoader?.(false);
            themeLink.remove();
            z4m.messages.showSnackbar('Color <b>' + color + '</b> loaded.');
        };
        newThemeLink[0].onerror = function(){
            z4m.ajax.toggleLoader?.(false);
            z4m.messages.add('Error', 'Loading color theme <b>' + color + '</b> has failed.');
        };
        z4m.ajax.toggleLoader?.(true);
        newThemeLink.attr('href', cssPathGen.replace('%color%', color));
        themeLink.after(newThemeLink);
    });
</script>
