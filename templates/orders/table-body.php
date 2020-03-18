<?php
$item_meta = new WC_Order_Item_Meta( $item );
$item_meta = $item_meta->display( false, true );

if ( $count > 1 ) : ?>

<tr>

	<?php endif; ?>

	<?php if ( ! empty( $item_meta ) && '<dl class="variation"></dl>' !== $item_meta ) : ?>

	<td colspan="5">
		<?php echo wp_kses_post( $item_meta ); ?>
	</td>

<td colspan="3">

<?php else : ?>

	<td colspan="100%">

		<?php endif; ?>
		<?php // translators: %d The order quantity ?>
		<?php echo esc_attr( sprintf( __( 'Quantity: %d', 'wcvendors' ), $item['qty'] ) ); ?>
	</td>

	<?php if ( $count > 1 ) : ?>

</tr>

<?php endif; ?>
