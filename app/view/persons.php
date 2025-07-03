<?php
/* Set 'PersonDbCtrl' value for accessing data from database */
$personCtrl = 'PersonCtrl';
?>
<div class="w3-panel w3-theme">
    <h3><i class="fa fa-address-card-o"></i> Persons</h3>
    <p>Here is an example of a <strong>list of persons</strong> created with the help of the <a href="https://mobile.znetdk.fr/js-api#z4m-jsapi-datalist" target="_blank" rel="noopener">Data List JS API</a>.</p>
</div>
<!-- List of Persons -->
<ul id="persons" class="w3-ul w3-hide" data-zdk-load="<?php echo $personCtrl; ?>:all"
        data-zdk-autocomplete="<?php echo $personCtrl; ?>:suggestions">
    <li class="w3-border-theme" data-id="{{id}}">
        <div class="w3-row">
            <div class="w3-col" style="width: 60px;">
                <a class="edit w3-button w3-circle w3-ripple w3-xlarge w3-theme-action w3-hover-theme"><i class="fa fa-edit"></i></a>
            </div>
            <div class="w3-rest w3-row">
                <div class="w3-col s12 m12 l3 w3-padding-small">
                    <span class="w3-tag w3-theme">{{id}}</span>
                    <span class="w3-large"><strong>{{name}}</strong></span>
                </div>
                <div class="w3-col s12 m6 l3 w3-padding-small">
                    <i class="w3-text-theme fa fa-map-signs fa-lg"></i>&nbsp;<span>{{zip}} - {{city}}</span>
                </div>
                <div class="w3-col s12 m6 l2 w3-padding-small">
                    <i class="w3-text-theme fa fa-phone-square fa-lg"></i>
                    <a href="tel:{{phone}}">{{phone}}</a>
                </div>
                <div class="w3-col s12 m12 l4 w3-padding-small">
                    <i class="w3-text-theme fa fa-envelope fa-lg"></i>&nbsp;
                    <a href="mailto:{{email}}">{{email}}</a>
                </div>
            </div>
        </div>
    </li>
    <li><h3 class="w3-red w3-center"><i class="fa fa-frown-o"></i> No Person found!</h3></li>
</ul>
<!-- Modal dialog for adding and editing a Person -->
<div id="person-modal" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-theme-dark">
            <span class="close w3-button w3-xlarge w3-hover-theme w3-display-topright"><i class="fa fa-times-circle fa-lg"></i></span>
            <h4 class="title">Person</h4>
        </header>
        <form class="w3-container w3-theme-light" data-zdk-load="<?php echo $personCtrl; ?>:detail"
                data-zdk-submit="<?php echo $personCtrl; ?>:store">
            <input type="hidden" name="id">
            <div class="w3-section">
                <label><b>Name</b> <i class="fa fa-asterisk w3-text-red"></i>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="name" autocomplete="name" required>
                </label>
                <label><b>Birthdate</b>
                    <input class="w3-input w3-border w3-margin-bottom" type="date" name="birthdate" autocomplete="bday">
                </label>
                <label><b>Address</b>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="address" autocomplete="street-address">
                </label>
                <label><b>ZIP</b>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="zip" autocomplete="postal-code">
                </label>
                <label><b>City</b>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="city" autocomplete="address-level2">
                </label>
                <label><b>Country</b>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="country" autocomplete="country">
                </label>
                <label><b>Phone</b>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="phone" autocomplete="tel">
                </label>
                <label><b>Email</b>
                    <input class="w3-input w3-border" type="email" name="email" autocomplete="email">
                </label>
                <p class="w3-right" aria-hidden="true"><i class="fa fa-asterisk w3-text-red"></i> Required field</p>
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-floppy-o fa-lg"></i>&nbsp;<?php echo LC_BTN_SAVE; ?></button>
            </div>
        </form>
        <div class="w3-container w3-border-top w3-border-theme w3-padding-16 w3-theme-l4">
            <button type="button" class="cancel w3-button w3-red"><i class="fa fa-times fa-lg"></i>&nbsp;<?php echo LC_BTN_CLOSE; ?></button>
        </div>
    </div>
</div>
<script>
$(function(){
    var list = znetdkMobile.list.make('#persons');
    list.setCustomSortCriteria({
        id: 'Person # (default)',
        name: 'Name',
        city: 'City',
        country: 'Country'
    }, 'id');
    list.setModal('#person-modal', true, function(formObject){
        // NEW
        this.setTitle('New person');
    }, function(formObject) {
        // EDIT
        var personId = formObject.getInputValue('id');
        this.setTitle('Edit person #' + personId);
    });
    list.uniqueSearchedKeyword = false;
    znetdkMobile.action.setScrollUpButtonForView(
            znetdkMobile.content.getParentViewId($('#persons')));
});
</script>