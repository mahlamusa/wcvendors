<?php if ( function_exists( 'wc_print_notices' ) ) {
	wc_print_notices(); } else {
	global $woocommerce;
	wc_print_notices();
	} ?>

<?php if ( wcv_is_pending_vendor( get_current_user_id() ) ) { ?>

	<p><?php esc_attr_e( 'Your account has not yet been approved to become a vendor.  When it is, you will receive an email telling you that your account is approved!', 'wcvendors' ); ?></p>

<?php } else { ?>

	<p><?php esc_attr_e( 'Your account is not setup as a vendor.', 'wcvendors' ); ?></p>

	<?php if ( get_option( 'wcvendors_vendor_allow_registration' ) ) { ?>
		<form method="POST" action="">
			<div class="clear"></div>
			<p class="form-row">
				<input class="input-checkbox"
					   id="apply_for_vendor" <?php checked( isset( $_POST['apply_for_vendor'] ), true ); // phpcs:ignore WordPress.Security.NonceVerification.Missing ?>
					   type="checkbox" name="apply_for_vendor" value="1"/>
				<label for="apply_for_vendor"
					   class="checkbox"><?php echo esc_attr( apply_filters( 'wcvendors_vendor_registration_checkbox', __( 'Apply to become a vendor? ', 'wcvendors' ) ) ); ?></label>
			</p>

			<div class="clear"></div>

			<?php
			$terms_page = get_option( 'wcvendors_vendor_terms_page_id' );
			if ( $terms_page ) {
				
				?>
				<p class="form-row agree-to-terms-container" style="display:none">
					<input class="input-checkbox"
						   id="agree_to_terms" <?php checked( isset( $_POST['agree_to_terms'] ), true ); // phpcs:ignore WordPress.Security.NonceVerification.Missing ?>
						   type="checkbox" name="agree_to_terms" value="1"/>
					<label for="agree_to_terms"
						  class="checkbox">
							<?php // translators: %s - Link to terms and conditions ?>
							<?php echo wp_kses_post( sprintf( __( 'I have read and accepted the <a href="%s">terms and conditions</a>', 'wcvendors' ), esc_url_raw( get_permalink( $terms_page ) ) ) ); ?>
					</label>
				</p>

				<script type="text/javascript">
					jQuery(function () {
						if (jQuery('#apply_for_vendor').is(':checked')) {
							jQuery('.agree-to-terms-container').show();
						}

						jQuery('#apply_for_vendor').on('click', function () {
							jQuery('.agree-to-terms-container').slideToggle();
						});
					})
				</script>

				<div class="clear"></div>
			<?php } ?>

			<p class="form-row">
				<input type="submit" class="button" name="apply_for_vendor_submit"
					   value="<?php esc_attr_e( 'Submit', 'wcvendors' ); ?>"/>
			</p>
		</form>
	<?php } ?>

<?php } ?>

<br class="clear">
