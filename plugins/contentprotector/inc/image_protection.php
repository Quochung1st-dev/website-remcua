<style type="text/css">
    #gif,#gif11,#gif2,#gif3
    {
        width:100%;
        height:100%;
        display:none;
        margin-left: 393px;
    }

    #result,#result11,#result2,#result3
    {
        display:none;
        border-color:#e8426d;
        background-color:#FFFFFF;
        color:#e8426d;
        border: solid;
        width:160px;
        text-align: center;
        margin-left: 389px;
    }

    #resets1
    {
        background-color:#2687b2;
        display:none;
        border-color:#FFFF00;
        border-width:thick;
        width:160px;
    }
    .btn {
        background: #a4b0b8;
        background-image: -webkit-linear-gradient(top, #a4b0b8, #b8b8b8);
        background-image: -moz-linear-gradient(top, #a4b0b8, #b8b8b8);
        background-image: -ms-linear-gradient(top, #a4b0b8, #b8b8b8);
        background-image: -o-linear-gradient(top, #a4b0b8, #b8b8b8);
        background-image: linear-gradient(to bottom, #a4b0b8, #b8b8b8);
        -webkit-border-radius: 11;
        -moz-border-radius: 11;
        border-radius: 3px;
        font-family: inherit;
        font-size: 12px;
        font-weight: inherit;
        color: #ffffff;
        text-decoration: none;
        cursor: pointer;
        display: inline-block;
        border-width: 1px;
        box-sizing: border-box;
        height: 30px;

        margin: 0;
        padding: 0 10px 1px;
        white-space: nowrap;
        border-color: #ccc;
        box-shadow: 0 1px 0 #fff inset, 0 1px 0 rgba(0, 0, 0, 0.08);
        vertical-align: top;
    }
    .btn:hover {
        background: #3cb0fd;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
        background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
        text-decoration: none;
    }

    input[type="text"]{

        font-size:12pt;

        height:30px;

        width:250px;

    }
    input[type="text1"][type="text2"]{

        font-size:12pt;

        height:30px;

        width:100px;

    }
</style>

<style type="text/css">
    .form-table {
        border-collapse: collapse;
        clear: both;
        margin-top: 0.5em;
        width: 100%;
    }

    .form-table th, .form-wrap label {
        color: #222;
        font-weight: 400;
        text-shadow: none;
        vertical-align: baseline;
    }

    .form-table th {
        font-weight: 600;
        line-height: 1.3;
        padding: 20px 10px 20px 0;
        text-align: left;
        vertical-align: top;
        width: 200px;
    }


    .form-table th.th-full {
        font-weight: 400;
        width: auto;
    }


    .form-table td fieldset label {
        display: inline-block;
        margin: 0.25em 0 0.5em !important;
    }
    form-table td {
        line-height: 1.3;
        margin-bottom: 9px;
        padding: 15px 10px;
        vertical-align: middle;
    }


    .form-table, .form-table td, .form-table td p, .form-table th, .form-wrap label {
        font-size: 14px;
    }
    td {
        font-family: inherit;
        font-size: inherit;
        font-weight: inherit;
        line-height: inherit;
    }
    .form-table td {
        line-height: 1.3;
    }
    .form-table, .form-table td, .form-table td p, .form-table th, .form-wrap label {
        font-size: 14px;
    }
    td {
        font-family: inherit;
        font-size: inherit;
        font-weight: inherit;
        line-height: inherit;
    }
    .form-table, .form-table td, .form-table td p, .form-table th, .form-wrap label {
        font-size: 14px;
    }
    .form-table {
        border-collapse: collapse;
    }
    body {
        color: #444;
        font-family: "Open Sans",sans-serif;
        font-size: 13px;
        line-height: 1.4em;
    }

    .form-table, .form-table td, input[type="radio"]{
        margin: 0px;
    }

    .form-table input.tog, .form-table input[type="radio"] {
        float: none;
        margin-right: 4px;
        margin-top: 1px;
        vertical-align: middle;

    }
    .form-table td p, .description {
        margin-bottom: 0;
        margin-top: 4px;
        font-size: 14px;
        line-height: 0.5;
        border-collapse: collapse;
    }

    .textare {
        border: 2px solid #765942;
        border-radius: 10px;
        height: 120px;
        width: 230px;
    }

</style>


<script type="text/javascript">
    jQuery(document).ready(function ($) {
        jQuery('#submit_image_protection').click(function ($)
        {
            jQuery('#gif11').css("display", "block");
        });
    });
    function submitimageprotection() {
        jQuery.ajax({type: 'POST', url: 'options.php', data: jQuery('#form_image_protection').serialize(), success: function (response) {
                jQuery('#gif11').css("display", "none");
                jQuery('#result11').css("display", "block");
                jQuery('#result11').html("Settings Saved");
                jQuery('#result11').fadeOut(2500, "linear");
            }});

        return false;
    }

</script>
<?php if (get_option('smart_content_protector_close_button') == '1') { ?>
    <style type="text/css">
        ul li#form {
            display:none;
        }
    </style>
<?php } ?>


<script type="text/javascript">

    function checkAll(formname, checktoggle)
    {
        var checkboxes = new Array();
        checkboxes = document.forms[formname].getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type === 'checkbox') {
                checkboxes[i].checked = checktoggle;
            }
        }
    }
</script>


<script type="text/javascript">

    jQuery(document).ready(function () {
        if (jQuery('.image_watermark').is(":checked")) {
            jQuery('#user_image_watermark_option').css('display', 'inline-block');
            var currentvalue = jQuery(".smart_content_protector_default_image_watermark:checked").val();
            //alert(currentvalue);
            if (currentvalue === '8') {
                jQuery('#custommade').css('display', 'table-row');
            } else {
                jQuery('#custommade').css('display', 'none');
            }
            jQuery('.smart_content_protector_default_image_watermark').click(function () {
                //if (this.checked) {
                //alert(jQuery(this).val());
                var currentvalue = jQuery(this).val();
                //alert(currentvalue);
                if (currentvalue === '8') {

                    jQuery('#custommade').css('display', 'table-row');
                } else {
                    jQuery('#custommade').css('display', 'none');
                }


                //}
            });

        } else {
            jQuery('#user_image_watermark_option').css('display', 'none');
            jQuery('#custommade').css('display', 'none');
        }
        jQuery('.image_watermark').click(function () {
            if (jQuery(this).is(":checked")) {
                //alert("checked");
                jQuery('#user_image_watermark_option').css('display', 'inline-block');
                var currentvalue = jQuery(".smart_content_protector_default_image_watermark:checked").val();
                //alert(currentvalue);
                if (currentvalue === '8') {
                    jQuery('#custommade').css('display', 'table-row');
                } else {
                    jQuery('#custommade').css('display', 'none');
                }
                jQuery('.smart_content_protector_default_image_watermark').click(function () {
                    //if (this.checked) {
                    //alert(jQuery(this).val());
                    var currentvalue = jQuery(this).val();
                    if (currentvalue === '8') {

                        jQuery('#custommade').css('display', 'table-row');
                    } else {
                        jQuery('#custommade').css('display', 'none');
                    }


                    // }
                });

            } else {
                jQuery('#user_image_watermark_option').css('display', 'none');
                jQuery('#custommade').css('display', 'none');
            }
        });

        jQuery('.name_watermark_option').click(function () {
            jQuery('.custom_width_height').hide('fast');
            jQuery('.custom_select').show('fast');
        });
        jQuery('.size_watermark_option').click(function () {
            jQuery('.custom_select').hide('fast');
            jQuery('.custom_width_height').show('fast');
        });

    });</script>


<script type="text/javascript">
    jQuery(document).ready(function () {
        if (jQuery('.name_watermark_option:checked').val() === '9') {
            jQuery('.custom_width_height').hide('fast');
            jQuery('.custom_select').show('fast');
        } else {
            jQuery('.custom_width_height').show('fast');
            jQuery('.custom_select').hide('fast');
        }
        jQuery('.name_watermark_option').on('click', function () {
            if (jQuery(this).val() === '9') {
                jQuery('.custom_width_height').hide('fast');
                jQuery('.custom_select').show('fast');
            } else {
                jQuery('.custom_width_height').show('fast');
                jQuery('.custom_select').hide('fast');
            }
        });

    });</script>



<script language="JavaScript">
    jQuery(document).ready(function ($) {


        var custom_uploader;


        jQuery('#upload_image_button').click(function (e) {

            e.preventDefault();

            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            //Extend the wp.media object
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });

            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function () {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                jQuery('#upload_image').val(attachment.url);
            });

            //Open the uploader dialog
            custom_uploader.open();

        });


    });
</script>



<div class="metabox-holder4">
    <div class="postbox4">
        <h3>Image Protection Settings</h3>
        <div class="inside4">
            <form id="form_image_protection" onsubmit="return submitimageprotection();" name="myform">
                <?php settings_fields('smart_content_protector_image_protection_settings'); ?>
                <?php
                $image = get_option('smart_content_protector_image_protection');
                $image_drag = get_option('smart_content_protector_image_drag');
                $image_watermark = get_option('smart_content_protector_image_watermark');
                $default_image_watermark = get_option('smart_content_protector_default_image_watermark');
                $custom_url = get_option('smart_content_protector_custom_image_watermark');
                $image_watermark_position = get_option('smart_content_protector_image_watermark_position');
                $name_size_image_watermark = get_option('smart_content_protector_name_size_image_watermark');
                ?>
                <table class="form-table">
                    <tbody>

                        <tr>
                            <th>
                                <label for="cbu">Image Dragging Option</label>
                            </th>
                            <td>
                                <input class="cbu" type="checkbox" name="smart_content_protector_image_drag" value="7"<?php checked('7', $image_drag); ?>/>
                                <label>Disable Image Dragging</label>
                            </td>
                        </tr>
                    <br/>

                    <tr>
                        <th>
                            <label>Image Watermark Option</label>
                        </th>
                        <td>
                            <input class="image_watermark" type="checkbox"  name="smart_content_protector_image_watermark" value="7"<?php checked('7', $image_watermark); ?>/><label>Enable Image Watermark</label><br/>
                        </td>
                    </tr>
                     
                    

                    <tr>
                        <th>
                            <label></label>
                        </th>
                        <td id="user_image_watermark_option">
                            <input class="rb smart_content_protector_default_image_watermark" type="radio"    name="smart_content_protector_default_image_watermark"  value="7"<?php checked('7', $default_image_watermark); ?>/><label>Default Image Watermark</label><br/>
                            <input class="rb smart_content_protector_default_image_watermark" type="radio"   name="smart_content_protector_default_image_watermark"  value="8"<?php checked('8', $default_image_watermark); ?>/><label>Custom Image Watermark</label>
                        </td>
                    </tr>

                    <tr class="select_image_role" id="custommade">
                        <th>
                            <label>User Selection</label>
                        </th>
                        <td>
                            <input id="upload_image" type="text" size="40" name="smart_content_protector_custom_image_watermark" value="<?php echo get_option('smart_content_protector_custom_image_watermark'); ?>" />
                            <input id="upload_image_button" class="btn" type="button"value="Upload Image"/>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label></label>
                        </th>
                        <td id="name_size_watermark_option" class="">
                            <input class="name_watermark_option" type="radio"    name="smart_content_protector_name_size_image_watermark"  value="9"<?php checked('9', $name_size_image_watermark); ?>/><label>By Name</label>&nbsp;&nbsp;<input class="name_watermark_option" type="radio"   name="smart_content_protector_name_size_image_watermark"  value="10"<?php checked('10', $name_size_image_watermark); ?>/><label>By Size</label>
                        </td>
                    </tr>


                    <tr class="custom_select">
                        <th>
                            <label>Watermark Protection based on Image Name </label>
                        </th>
                        <td>
                            <textarea rows="5" cols="25" name="smart_content_protector_custom_name"  class="textare"><?php echo get_option('smart_content_protector_custom_name'); ?></textarea>
                            If left empty, when exclude options is selected then Watermark settings will be applied for all the images in the site
                            <p class="description">Image Name Ex&nbsp;:&nbsp;image.jpg Paste Inside A Box</p>
                        </td>

                    </tr>
                    <tr class="custom_width_height">
                        <th>
                            <label>Watermark Protection based on Image Dimensions </label>
                        </th>
                        <td>
                            <input id="" type="text1" size="10" name="smart_content_protector_custom_image_width_watermark" value="<?php echo get_option('smart_content_protector_custom_image_width_watermark'); ?>"/><label>Width</label>&nbsp;&nbsp;&nbsp;<input id="" type="text2" size="10" name="smart_content_protector_custom_image_height_watermark" value="<?php echo get_option('smart_content_protector_custom_image_height_watermark'); ?>"/><label>Height</label>

                        </td>
                    </tr>
                    <tr id="custom_include_exclude">
                        <th>
                            <label>Custom Image Apply</label>
                        </th>
                        <td>
                            <input type="radio" name="smart_content_protector_page_include_custom_water_exclude" value="1"<?php checked('1', get_option('smart_content_protector_page_include_custom_water_exclude')); ?>/><label>Include</label>&nbsp;<input type="radio" name="smart_content_protector_page_include_custom_water_exclude" value="2"<?php checked('2', get_option('smart_content_protector_page_include_custom_water_exclude')); ?>/><label>Exclude</label><br/>
                        </td>
                    </tr>

                    <tr valign="top" id="watermark-position-table" class="form-table">
                        <th scope="row">Watermark Position</th>
                        <td>
                            <fieldset>
                                <table id="watermark_position" border="1">
                                    <tbody>
                                        <tr>
                                            <td title="Top left position">
                                                <input type="radio" name="smart_content_protector_image_watermark_position"  onclick="" value="top-left"<?php checked('top-left', $image_watermark_position); ?>/>
                                            </td>
                                            <td title="Top right postion">
                                                <input type="radio" name="smart_content_protector_image_watermark_position"  onclick="" value="top-right"<?php checked('top-right', $image_watermark_position); ?>/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td title="Bottom left position">
                                                <input type="radio" name="smart_content_protector_image_watermark_position"  onclick="" value="bottom-left"<?php checked('bottom-left', $image_watermark_position); ?>/>
                                            </td>
                                            <td title="Bottom right position">
                                                <input type="radio" name="smart_content_protector_image_watermark_position"  onclick="" value="bottom-right"<?php checked('bottom-right', $image_watermark_position); ?>/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </td>
                    </tr><br/>
<!--                        <tr id="">
                        <th>
                            <label>Edge Position</label>
                        </th>
                        <td>
                        <input type="radio" name="smart_content_protector_position_normal" value="1"<?php checked('1', get_option('smart_content_protector_position_normal')); ?>/><label>Normal</label>&nbsp;<input type="radio" name="smart_content_protector_position_normal" value="2"<?php checked('2', get_option('smart_content_protector_position_normal')); ?>/><label>Corner</label><br/>
                        </td>
                    </tr>-->
                    <tr>
                        <th>
                            <label for="rb">Image Display Options</label>
                        </th>
                        <td>
                            <input type="radio" class="rb" name="smart_content_protector_image_protection" value="1"<?php checked('1', $image); ?>/><label>&nbsp;Don't Display Original Image in New Window</label><br/>
                            <input type="radio" class="rb" name="smart_content_protector_image_protection" value="2"<?php checked('2', $image); ?>/><label>&nbsp;Display Original Image in Lightbox</label><br/>
                            <input type="radio" class="rb" name="smart_content_protector_image_protection" value="3"<?php checked('3', $image); ?>/><label>&nbsp;Display Original Image in New Window ( Select This Option if the Theme has an inbuilt Lightbox. )</label>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <br/>
                <table>
                    <tr >
                        <td colspan="52">
                            <div id="gif11"><img src="<?php echo WP_PLUGIN_URL; ?>/contentprotector/images/bar.gif"/></div>
                            <div id="result11"></div>
                            <p class="submit">
                                <input type="submit" value="Save" id="submit_image_protection" name="submit" class="button-primary"/>
                            </p>
                        </td>
                    </tr>
                </table>
            </form>
            <form action="" method="post" class="form-1">
                <input type="submit" value="Reset" id="image_align"  name="reset_image_settings" class="button-secondary"/>
                <input name="action" type="hidden" value="reset" />

            </form><br/>
            <br/>
        </div>
    </div>
</div>
<?php
$bpageside1 = true;
if ($bpageside1 == false) {
    ?>
    <div class="metabox-holder_lp">
        <div class="postbox_lp"  >
            <h3 class="ad">You Like This Plugin?</h3>
            <div class="inside_lp">
                <p><strong>We are not taking donations. Try becoming a <a href="http://fantasticplugins.com/" target="_blank">Fantastic Plugins Member</a>. Afterall each Fantastic WordPress Plugin will cost less than a $1 for Members.</strong></p>
            </div>
        </div>
    </div>
<?php } ?>

<?php
$bpageside2 = true;
if ($bpageside2 == false) {
    ?>
    <div class="metabox-holder_latest">
        <div class="postbox_latest"  >
            <h3 class="ad">Latest News</h3>
            <div class="inside_latest">
                <?php
                $new = file_get_contents("http://fantasticplugins.com/blog/feed");
                $x = new SimpleXmlElement($new);
                echo "<ul>";
                $i = 0;
                foreach ($x->channel->item as $entry) {
                    if ($i == 5)
                        break;
                    echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
                    $i++;
                }

                echo "</ul>";
                ?>
            </div>

        </div>
    </div>

<?php } ?>