<div class="text-left social-login pb-half pt-half">
	<?php if( is_nextend_facebook_login() && get_option('woocommerce_enable_myaccount_registration')=='yes' && !is_user_logged_in())  { ?>
		<a href="<?php echo wp_login_url(); ?>?loginFacebook=1&redirect=<?php echo the_permalink(); ?>"
		class="button social-button large facebook circle"
		onclick="window.location = '<?php echo wp_login_url(); ?>?loginFacebook=1&redirect='+window.location.href; return false;"><i class="icon-facebook"></i>
		<span><?php _e('Login with <strong>Facebook</strong>','flatsome'); ?></span></a>
	<?php } ?>

	<?php if( is_nextend_google_login() && get_option('woocommerce_enable_myaccount_registration')=='yes' && !is_user_logged_in())  { ?>
		<a class="button social-button large google-plus circle"
		href="<?php echo wp_login_url(); ?>?loginGoogle=1&redirect=<?php echo the_permalink(); ?>"
		onclick="window.location = '<?php echo wp_login_url(); ?>?loginGoogle=1&redirect='+window.location.href; return false;">
		<i class="icon-google-plus"></i>
		<span><?php _e('Login with <strong>Google</strong>','flatsome'); ?></span></a>
	<?php } ?>
</div>
