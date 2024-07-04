<div class="w3-content w3-panel w3-theme-l1">
    <h3><i class="fa fa-upload"></i> Upload</h3>
    <p>Here is an example of using the <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-form" target="_blank" rel="noopener">Form JS API</a> with <strong>multiple files uploaded</strong> in AJAX.</p>
</div>
<form id="znetdkm-upload-demo" class="w3-content w3-theme-light" novalidate data-zdk-submit="featurectrl:upload">
    <div class="w3-section">
        <label>
            <b>Files to upload</b> <i class="fa fa-asterisk w3-text-red"></i>
            <input class="upload w3-hide" type="file" name="files[]" multiple required style="opacity:0;position:absolute">
        </label>
        <button class="upload w3-button w3-block w3-theme-action w3-margin-bottom" type="button"><i class="fa fa-folder-open-o fa-lg"></i>&nbsp;Select files...</button>
        <div class="w3-section">
            <p class="no-selection w3-text-red"><i class="fa fa-exclamation-circle"></i>&nbsp;No file selected.</p>
            <div class="selected"></div>
        </div>
        <label>
            <b>File Tag</b>
            <input class="w3-input w3-border" type="text" name="file_tag" placeholder="Picture, Music, PDF document, ...">
        </label>        
        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-upload fa-lg"></i>&nbsp;Upload</button>
    </div>
</form>
<script>
    let uploadForm = znetdkMobile.form.make('#znetdkm-upload-demo', function(response) {
        // Nothing to do.
    });
    $('#znetdkm-upload-demo button.upload').on('click', function(){
        var fileInput = $('#znetdkm-upload-demo input.upload');
        fileInput.trigger('click');
        fileInput.off('change').one('change', function(){            
            const selectedFiles = this.files,
                noSelectionEl = $('#znetdkm-upload-demo .no-selection'),
                selectionContainer = $('#znetdkm-upload-demo .selected');
            if (selectedFiles.length === 0) {
                noSelectionEl.removeClass('w3-hide');
                selectionContainer.empty();
                selectionContainer.addClass('w3-hide');
                return false;
            }
            noSelectionEl.addClass('w3-hide');
            selectionContainer.removeClass('w3-hide');
            for (let i = 0; i < selectedFiles.length; i++) {
                const fileReader = new FileReader(),
                    currentFile = selectedFiles.item(i);
                selectionContainer.append('<span class="w3-tag w3-round-large w3-theme-l3 w3-margin-right"><i class="fa fa-file-o"></i>&nbsp;' + currentFile.name + '</span>');
            }
            // Form error message displayed if displayed
            uploadForm.hideError();
        });
    });
</script>