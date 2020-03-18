<?php
/**
 * Output the hidden fields required for quick edit
 *
 * @version  3.0.0
 * @since    3.0.0
 * @subpackage Admin/Views
 */
?>
<div class="hidden" id="wcvendors_inline_<?php echo absint( $post_id ); ?>">
	<div class="vendor_id"><?php echo esc_attr( $vendor_id ); ?></div>
	<div class="commission_rate"><?php echo esc_attr( $product->get_meta( '_wcv_commission_rate', true ) ); ?></div>
</div>
