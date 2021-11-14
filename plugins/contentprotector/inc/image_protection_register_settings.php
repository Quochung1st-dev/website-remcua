<?php

/**
 * Creating the function to register the settings of image protection
 */
function register_settings_image_protection() {
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_image_protection');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_image_drag');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_image_watermark');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_default_image_watermark');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_custom_image_watermark');
    register_setting('smart_content_protector_image_protection_settings', 'upload_button');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_image_watermark_position');  
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_custom_name');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_name_size_image_watermark');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_custom_image_width_watermark');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_custom_image_height_watermark');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_page_include_custom_water_exclude');
    register_setting('smart_content_protector_image_protection_settings', 'smart_content_protector_position_normal');
    
    add_option('smart_content_protector_image_protection', '1');
    add_option('smart_content_protector_image_drag', '7');
    add_option('smart_content_protector_default_image_watermark', '7');
    add_option('smart_content_protector_name_size_image_watermark', '9');
    add_option('smart_content_protector_image_watermark_position', 'top-left');
    add_option('smart_content_protector_page_include_custom_water_exclude', '2');
    add_option('smart_content_protector_position_normal', '1');
}

/**
 * Creating the function to reset the settings of image protection
 */
function reset_image_protection() {
    delete_option('smart_content_protector_image_protection');
    delete_option('smart_content_protector_image_drag');
    delete_option('smart_content_protector_image_watermark');
    delete_option('smart_content_protector_default_image_watermark');
    delete_option('smart_content_protector_custom_image_watermark');
    delete_option('smart_content_protector_image_watermark_position');
    delete_option('smart_content_protector_name_size_image_watermark');
    delete_option('smart_content_protector_page_include_custom_water_exclude');
    delete_option('smart_content_protector_custom_image_width_watermark');
    delete_option('smart_content_protector_custom_image_height_watermark');
    delete_option('smart_content_protector_custom_name');
    delete_option('smart_content_protector_position_normal');
 
    
// delete_option('smart_content_protector_page_include_cutom_exclude');
    
    
 }
?>