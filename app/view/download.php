<div class="w3-content w3-panel w3-theme-l1">
    <h3><i class="fa fa-download"></i> Download</h3>
    <p>Click the buttons below to <strong>download</strong> a <strong>PDF document</strong> and a <strong>picture</strong> in a new browser tab .</p>
    <p>Download is fired by a call to the <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-file-display" target="_blank" rel="noopener">znetdkMobile.file.display()</a> JS method and the URI for download is obtained through the <a href="https://mobile.znetdk.fr/php-api#z4m-phpapi-tools-geturifordownload" target="_blank" rel="noopener">\General::getURIforDownload()</a> PHP method.</p>
</div>
<div class="w3-content">
    <button class="w3-btn w3-block w3-section w3-theme-action w3-hover-theme"
            onclick="znetdkMobile.file.display('<?php 
            echo General::getURIforDownload('featurectrl', 'filename=document.pdf'); ?>');">
        <i class="fa fa-lg fa-file-pdf-o"></i>&nbsp;PDF document
    </button>
    <button class="w3-btn w3-block w3-section w3-theme-action w3-hover-theme"
            onclick="znetdkMobile.file.display('<?php
                echo General::getURIforDownload('featurectrl', 'filename=picture.jpg'); ?>');">
        <i class="fa fa-lg fa-file-picture-o"></i>&nbsp;JPEG picture
    </button>
</div>