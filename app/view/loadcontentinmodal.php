<div class="w3-panel w3-theme-l1">
    <h3><i class="fa fa-window-maximize"></i> View in modal</h3>
    <p>By clicking the button below, a text content is loaded dynamically in AJAX and shown in a modal dialog (see <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-modal" target="_blank" rel="noopener">Modal Dialog JS API</a>).</p>
</div>
<div class="w3-padding-24"></div>
<button id="load-content-in-modal" class="w3-button w3-block w3-theme-action w3-hover-theme"><i class="fa fa-hourglass-end"></i> Load the view content in a modal</button>
<script>
    $('#load-content-in-modal').on('click', function(){
        znetdkMobile.modal.make('#modal-with-content', 'modalwithcontent', function(){
            this.open();
        });        
//        var modalId = '#modal-with-content',
//            modalElement = $(modalId);
//        if (modalElement.length === 0) {
//            znetdkMobile.ajax.loadView('modalwithcontent', $('body'), showModal);
//        } else {
//            showModal();
//        }
//        function showModal() {
//            var modalObject = znetdkMobile.modal.make(modalId);
//            modalObject.open();
//        }
    });
</script>