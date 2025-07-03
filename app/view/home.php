<div class="w3-container w3-center w3-theme-l4 w3-padding-64" style="margin:-1px  -16px 0px -16px;">
    <img id="home-page-znetdk-logo" class="w3-padding-16" width="150" src="<?php echo ZNETDK_ROOT_URI.'engine/public/images/logoznetdk.png'; ?>" alt="banner logo">
    <h1 class="w3-margin w3-jumbo w3-text-theme">ZnetDK 4 Mobile</h1>
    <h3 class="w3-xlarge">Demonstration...</h3>
</div>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
        <h2>Ready-built Mobile Application</h2>
        <h5 class="w3-padding-32">No need to start up from scratch. You just have to add the views that fullfill your business requirements and connect them to the user navigation menu.</h5>
        <p class="w3-text-dark-grey">Click on the menu button <i class="w3-text-theme fa fa-navicon fa-lg"></i> located on top left of the application to access to the demonstration features...</p>
    </div>
    <div class="w3-third w3-center">
        <i class="fa fa-mobile w3-padding-32 w3-text-theme" style="font-size: 300px;"></i>
    </div>
  </div>
</div>
<script>
    z4m.header.autoHideOnScroll(true);
    $(function(){
        $('body').on('beforeviewdisplay', function (event, viewName) {
            if (viewName === 'home') {
                const appLogoSrc = $('#zdk-company-logo > img').attr('src');
                $('#home-page-znetdk-logo').attr('src', appLogoSrc);
            }
        });
    });
</script>