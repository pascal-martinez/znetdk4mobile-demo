<div class="w3-panel w3-theme-l1">
    <h3><i class="fa fa-font"></i> Fonts</h3>
    <p>Customize the <strong>font</strong> of your application by choosing a <a href="https://fonts.google.com" target="_blank" rel="noopener">Google Fonts</a>.</p>
    <p>Set your font by configuring the <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming-font" target="_blank" rel="noopener"><code>CFG_MOBILE_CSS_FONT</code></a> and <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming-font-family" target="_blank" rel="noopener"><code>CFG_MOBILE_CSS_FONT_FAMILY</code></a> PHP constants in the <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming" target="_blank" rel="noopener"><code>config.php</code></a> script of your application.</p>
</div>
<div id="choose-font"></div>
<script>
    var allFonts = ['Lato', 'Exo', 'Nunito', 'Cuprum', 'Chakra Petch',
        'Dosis', 'IBM Plex Sans', 'Poppins', 'Cantarell', 'Barlow'];
    $.each(allFonts, function() {
        $('#choose-font').append('<button class="w3-theme-action w3-btn w3-block w3-section"><b>' + this + '</b></button>');
    });
    $('#choose-font').on('click', 'button', function() {
        var fontLink = $('link[href*="google"]'),
            cssPathGen = "https://fonts.googleapis.com/css?family=%fontName%",
            fontName = $(this).text(),
            headerStyleElement = $('head style.zdkm-demo-font');
        fontLink.attr('href', cssPathGen.replace('%fontName%', fontName.replace(' ', '+')));
        headerStyleElement.remove();
        $('head').append("<style class='zdkm-demo-font'>.znetdk-mobile-font{font-family: '" + fontName + "';}</style>");
    });
</script>
