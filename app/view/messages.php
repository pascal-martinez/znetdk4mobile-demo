<div class="w3-panel w3-theme-l1">
    <h3><i class="fa fa-comment-o"></i> Messages</h3>
    <p>Click on a button below to show the <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-messages" target="_blank" rel="noopener">Messages JS API</a> in action.</p>
</div>
<div>
    <button class="w3-btn w3-block w3-section w3-green"
            onclick="znetdkMobile.messages.showSnackbar('Message when success...');"><i class="fa fa-lg fa-check-circle"></i>&nbsp;Success</button>
    <button class="w3-btn w3-block w3-section w3-blue"
            onclick="znetdkMobile.messages.add('info', 'Information', 'Message for information...');"><i class="fa fa-lg fa-info-circle"></i>&nbsp;Info</button>
    <button class="w3-btn w3-block w3-section w3-yellow"
            onclick="znetdkMobile.messages.add('warn', 'Warning', 'Message for warning...');"><i class="fa fa-lg fa-warning"></i>&nbsp;Warning</button>
    <button class="w3-btn w3-block w3-section w3-red"
            onclick="znetdkMobile.messages.add('error', 'Error', 'Message when error occured...');"><i class="fa fa-lg fa-times-circle"></i>&nbsp;Error</button>
    <button class="w3-btn w3-block w3-section w3-blue-grey"
            onclick="znetdkMobile.messages.add('critical', 'Critical', 'Message when critical error occured (to close manually by default)...');"><i class="fa fa-lg fa-ban"></i>&nbsp;Critical</button>
    <button class="w3-btn w3-block w3-section w3-theme-action"
            onclick="znetdkMobile.messages.addMulti([
                    ['info', 'Information', 'Message for information...'],
                    ['warn', 'Warning', 'Message for warning...'],
                    ['error', 'Error', 'Message when error occured...']]);">
            <i class="fa fa-lg fa-info-circle"></i>
            <i class="fa fa-lg fa-warning"></i>
            <i class="fa fa-lg fa-times-circle"></i>&nbsp;Multiple</button>
    <button class="w3-btn w3-block w3-section w3-theme-action"
            onclick="znetdkMobile.messages.notify('Notification to the user',
                'Notification message...', null, function(){
                    znetdkMobile.messages.showSnackbar('Click on OK button');
                });">
        <i class="fa fa-lg fa-info-circle"></i>&nbsp;Notification</button>
    <button class="w3-btn w3-block w3-section w3-theme-action"
            onclick="znetdkMobile.messages.ask('Asking for the user',
                'Do you really want to do it right now?', {yes:'Yesss!', no:'Noooo!'}, function(isYes){
                    var buttonPressed = isYes ? 'YES' : 'NO';
                    znetdkMobile.messages.showSnackbar('Click on ' + buttonPressed + ' button', buttonPressed === 'NO');
                });"><i class="fa fa-lg fa-question-circle"></i>&nbsp;Confirmation</button>
</div>
