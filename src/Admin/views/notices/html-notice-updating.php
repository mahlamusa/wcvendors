<?php
/**
 * Admin View: Notice - Update
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div id="message" class="updated wcvendors-message wc-connect">
	<p><strong><?php esc_attr_e( 'WC Vendors data update', 'wc-vendors' ); ?></strong>
		&#8211; <?php esc_attr_e( 'We need to update your marketplace database to the latest version.', 'wc-vendors' ); ?></p>
	<p class="submit"><a
			href="<?php echo esc_url( add_query_arg( 'do_update_wcvendors', 'true', admin_url( 'admin.php?page=wcv-settings' ) ) ); ?>"
			class="wcv-update-now button-primary"><?php esc_attr_e( 'Run the updater', 'wc-vendors' ); ?></a></p>
</div>
<script type="text/javascript">
	jQuery('.wc-update-now').click('click', function () {
		return window.confirm('<?php echo esc_js( __( 'It is strongly recommended that you backup your database before proceeding. Are you sure you wish to run the updater now?', 'wc-vendors' ) ); ?>'); // jshint ignore:line
	});
</script>
