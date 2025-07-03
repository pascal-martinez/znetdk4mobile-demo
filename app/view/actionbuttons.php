<div class="w3-content w3-panel w3-theme">
    <h3><i class="fa fa-hand-pointer-o"></i> Action buttons</h3>
    <p>Action buttons are color rounded buttons displayed at the bottom right of the View area (see <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-buttons" target="_blank" rel="noopener">Action buttons</a>).</p>
</div>
<div class="w3-padding-16 w3-hide-small"></div>
<div id="show-action-button" class="w3-content">
    <button class="w3-btn w3-section w3-mobile w3-theme-action" data-type="add"><i class="fa fa-plus fa-lg"></i>&nbsp;Toggle Add button</button>
    <button class="w3-btn w3-section w3-mobile w3-green" data-type="refresh"><i class="fa fa-refresh fa-lg"></i>&nbsp;Toggle Refresh button</button>
    <button class="w3-btn w3-section w3-mobile w3-blue" data-type="search"><i class="fa fa-search fa-lg"></i>&nbsp;Toggle Search button</button>
    <button class="w3-btn w3-section w3-mobile w3-light-grey" data-type="scrollup"><i class="fa fa-arrow-up fa-lg"></i>&nbsp;Toggle Scroll to top button</button>
    <button class="w3-btn w3-section w3-mobile w3-purple" data-type="custom"><i class="fa fa-diamond fa-lg"></i>&nbsp;Toggle custom button</button>
</div>
<style>
    a.zdk-mobile-action.custom {
        width: 52.75px;
    }
    a.zdk-mobile-action.custom > i.fa {
        font-size: 1em;
        left: -2px;
    }
</style>
<script>
    console.log('actionbuttons.php');
    $(function(){
        const viewId = 'actionbuttons';
        initButtonsForTheView();
        $('#show-action-button').on('click', 'button', function() {
            toggleButton($(this).data('type'));
        });

        function initButtonsForTheView() {
            z4m.action.addCustomButton('custom', 'fa-diamond', 'w3-purple', 'Custom button');
            z4m.action.registerView(viewId, {
                add: {
                    isVisible: false,
                    callback: function () {
                        z4m.messages.showSnackbar('Add button clicked!');
                    }
                },
                refresh: {
                    isVisible: false,
                    callback: function () {
                        z4m.messages.showSnackbar('Refresh button clicked!');
                    }
                },
                search: {
                    isVisible: false,
                    callback: function () {
                        z4m.messages.showSnackbar('Search button clicked!');
                    }
                },
                scrollup: {
                    isVisible: false,
                    callback: function () {
                        z4m.messages.showSnackbar('Scroll to top button clicked!');
                    }
                },
                custom: {
                    isVisible: false,
                    callback: function () {
                        z4m.messages.showSnackbar('Custom button clicked!');
                    }
                }
            });
        }
        function toggleButton(buttonType) {
            $.each(z4m.action.views[viewId], function(buttonName, properties){
                if (buttonType === buttonName) {
                    properties.isVisible = !properties.isVisible;
                }
            });
            z4m.action.toggle();
        }    
    });
</script>