<?php
$z4mDefaultThemePath = addVersion('resources/w3css/themes/z4m-theme.css');
$z4mLightThemePath = addVersion('resources/w3css/themes/z4m-theme-light.css');
$z4mDarkThemePath = addVersion('resources/w3css/themes/z4m-theme-dark.css');
$z4mDemoThemePath = addVersion('applications/'.ZNETDK_APP_NAME.'/public/css/w3-theme-demo.css');
$z4mLightLogoPath = addVersion('engine/public/images/logoznetdk.svg');
$z4mDarkLogoPath = addVersion('engine/public/images/logoznetdk-dark.svg');
function addVersion($url) {
    $absoluteFilePath = ZNETDK_ROOT . $url;
    clearstatcache (TRUE, $absoluteFilePath);
    $fileTimestamp = filemtime($absoluteFilePath);
    return $url . ($fileTimestamp === FALSE ? '' : '?v=' . strval($fileTimestamp));
}
?>
<style>
    html.color-theme-transition,
    html.color-theme-transition *,
    html.color-theme-transition *:before,
    html.color-theme-transition *:after {
      transition: background-color 700ms !important;
      transition-delay: 0s !important;
    }
</style>
<div class="w3-content w3-panel w3-theme">
    <h3><i class="fa fa-paint-brush"></i> Color themes</h3>
    <p>Customize <strong>color theme</strong> of your application by choosing a <a href="https://www.w3schools.com/w3css/w3css_color_themes.asp" target="_blank" rel="noopener">W3.CSS predefined color theme</a> or <a href="https://www.w3schools.com/w3css/w3css_color_generator.asp" target="_blank" rel="noopener">create your own theme</a>.</p>
    <p>Set your color theme by configuring the <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming-colors" target="_blank" rel="noopener"><code>CFG_MOBILE_W3CSS_THEME</code></a> PHP constant in the <a href="https://mobile.znetdk.fr/settings#z4m-settings-theming" target="_blank" rel="noopener"><code>config.php</code></a> script of your application.</p>
</div>
<div class="w3-content">
    <h2 class="w3-text-theme w3-border-bottom w3-border-theme">Current theme colors</h2>
    <div class="w3-section">
    <?php $colors = ['theme-l5','theme-l4','theme-l3','theme-l2','theme-l1','theme-d1','theme-d2','theme-d3','theme-d4','theme-d5','theme','theme-action'];
     foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-margin-bottom w3-<?php echo $color; ?>">
            w3-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<div id="choose-theme" class="w3-content">
    <h2 class="w3-text-theme w3-border-bottom w3-border-theme">Try a theme</h2>
    <button class="z4m w3-btn w3-block w3-section" data-themepath="<?php echo $z4mDefaultThemePath; ?>" style="background-color:#0b78d1;color:#fff">ZnetDK 4 Mobile DEFAULT</button>
    <button class="z4m w3-btn w3-block w3-section" data-themepath="<?php echo $z4mLightThemePath; ?>" style="background-color:#E0E0E0;color:#000">ZnetDK 4 Mobile LIGHT</button>
    <button class="z4m dark w3-btn w3-block w3-section" data-themepath="<?php echo $z4mDarkThemePath; ?>" style="background-color:#333333;color:#fff">ZnetDK 4 Mobile DARK</button>
    <button class="z4m w3-btn w3-block w3-section" data-themepath="<?php echo $z4mDemoThemePath; ?>" style="background-color:#2C3E50;color:#fff">ZnetDK 4 Mobile DEMONSTRATION</button>
    <div class="w3-padding"></div>
</div>
<script>
$(function(){
    var allColors = ['pink', 'red', 'purple', 'brown', 'green', 'deep-purple',
        'indigo', 'blue', 'light-blue', 'cyan', 'teal', 'light-green', 'lime',
        'khaki', 'yellow', 'amber', 'orange', 'deep-orange', 'blue-grey', 'grey',
        'dark-grey', 'black'
    ];
    var w3cssPathGen = "https://www.w3schools.com/lib/w3-theme-%color%.css",        
        z4mLightLogoPath = '<?php echo $z4mLightLogoPath; ?>',
        z4mDarkLogoPath = '<?php echo $z4mDarkLogoPath; ?>',
        currentThemeLinkEl = $('link[href*="w3-theme-"]');
    // W3CSS color themes displayed as button
    $.each(allColors, function() {
        $('#choose-theme').append('<button class="w3-' + this + ' w3css w3-btn w3-block w3-section">W3CSS w3-' + this + '</button>');
    });
    // On click W3CSS theme button
    $('#choose-theme').on('click', 'button', function() {
        if ($(this).hasClass('w3css')) {
            let buttonClassList = this.classList,
               color = buttonClassList[0].split('w3-')[1];
            applyTheme(w3cssPathGen.replace('%color%', color),
                'Color <b>' + color + '</b> loaded.',
                'Loading color theme <b>' + color + '</b> has failed.');
            updateLogo(false);
        } else if ($(this).hasClass('z4m')) {
            const isDark = $(this).hasClass('dark'), z4mThemePath = $(this).data('themepath');
            applyTheme(z4mThemePath, 'Theme <b>' + $(this).text() + '</b> loaded.',
                'Loading theme <b>' + $(this).text() + '</b> has failed.', isDark);
            updateLogo(isDark);
        }
    });
    // Apply theme to the document
    function applyTheme(newThemePath, successMsg, failedMsg, isDark) {
        var newThemeLink = $('<link rel="stylesheet" type="text/css"/>');
        newThemeLink[0].onload = function(){
            z4m.ajax.toggleLoader?.(false);
            currentThemeLinkEl.remove();
            currentThemeLinkEl = newThemeLink;
            z4m.messages.showSnackbar(successMsg);
            applyThemeTransition(false); // Transition effect end...
            // body[data-theme] set to 'dark' or 'light' for styling purpose
            $('body').attr('data-theme', isDark ? 'dark' : 'light');
        };
        newThemeLink[0].onerror = function(){
            z4m.ajax.toggleLoader?.(false);
            z4m.messages.add('Error', failedMsg);
            applyThemeTransition(false); // Transition effect end...
        };
        z4m.ajax.toggleLoader?.(true);
        applyThemeTransition(true); // Transition effect start...
        newThemeLink.attr('href', newThemePath);
        currentThemeLinkEl.after(newThemeLink);
    }
    // Display Dark or Light ZnetDK 4 Mobile logo
    function updateLogo(isDark) {
        const logoSrc = isDark ? z4mDarkLogoPath : z4mLightLogoPath;
        $('#zdk-company-logo > img').attr('src', logoSrc);
    }
    // Apply a transition effect when new theme is choosen
    function applyThemeTransition(start) {
        if (start) {
            document.documentElement.classList.add('color-theme-transition');
        } else {
            window.setTimeout(function() {
                document.documentElement.classList.remove('color-theme-transition');
            }, 2000);
        }
    }
});
</script>
