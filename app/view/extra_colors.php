<div class="w3-content w3-panel w3-theme">
    <h3><i class="fa fa-tint"></i> Extra colors</h3>
    <p>Add <b>extra colors</b> to your application from the <a href="https://www.w3schools.com/w3css/w3css_colors.asp" target="_blank" rel="noopener">W3.CSS colors</a> for styling contents, text and borders.</p>
    <p>This W3CSS color palette is adjusted by ZnetDK 4 Mobile to be compliant with accessibility standards in light and dark display.</p>
</div>
<div class="w3-content">
    <h2 class="w3-text-theme w3-border-bottom w3-border-theme">Colors</h2>
    <div class="w3-section">
    <?php $colors = ['amber','aqua','blue','light-blue','brown','cyan','blue-grey','green','light-green','indigo','khaki','lime','orange','deep-orange','pink','purple','deep-purple','red','sand','teal','yellow','white','black','grey','light-grey','dark-grey','pale-red','pale-green','pale-yellow','pale-blue'];
     foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-margin-bottom w3-<?php echo $color; ?>">
            w3-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="w3-section w3-padding w3-hide-small">
        <h3 class="w3-text-theme w3-border-bottom w3-border-theme"><i class="fa fa-hand-paper-o"></i> Hover</h3>
    <?php foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-theme w3-margin-bottom w3-hover-<?php echo $color; ?>">
            w3-hover-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <h2 class="w3-text-theme w3-border-bottom w3-border-theme">Text colors</h2>
    <div class="w3-section">
    <?php foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-margin-bottom w3-text-<?php echo $color; ?>">
            w3-text-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="w3-section w3-padding w3-hide-small">
        <h3 class="w3-text-theme w3-border-bottom w3-border-theme"><i class="fa fa-hand-paper-o"></i> Hover</h3>
    <?php foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-margin-bottom w3-hover-text-<?php echo $color; ?>">
            w3-hover-text-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <h2 class="w3-text-theme w3-border-bottom w3-border-theme">Border colors</h2>
    <div class="w3-section w3-padding-small">
    <?php foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-margin-bottom w3-border w3-bottombar w3-leftbar w3-border-<?php echo $color; ?>">
            w3-border-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="w3-section w3-padding w3-hide-small">
        <h3 class="w3-text-theme w3-border-bottom w3-border-theme"><i class="fa fa-hand-paper-o"></i> Hover</h3>
    <?php foreach ($colors as $color) : ?>
        <div class="w3-show-inline-block w3-padding-small w3-margin-bottom w3-border w3-border-theme w3-bottombar w3-leftbar w3-hover-border-<?php echo $color; ?>">
            w3-hover-border-<?php echo $color; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <h2 class="w3-text-theme w3-border-bottom w3-border-theme">Elements colored by W3CSS</h2>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>&lt;hr&gt;</b> element<br>
        <hr>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>&lt;mark&gt;</b> element<br>
        Here is an example of <mark>marked</mark> word.
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>&lt;fieldset&gt;</b> element<br>
        <fieldset>
            <legend>Legend</legend>
            <p>Fieldset content...</p>
        </fieldset>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>.w3-code</b> class<br>
        <div class="w3-code">
            myStatement1;<br>
            myStatement2;<br>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>.w3-codespan</b> class<br>
        <p>The <span class="w3-codespan">html</span> element is used to ...</p>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>.w3-border</b> class<br>
        <div class="w3-border w3-section" style="width:50px;height:20px"></div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>.w3-border-top</b>, <b>.w3-border-left</b>, <b>.w3-border-bottom</b> and <b>.w3-border-right</b> classes<br>
        <div class="w3-section">
            <div class="w3-border-top" style="width:50px;height:20px;display:inline-block"></div>
            <div class="w3-border-left" style="width:50px;height:20px;display:inline-block"></div>
            <div class="w3-border-bottom" style="width:50px;height:20px;display:inline-block"></div>
            <div class="w3-border-right" style="width:50px;height:20px;display:inline-block"></div>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <b>.w3-topbar</b>, <b>.w3-leftbar</b>, <b>.w3-bottombar</b> and <b>.w3-rightbar</b> classes<br>
        <div class="w3-section">
            <div class="w3-topbar" style="width:50px;height:20px;display:inline-block"></div>
            <div class="w3-leftbar" style="width:50px;height:20px;display:inline-block"></div>
            <div class="w3-bottombar" style="width:50px;height:20px;display:inline-block"></div>
            <div class="w3-rightbar" style="width:50px;height:20px;display:inline-block"></div>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-sidebar</b> class</div>
        <div style="height:80px">
            <div class="w3-sidebar" style="position:inherit!important">Sidebar...</div>
        </div>
    </div>    
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-modal-content</b> class</div>
        <div class="w3-modal-content">
            <p>Modal content...</p>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-button:hover</b> selector</div>
        <button class="w3-button w3-theme-action">Hover Over Me!</button>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-ul li</b> selector</div>
        <ul class="w3-ul">
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
        </ul>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-ul.w3-hoverable li:hover</b> selector</div>
        <ul class="w3-ul w3-hoverable">
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
        </ul>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-bordered tr</b> selector</div>
        <table class="w3-table w3-bordered">
            <tr>
                <th>Col A</th>
                <th>Col B</th>
            </tr>
            <tr>
                <td>Val 1</td>
                <td>Val 2</td>
            </tr>
            <tr>
                <td>Val 3</td>
                <td>Val 4</td>
            </tr>
            <tr>
                <td>Val 5</td>
                <td>Val 6</td>
            </tr>
        </table>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-striped tbody tr:nth-child(even)</b> selector</div>
        <table class="w3-table w3-striped">
            <tr>
                <th>Col A</th>
                <th>Col B</th>
            </tr>
            <tr>
                <td>Val 1</td>
                <td>Val 2</td>
            </tr>
            <tr>
                <td>Val 3</td>
                <td>Val 4</td>
            </tr>
            <tr>
                <td>Val 5</td>
                <td>Val 6</td>
            </tr>
        </table>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-table-all tr:nth-child(odd)</b> and <b>.w3-table-all tr:nth-child(even)</b> selectors</div>
        <table class="w3-table-all">
            <tr>
                <th>Col A</th>
                <th>Col B</th>
            </tr>
            <tr>
                <td>Val 1</td>
                <td>Val 2</td>
            </tr>
            <tr>
                <td>Val 3</td>
                <td>Val 4</td>
            </tr>
            <tr>
                <td>Val 5</td>
                <td>Val 6</td>
            </tr>
        </table>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-hoverable tbody tr:hover</b> selector</div>
        <table class="w3-table w3-hoverable">
            <tr>
                <th>Col A</th>
                <th>Col B</th>
            </tr>
            <tr>
                <td>Val 1</td>
                <td>Val 2</td>
            </tr>
            <tr>
                <td>Val 3</td>
                <td>Val 4</td>
            </tr>
            <tr>
                <td>Val 5</td>
                <td>Val 6</td>
            </tr>
        </table>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-dropdown-hover:first-child</b> selector</div>
        <div>
            <div class="w3-dropdown-hover w3-padding">Dropdown button</div>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>w3-dropdown-click:hover</b> selector</div>
        <div>
            <div class="w3-dropdown-click w3-padding">Hover Over Me!</div>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-dropdown-hover:hover &gt; .w3-button:first-child</b> selector</div>
        <div>
            <div class="w3-dropdown-hover">
                <div class="w3-button w3-theme-action">Hover Over Me!</div>
            </div>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-dropdown-click:hover &gt; .w3-button:first-child</b> selector</div>
        <div>
            <div class="w3-dropdown-click">
                <div class="w3-button w3-theme-action">Hover Over Me!</div>
            </div>
        </div>
    </div>
    <div class="w3-padding-small w3-theme-l4 w3-margin-bottom">
        <div class="w3-margin-bottom"><b>.w3-dropdown-content</b> class</div>
        <div class="w3-dropdown-hover">
            <button class="w3-button w3-theme-action">Hover Over Me!</button>
            <div class="w3-dropdown-content w3-bar-block w3-border">
                <a href="#" class="w3-bar-item w3-button">Link 1</a>
                <a href="#" class="w3-bar-item w3-button">Link 2</a>
                <a href="#" class="w3-bar-item w3-button">Link 3</a>
            </div>
        </div>
    </div>
</div>
<div class="w3-padding-64"></div>
<script>
    z4m.action.setScrollUpButtonForView('extra_colors');
</script>