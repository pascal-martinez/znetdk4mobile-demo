<div class="w3-content w3-panel w3-theme-l1">
    <h3><i class="fa fa-spinner fa-pulse"></i> AJAX Loader</h3>
    <p>An animated icon is automatically displayed when executing an <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-ajax" target="_blank" rel="noopener">AJAX request</a>.</p>
</div>
<div class="w3-padding-24"></div>
<div class="w3-content">
    <button id="show-ajax-loader" class="w3-btn w3-block w3-section w3-theme-action"><i class="fa fa-spinner fa-lg"></i>&nbsp;Show AJAX Loader 5 seconds</button>
    <button id="show-ajax-loader-success" class="w3-btn w3-block w3-section w3-green"><i class="fa fa-spinner fa-lg"></i>&nbsp;AJAX request Succeeded</button>
    <button id="show-ajax-loader-fail" class="w3-btn w3-block w3-section w3-red"><i class="fa fa-spinner fa-lg"></i>&nbsp;AJAX request Failed</button>
</div>
<script>
    $('#show-ajax-loader').on('click', function(){
        znetdkMobile.ajax.request({controller:'featurectrl', action:'loader'});        
    });
    $('#show-ajax-loader-success').on('click', function(){
        znetdkMobile.ajax.request({
            controller:'featurectrl',
            action:'ajaxsuccess',
            callback: function(response) {
                znetdkMobile.messages.showSnackbar('Success');
            }
        });
    });
    $('#show-ajax-loader-fail').on('click', function(){
        znetdkMobile.ajax.request({
            controller:'featurectrl',
            action:'ajaxfail',
            errorCallback: function(response) {
                znetdkMobile.messages.showSnackbar('HTTP error code: ' + response.status, true);
                return false;
            }
        });        
    });
</script>