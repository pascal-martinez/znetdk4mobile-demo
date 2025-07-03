<div class="w3-content w3-panel w3-theme">
    <h3><i class="fa fa-i-cursor fa-fw"></i> Autocomplete</h3>
    <p>This view shows a demonstration of the <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-autocomplete" target="_blank" rel="noopener">Autocomplete JS API</a>.</p>
</div>
<div class="w3-content">
    <input id="my-person-autocomplete" class="w3-input w3-border"
           type="search" placeholder="Enter the name of the person...">
</div>
<form id="my-person-autocomplete-form" class="w3-content w3-container w3-card-4 w3-theme-light w3-text-theme w3-margin-top">
    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
            <input class="w3-input w3-border" name="name" type="text" placeholder="Name" autocomplete="off" readonly>
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-map-signs"></i></div>
        <div class="w3-rest">
            <textarea class="w3-input w3-border" name="address" rows="2" placeholder="Address" autocomplete="off" readonly></textarea>
        </div>
    </div>
    
    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px">&nbsp;</div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="zip" type="text" placeholder="ZIP code" autocomplete="off" readonly>
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px">&nbsp;</div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="city" type="text" placeholder="City" autocomplete="off" readonly>
        </div>
    </div>
    
    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-paper-plane-o"></i></div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="email" type="text" placeholder="Email" autocomplete="off" readonly>
        </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone" autocomplete="off" readonly>
        </div>
    </div>

</form>
<script>
    console.log('DEBUG Autocomplete');
    var myPersonAutocompleteForm = znetdkMobile.form.make('#my-person-autocomplete-form');
    znetdkMobile.autocomplete.make('#my-person-autocomplete', {
        controller: 'personctrl',
        action: 'suggestions'
    }, function(item) {
        $(this).val(item.value + ' - ' + item.label + ', ' + item.extra);
        
        myPersonAutocompleteForm.init(item);
        return false;
    });
    $('#my-person-autocomplete').on('input.mycustomevent', function() {
        var personName = $('#my-person-autocomplete-form input[name=name]');
        if (personName.val().length > 1) {
            myPersonAutocompleteForm.reset();
        }
    });
</script>