<div class="w3-content w3-panel w3-theme">
    <h3><i class="fa fa-keyboard-o"></i> Form</h3>
    <p>Here is an example of form with <b>client-side</b> and <b>server-side</b> validation on <b>submit</b>.
        <br><b>Header is automatically hidden on scroll</b> by calling the <code><a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-header-autohideonscroll" target="_blank" rel="noopener">znetdkMobile.header.autoHideOnScroll()</a></code> method.
        <br>See <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-form" target="_blank" rel="noopener">Form JS API</a> and <a href="https://mobile.znetdk.fr/php-api#z4m-phpapi-validation" target="_blank" rel="noopener">Data Validation</a>.
    </p>
</div>
<form id="znetdkm-form-demo" class="w3-content w3-theme-light" data-zdk-submit="FeatureCtrl:formsubmit">
    <div class="w3-section">
        <!-- RADIO -->
        <div><b>Radio buttons</b> <i class="fa fa-asterisk w3-text-red"></i></div>
        <div class="w3-small w3-text-dark-gray"><i>The Option 3 must be selected.</i></div>
        <input id="znetdkm-form-demo-radio-1" class="w3-radio" type="radio" value="1" name="my_rb" required>
        <label for="znetdkm-form-demo-radio-1">Option 1</label>&nbsp;&nbsp;
        <input id="znetdkm-form-demo-radio-2" class="w3-radio" type="radio" value="2" name="my_rb">
        <label for="znetdkm-form-demo-radio-2">Option 2</label>&nbsp;&nbsp;
        <input id="znetdkm-form-demo-radio-3" class="w3-radio" type="radio" value="3" name="my_rb">
        <label for="znetdkm-form-demo-radio-3">Option 3</label>
        <p></p>
        <!-- CHECKBOXES -->
        <div><b>Checkboxes</b> <i class="fa fa-asterisk w3-text-red"></i></div>
        <div class="w3-small w3-text-dark-gray"><i>Check at least one value.</i></div>
        <input id="znetdkm-form-demo-checkboxes-1" class="w3-check" type="checkbox" name="my_cb_1" value="1">
        <label for="znetdkm-form-demo-checkboxes-1">Value 1</label>&nbsp;&nbsp;
        <input id="znetdkm-form-demo-checkboxes-2" class="w3-check" type="checkbox" name="my_cb_2" value="2">
        <label for="znetdkm-form-demo-checkboxes-2">Value 2</label>
        <p></p>
        <!-- DROPDOWN -->
        <label><b>Dropdown</b> <i class="fa fa-asterisk w3-text-red"></i>
            <select class="w3-select w3-border w3-margin-bottom" name="my_dropdown" required>
                <option value="">Please select a value</option>
                <option value="1">First</option>
                <option value="2">Second</option>
                <option value="3">Third</option>
            </select>
        </label>
        <!-- LIST -->
        <label><b>Multiple selection</b> <i class="fa fa-asterisk w3-text-red"></i><br>
            <span class="w3-small w3-text-dark-gray"><i>Select at least two values.</i></span><br>
            <select class="w3-select w3-border w3-margin-bottom" name="my_multi_select[]" multiple required>
                <option value="1">Selection #1</option>
                <option value="2">Selection #2</option>
                <option value="3">Selection #3</option>
                <option value="4">Selection #4</option>
            </select>
        </label>
        <!-- TEXT -->
        <label><b>Text</b> <i class="fa fa-asterisk w3-text-red"></i><br>
            <span class="w3-small w3-text-dark-gray"><i>Minimum 3 characters</i></span><br>
            <input class="w3-input w3-margin-bottom w3-border" type="text" name="my_text" required placeholder="This field is required for validation">
        </label>
        <!-- DATE -->
        <label><b>Date</b><br>
            <span class="w3-small w3-text-dark-gray"><i>Must be a valid date greater than today</i></span><br>
            <input class="w3-input w3-margin-bottom w3-border" type="date" name="my_date">
        </label>
        <!-- TEXTAREA -->
        <label><b>Text area</b>
            <textarea class="w3-input w3-margin-bottom w3-border" name="my_textarea" rows="6" placeholder="Text on multiple lines..."></textarea>
        </label>
        <div class="w3-bar">
            <button class="info w3-button w3-blue w3-bar-item w3-margin-bottom" type="button"><i class="fa fa-info-circle"></i> Custom information message</button>
            <button class="warn w3-button w3-yellow w3-bar-item w3-margin-bottom" type="button"><i class="fa fa-warning"></i> Custom warning message</button>
            <button class="error w3-button w3-red w3-bar-item w3-margin-bottom" type="button"><i class="fa fa-times-circle"></i> Custom error message</button>
        </div>
        <p class="w3-right" aria-hidden="true"><i class="fa fa-asterisk w3-text-red"></i> Required field</p>
        <!-- SUBMIT -->
        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check fa-lg"></i>&nbsp;Submit</button>
    </div>
    <div class="w3-padding-48"></div>
</form>
<script>
$('#znetdkm-form-demo button.info').on('click', function(){
    const formObj = z4m.form.make('#znetdkm-form-demo');
    formObj.hideError();
    formObj.showInfo('My custom information message.', false, true);
});
$('#znetdkm-form-demo button.warn').on('click', function(){
    const formObj = z4m.form.make('#znetdkm-form-demo');
    formObj.hideError();
    formObj.showInfo('My custom warning message.', true, true);
});
$('#znetdkm-form-demo button.error').on('click', function(){
    const formObj = z4m.form.make('#znetdkm-form-demo');
    formObj.hideInfo();
    formObj.showError('My custom error message.', null, true);
});
</script>