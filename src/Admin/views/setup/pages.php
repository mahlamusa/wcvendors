<?php
/**
 * Admin View: Step One
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<form method="post">
	<?php wp_nonce_field( 'wcv-setup' ); ?>
	<p
		class="store-setup">
		<?php // translators: %s The name used to refer to vendors ?>
		<?php echo esc_attr( sprintf( __( 'Select the pages for relevant frontend features for %s', 'wc-vendors' ), lcfirst( wcv_get_vendor_name( false ) ) ) ); ?></p>

	<table class="wcv-setup-table-pages">
		<thead>
		<tr>
			<td class="table-desc"><strong><?php esc_attr_e( 'Pages', 'wc-vendors' ); ?></strong></td>
			<td class="table-check"></td>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td class="table-desc"><?php esc_attr_e( 'Dashboard', 'wc-vendors' ); ?>

			</td>
			<td class="table-check">
				<?php wcv_single_select_page( 'wcvendors_dashboard_page_id', $dashboard_page_id, 'wc-enhanced-select' ); ?>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="tool-tip">
				<?php esc_attr_e( 'This page should contain the following shortcode. <code>[wcvendors_dashboard]</code>', 'wc-vendors' ); ?>
			</td>
		</tr>
		<tr>
			<td
				class="table-desc">
				<?php // translators: %s The name used to refer to vendors ?>
				<?php echo esc_attr( sprintf( __( '%s', 'wc-vendors' ), ucfirst( wcv_get_vendor_name( false ) ) ) ); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings ?></td>
			<td class="table-check">
				<?php wcv_single_select_page( 'wcvendors_vendors_page_id', $vendors_page_id, 'wc-enhanced-select' ); ?>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="tool-tip">
				<?php esc_attr_e( 'This page should contain the following shortcode. <code>[wcvendors_stores]</code>', 'wc-vendors' ); ?>
			</td>
		</tr>
		<tr>
			<td class="table-desc"><?php esc_attr_e( 'Terms & Conditions', 'wc-vendors' ); ?></td>
			</td>
			<td class="table-check">
				<?php wcv_single_select_page( 'wcvendors_vendor_terms_page_id', $terms_page_id, 'wc-enhanced-select' ); ?>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="tool-tip">
				<?php // translators: %s The name used to refer to vendors ?>
				<?php echo esc_attr( sprintf( __( 'This sets the page used to display the terms and conditions when a %s signs up.', 'wc-vendors' ), lcfirst( wcv_get_vendor_name( false ) ) ) ); ?>
			</td>
		</tr>
		</tbody>
	</table>
	<p class="wcv-setup-actions step">
		<button type="submit" class="button button-next" value="<?php esc_attr_e( 'Next', 'wc-vendors' ); ?>"
				name="save_step"><?php esc_html_e( 'Next', 'wc-vendors' ); ?></button>
	</p>
</form>
