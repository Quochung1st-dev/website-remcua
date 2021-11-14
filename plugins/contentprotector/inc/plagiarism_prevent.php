<?php { ?>
    <?php if (get_option('plagiarism_prevent_user_highlight') != '1') { ?>
        <style>
            * input, textarea {

                -webkit-touch-callout: none;
                /*-webkit-user-select: none;*/
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            body {

                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
        </style>
    <?php } ?>

    <!--version 4.2 -->

    <script type="text/javascript">
        function  sccopytext(e) {
            var select = '';
            var selected = false;
            var newcontext = false;
            var scalert = true;

            if (window.getSelection) {
                select = window.getSelection().toString();
            } else if (document.getSelection) {
                select = docment.getSelection();
            } else if (document.selection) {
                select = document.selection.createRange().text;
            }

            if (select !== '')
                selected = true;
            document.oncontextmenu = function () {
                if ((selected === true)) {
                    jQuery(document).unbind("copy").bind("copy", function () {
    <?php if (get_option('smart_content_protector_selecting_text') == '15') { ?>
        <?php if (get_option('smart_content_protector_ip') == '17') { ?>
                                ip_common_function();
        <?php } ?>
                            alert("<?php echo get_option('smart_content_protector_selecting_text_msg'); ?>");
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                                ip_common_function();
            <?php
        }
    }
    ?>
                    });
                }
            };
            var isCtrl = false;
            window.onkeydown = function (e) {
                if (e.which === 17) {
                    isCtrl = true;
                }
                if (isCtrl === true && (e.which === 67) && selected === true && newcontext != true) {
    <?php if (get_option('smart_content_protector_selecting_text') == '15') { ?>
        <?php if (get_option('smart_content_protector_ip') == '17') { ?>
                            ip_common_function();
        <?php } ?>
                        alert("<?php echo get_option('smart_content_protector_selecting_text_msg'); ?>");
                        return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                            ip_common_function();
            <?php
        }
    }
    ?>
                }
            };
        }
        jQuery(document).ready(function () {
            jQuery(document).bind("mouseup", sccopytext);
        });
    </script>


    <?php if (get_option('smart_content_enable_js_disable_error') == '1') { ?>
        <noscript>
        <div id='jsisdisabled'><h2><?php echo get_option('smart_content_js_disable_error_msg'); ?></h2></div>
        <style>
            #jsisdisabled{
                position: fixed;
                top:0;
                left:0;
                height:100%;
                width:100%;
                z-index: 999999;
                text-align: center;
                background-color:#FFFFFF;
                color:#ffe100;
                font-size: 40px;
            }
        </style>
        </noscript>
        <?php
    }
    if (get_option('smart_content_enable_js_disable_reload') == 'reload') {
        $userdata = get_option('smart_content_js_disable_error_reload');
        ?>

        <noscript>

        <meta http-equiv="refresh" content="0;URL='<?php echo $userdata; ?>'">

        </noscript>

    <?php } ?>

    <script type="text/javascript">

        function ip_common_function() {
    <?php
    $current_user = wp_get_current_user();
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }
    ?>
            var data = {
                'action': 'my_action',
                'ipaddress': '<?php echo $ipaddress ?>',
                'date': '<?php echo date("F j, Y, g:i a") ?>',
                'userid': '<?php echo $current_user->user_login ?>',
                'whichpage': '<?php echo get_permalink() ?>'

            };
            // We can also pass the url value separately from ajaxurl for front end AJAX implementations
            jQuery.post('<?php echo admin_url('admin-ajax.php') ?>', data, function (response) {
                //alert('Got this from the server: ' + response);
            });
        }

        document.onkeypress = function (event) {
            event = (event || window.event);
            if (event.keyCode === 123) {
                return false;
            }
        };
        document.onmousedown = function (event) {
            event = (event || window.event);
            if (event.keyCode === 123) {
                return false;
            }
        };
        document.onkeydown = function (event) {
            event = (event || window.event);
            if (event.keyCode === 123) {
                return false;
            }
        };
        function contentprotector() {
            return false; //initialize the function return false
        }
        function contentprotectors() {
            return false; //initialize the function return false
        }
    <?php
    if (get_option('plagiarism_prevent_user_highlight') == '1') {
        if (get_option('plagiarism_prevent_user_rightclick_disable') == "60") {
            ?>
                document.oncontextmenu = contentprotector; //calling the false function in contextmenu
            <?php
        } else {
            
        }
    } else {
        ?>
            document.oncontextmenu = contentprotector; //calling the false function in contextmenu
    <?php } ?>
        //document.onmouseup = contentprotector; //calling the false function in mouseup event
        var isCtrl = false;
        var isAlt = false;
        var isShift = false;
        var isPrint = false;
        window.onkeypress = function (e) {
            var isCmd = false;
            if (e.which === 17)
                isCtrl = false; // make the condition when ctrl key is pressed no action has performed.
            if (e.which === 44) {
    <?php if (get_option('smart_content_enable_print_screen') == '1') { ?>
        <?php if (get_option('smart_content_protector_ip') == '17') { ?>
                        ip_common_function();
        <?php } ?>
                    alert("<?php echo get_option('smart_content_print_screen_message'); ?>");
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>//
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 93) || (e.which === 91) || (e.which === 224))
                isCmd = false; // make the condition when ctrl key is pressed no action has performed.
        };
        document.onkeydown = function (e) {
            var isCtrl = false;
            if (e.which === 17) {
                isCtrl = true; //if onkeydown event is triggered then ctrl with possible copying keys are disabled.
            }

    <?php
    $smartcontent_u = get_option('smart_content_protector_u'); // 6
    $smartcontent_p = get_option('smart_content_protector_p'); // 7
    $smartcontent_a = get_option('smart_content_protector_a'); // 1
    $smartcontent_x = get_option('smart_content_protector_x'); // 3
    $smartcontent_c = get_option('smart_content_protector_c'); // 2
    $smartcontent_v = get_option('smart_content_protector_v'); // 4
    $smartcontent_s = get_option('smart_content_protector_s'); // 5 
    ?>
            if ((e.which === 85) && (e.ctrlKey)) {
    <?php
    if ($smartcontent_u == '6') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 80) && (e.ctrlKey)) {
    <?php
    if ($smartcontent_p == '7') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 65) && e.ctrlKey) {
    <?php
    if ($smartcontent_a == '1') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 88) && e.ctrlKey) {
    <?php
    if ($smartcontent_x == '3') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 67) && (e.ctrlKey)) {
    <?php
    if ($smartcontent_c == '2') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 86) && (e.ctrlKey)) {
    <?php
    if ($smartcontent_v == '4') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 83) && (e.ctrlKey)) {
    <?php
    if ($smartcontent_s == '5') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if (e.which === 44) {
    <?php
    if (get_option('smart_content_enable_print_screen') == '1') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php }
        ?>
                    alert("<?php echo get_option('smart_content_print_screen_message'); ?>");
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }

            if (e.which === 16) {
                isShift = true;
            }
    <?php if (get_option('smart_content_protector_i') == '8') { ?>
                if (e.ctrlKey && isShift === true && e.which === 73) { // for ctlr+shift+i key combination in Windows
                    return false;
                }
    <?php } ?>
            var isCmd = false;
            if ((e.which === 93) || (e.which === 91) || (e.which === 224))
                isCmd = true; //if onkeydown event is triggered then ctrl with possible copying keys are disabled.

    <?php
    $smartcontentmac_u = get_option('smart_content_protector_mac_u'); // 6
    $smartcontentmac_p = get_option('smart_content_protector_mac_p'); // 7
    $smartcontentmac_a = get_option('smart_content_protector_mac_a'); // 1
    $smartcontentmac_x = get_option('smart_content_protector_mac_x'); // 3
    $smartcontentmac_c = get_option('smart_content_protector_mac_c'); // 2
    $smartcontentmac_v = get_option('smart_content_protector_mac_v'); // 4
    $smartcontentmac_s = get_option('smart_content_protector_mac_s'); // 5
    ?>
            if ((e.which === 85) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_u == '6') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 80) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_p == '7') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 65) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_a == '1') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 88) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_x == '3') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 67) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_c == '2') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();
        <?php } ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 86) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_v == '4') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();<?php }
        ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }
            if ((e.which === 83) && (isCmd === true)) {
    <?php
    if ($smartcontentmac_s == '5') {
        if (get_option('smart_content_protector_ip') == '17') {
            ?>
                        ip_common_function();<?php }
        ?>
                    return false;
        <?php
    } else {
        if (get_option('smart_content_protector_ip_when_pd') == '18') {
            ?>
                        ip_common_function();
            <?php
        }
    }
    ?>
            }

            if (e.which === 18) {
                isAlt = true;
            }
    <?php if (get_option('smart_content_protector_mac_i') == '8') { ?>
                if (isCmd === true && isAlt === true && e.which === 73) { // for cmd+alt+i key combination in mac
                    return false;
                }
    <?php }
    ?>

            // Mac OS Print screen function

    <?php if (get_option('smart_content_protector_mac_cmdshift3') == '7') { ?>
                if (isCmd === true && isShift === true && e.which === 51) { // for cmd+shift+3 key combination in mac
                    return false;

                }
    <?php } ?>
    <?php if (get_option('smart_content_protector_mac_cmdshift4') == '7') { ?>
                if (isCmd === true && isShift === true && e.which === 52) { // for cmd+shift+4 key combination in mac
                    return false;
                }
    <?php } ?>
    <?php if (get_option('smart_content_protector_mac_cmdctrlshift3') == '7') { ?>

                if (isCmd === true && isCtrl === true && isShift === true && e.which === 51) {// for Cmd+Ctrl+Shift+3 key combination in mac
                    //alert('clicked');
                    return false;

                }
    <?php } ?>
    <?php if (get_option('smart_content_protector_mac_cmdshift4spacebar') == '7') { ?>
                if (isCmd === true && isShift === true && e.which === 52 && e.which === 32) {// for Cmd+Shift+4+hit Space bar combination in mac
                    return false;
                }
    <?php } ?>

            // End of Mac OS Printscreen

        };
        isCtrl = false;
        isCmd = false;
    <?php if (get_option('smart_content_protector_image_drag') == '7') { ?>
            document.ondragstart = contentprotector; // Dragging for Image is also Disabled(By Making Condition as false)
    <?php } ?>

    </script>
    <?php if (get_option('smart_content_protector_image_protection') == '1') { ?>
        <script type="text/javascript">

            jQuery(document).ready(function ($) {
                jQuery("a").each(function (i, el) {
                    var href_value = el.href;
                    if (/\.(jpg|png|gif)$/.test(href_value)) {
                        jQuery(this).prop('href', '#');
                    }


                });


            });</script>
    <?php } if (get_option('smart_content_protector_image_protection') == '2') { ?>
        <script type="text/javascript">

            jQuery(document).ready(function ($) {
                jQuery("a").each(function (i, el) {
                    var href_value = el.href;
                    if (/\.(jpg|png|gif)$/.test(href_value)) {

                        //jQuery(this).prop('href', '#');
                        //jQuery(this).css('cursor', 'pointer');
                        var linker = jQuery(this).attr('href');
                        //alert(linker);
                        var link = jQuery(this).attr('data-href', linker);
                        // alert(jQuery(this).attr('data-href'));
                        jQuery(this).attr('rel', 'prettyPhoto');
                        jQuery(this).prop('href', '#');
                    }


                });
                jQuery("a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'fast', slideshow: 10000, hideflash: true, social_tools: ''});
            });</script>
        <?php
    }
    if (get_option('smart_content_protector_textarea') == '1') {
        $message = nl2br(get_option('smart_content_protector_textarea_message'));
        $message = str_replace("\r\n", '', $message);
        ?>
        <script type="text/javascript">
            function add_message_to_copied_text() {
                var body_whole_message = document.getElementsByTagName('body')[0];
                var selection;
                selection = window.getSelection();
                var message_to_copied_text = "<br /><br /> <?php echo $message; ?>"; // change this if you want
                var copytext = selection + message_to_copied_text;
                var add_new_div = document.createElement('div');
                add_new_div.style.position = 'absolute';
                add_new_div.style.left = '-99999px';
                body_whole_message.appendChild(add_new_div);
                add_new_div.innerHTML = copytext;
                selection.selectAllChildren(add_new_div);
                window.setTimeout(function () {
                    body_whole_message.removeChild(add_new_div);
                }, 0);
            }
            document.oncopy = add_message_to_copied_text;
        </script>
        <?php
    } $post_types = SmartContentProtector::availbale_post_types_filter();
    $current_post_type = get_post_type();

    if (get_option('smart_content_protector_image_watermark') == '7') {
        $textarea_value = get_option('smart_content_protector_custom_name');
        $explode_data = explode("\r\n", $textarea_value);
        $json_encode = json_encode($explode_data);
        $width_option = get_option('smart_content_protector_custom_image_width_watermark');
        $height_option = get_option('smart_content_protector_custom_image_height_watermark');
        ?>

        <script type="text/javascript">

            jQuery(function () {
                var object = jQuery.parseJSON('<?php echo $json_encode; ?>');
        <?php
        if (get_option('smart_content_protector_name_size_image_watermark') === '9') {
            if (get_option('smart_content_protector_page_include_custom_water_exclude') === '1' && $textarea_value) {
                ?>
                        jQuery('img').each(function ($) {
                            var table1 = jQuery(this).attr('src');
                            if (typeof table1 !== typeof undefined || table1 == undefined) {
                                table1 = jQuery(this).attr('data-src');
                            }
                            var table = table1.split('\/');
                            var checkinarray = jQuery.inArray(table[table.length - 1], object);

                            if (checkinarray !== parseInt('-1')) {
                                add_watermark(this);
                            }

                        });
            <?php } ?>
        <?php } ?>

        <?php
        if (get_option('smart_content_protector_name_size_image_watermark') === '10') {
            if (get_option('smart_content_protector_page_include_custom_water_exclude') === '1') {
                ?>

                        jQuery('img').each(function ($) {
                            var img_width = jQuery(this).width();
                            var img_height = jQuery(this).height();
                            var saved_width = parseInt("<?php echo get_option('smart_content_protector_custom_image_width_watermark') ?>");
                            var saved_height = parseInt("<?php echo get_option('smart_content_protector_custom_image_height_watermark') ?>");
                            if ((saved_width >= img_width) && (saved_height >= img_height)) {
                                add_watermark(this);
                            }
                        });
            <?php } ?>
        <?php } ?>


        <?php
        if (get_option('smart_content_protector_name_size_image_watermark') === '9') {
            if (get_option('smart_content_protector_page_include_custom_water_exclude') === '2') {
                ?>
                        jQuery('img').each(function ($) {

                            var table1 = jQuery(this).attr('src');
                            if (typeof table1 !== typeof undefined || table1 == undefined) {
                                table1 = jQuery(this).attr('data-src');
                            }
                            var table = table1.split('\/');
                            var checkinarray = jQuery.inArray(table[table.length - 1], object);
                            if (checkinarray === parseInt('-1')) {
                                add_watermark(this);
                            }
                        });
            <?php } ?>
        <?php } ?>

        <?php
        if (get_option('smart_content_protector_name_size_image_watermark') === '10') {
            if (get_option('smart_content_protector_page_include_custom_water_exclude') === '2') {
                ?>

                        jQuery('img').each(function ($) {
                            var img_width = jQuery(this).width();
                            var img_height = jQuery(this).height();
                            var saved_width = parseInt("<?php echo get_option('smart_content_protector_custom_image_width_watermark') ?>");
                            var saved_height = parseInt("<?php echo get_option('smart_content_protector_custom_image_height_watermark') ?>");
                            if ((saved_width <= img_width) && (saved_height <= img_height)) {
                                add_watermark(this);
                            }
                        });
            <?php } ?>
            <?php
        }
        ?>


                function add_watermark(obj) {
                    jQuery(obj).removeAttr('srcset');
                    jQuery(obj).watermark({
                        path: '<?php
        $plugins_url = plugins_url('contentprotector/images/watermark.png');
        $custom_url = get_option('smart_content_protector_custom_image_watermark');
        $option = get_option('smart_content_protector_default_image_watermark');
        echo $option == '7' ? $plugins_url : $custom_url;
        ?>',
                        gravity: "<?php
        $position = get_option('smart_content_protector_image_watermark_position');

        if ($position == 'top-left') {
            echo "nw";
        } elseif ($position == 'top-right') {
            echo "ne";
        } elseif ($position == 'bottom-left') {
            echo "sw";
        } else {
            echo "se";
        }
        ?>"
                    });
                }
            });

        </script>

        <?php
    }
}
?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        // right click restriction start
        function fp_mouse_right_click_restriction() {
            jQuery(document).mousedown(function (e) {
                if (e.which === 3) {
<?php if (get_option('plagiarism_prevent_user_highlight') == '1' && get_option('plagiarism_prevent_user_rightclick_disable') != '60') { ?>
                        var sel = getSelection().toString();
                        if (sel) {
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return true;
                            }
                        } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return false;
                            }
    //                                document.addEventListener('contextmenu', event => event.preventDefault());
                        }
<?php } else { ?>
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                            alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                            ip_common_function();
        <?php
    }
    ?>
                        document.addEventListener('contextmenu', event => event.preventDefault());
    <?php
}
?>
                }
            });
        }

<?php if (get_option('smart_content_enable_right_click_link1') == '51' && get_option('smart_content_enable_right_click_link2') == '52') { ?>

            jQuery(document).mousedown(function (e) {
                if (e.which === 3) {
                    var target1 = e.target.tagName;
                    if (target1 == 'A') {
    <?php if (get_option('smart_content_protector_ip_when_pd') == '18') { ?>
                            ip_common_function();
    <?php } ?>
                        document.oncontextmenu = document.body.oncontextmenu = function () {
                            return true;
                        }
                    } else {
                        if (jQuery(e.target).closest('a').length) {
    <?php if (get_option('smart_content_protector_ip_when_pd') == '18') { ?>
                                ip_common_function();
    <?php } ?>
                            if (jQuery(e.target).closest('img').length > 0) {
    <?php if (get_option('smart_content_enable_right_click_image_link') == '55') { ?>
                                    document.oncontextmenu = document.body.oncontextmenu = function () {
                                        return true;
                                    }
    <?php } else { ?>
                                    document.oncontextmenu = document.body.oncontextmenu = function () {
                                        return false;
                                    }
    <?php } ?>
                            } else {
                                document.oncontextmenu = document.body.oncontextmenu = function () {
                                    return true;
                                }
                            }
                        } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return false;
                            }
                        }
                    }
                }
            });
<?php } else if (get_option('smart_content_enable_right_click_link1') == '51' && get_option('smart_content_enable_right_click_link2') != '52') { ?>
            jQuery(document).mousedown(function (e) {
                if (e.which === 3) {
                    var target1 = e.target.tagName;
                    if (target1 == 'A') {
                        var link = e.target.href;
                        var checkinternal = link.indexOf("<?php echo $_SERVER['SERVER_NAME']; ?>");
                        if (checkinternal > -1) {
    <?php if (get_option('smart_content_protector_ip_when_pd') == '18') { ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return true;
                            }
                        } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return false;
                            }
                        }
                    } else {
                        if (jQuery(e.target).closest('a').length) {
                            var link = jQuery(e.target).closest('a').eq(0).attr("href");
                            var checkinternal = link.indexOf("<?php echo $_SERVER['SERVER_NAME']; ?>");
                            if (checkinternal > -1) {
    <?php if (get_option('smart_content_protector_ip_when_pd') == '18') { ?>
                                    ip_common_function();
    <?php } ?>
                                if (jQuery(e.target).closest('img').length > 0) {
    <?php if (get_option('smart_content_enable_right_click_image_link') == '55') { ?>
                                        document.oncontextmenu = document.body.oncontextmenu = function () {
                                            return true;
                                        }
    <?php } else { ?>
                                        document.oncontextmenu = document.body.oncontextmenu = function () {
                                            return false;
                                        }
    <?php } ?>
                                } else {
                                    document.oncontextmenu = document.body.oncontextmenu = function () {
                                        return true;
                                    }
                                }
                            } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                    alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                    ip_common_function();
    <?php } ?>
                                document.oncontextmenu = document.body.oncontextmenu = function () {
                                    return false;
                                }
                            }
                        } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return false;
                            }
                        }
                    }
                }
            });
<?php } else if (get_option('smart_content_enable_right_click_link1') != '51' && get_option('smart_content_enable_right_click_link2') == '52') { ?>
            jQuery(document).mousedown(function (e) {
                if (e.which === 3) {
                    var target1 = e.target.tagName;
                    if (target1 == 'A') {
                        var link = e.target.href;
                        var checkinternal = link.indexOf("<?php echo $_SERVER['SERVER_NAME']; ?>");
                        if (checkinternal == -1) {
    <?php if (get_option('smart_content_protector_ip_when_pd') == '18') { ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return true;
                            }
                        } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return false;
                            }
                        }
                    } else {
                        if (jQuery(e.target).closest('a').length) {
                            var link = jQuery(e.target).closest('a').eq(0).attr("href");
                            var checkinternal = link.indexOf("<?php echo $_SERVER['SERVER_NAME']; ?>");
                            if (checkinternal == -1) {
    <?php if (get_option('smart_content_protector_ip_when_pd') == '18') { ?>
                                    ip_common_function();
    <?php } ?>
                                if (jQuery(e.target).closest('img').length > 0) {
    <?php if (get_option('smart_content_enable_right_click_image_link') == '55') { ?>
                                        document.oncontextmenu = document.body.oncontextmenu = function () {
                                            return true;
                                        }
    <?php } else { ?>
                                        document.oncontextmenu = document.body.oncontextmenu = function () {
                                            return false;
                                        }
    <?php } ?>
                                } else {
                                    document.oncontextmenu = document.body.oncontextmenu = function () {
                                        return true;
                                    }
                                }
                            } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                    alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                    ip_common_function();
    <?php } ?>
                                document.oncontextmenu = document.body.oncontextmenu = function () {
                                    return false;
                                }
                            }
                        } else {
    <?php if (get_option('smart_content_protector_alert') == '1') { ?>
                                alert("<?php echo get_option('smart_content_protector_alert_message'); ?>");
        <?php
    }
    if (get_option('smart_content_protector_ip') == '17') {
        ?>
                                ip_common_function();
    <?php } ?>
                            document.oncontextmenu = document.body.oncontextmenu = function () {
                                return false;
                            }
                        }
                    }
                }
            });
    <?php
} else {
    ?>
            fp_mouse_right_click_restriction();
    <?php
}
?>
    });
// right click restriction end   
</script>
<?php
if (get_option('smart_content_protector_p') == '7' || get_option('smart_content_protector_mac_p') == '7') {
    ?>
    <style type="text/css" media="print">
        * { display: none; }
    </style>
    <?php
} 