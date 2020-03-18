<form method="post" name="add_comment" id="add-comment_<?php echo esc_attr( $order_id ); ?>">

	<?php wp_nonce_field( 'add-comment' ); ?>

	<textarea name="comment_text" style="width:97%"></textarea>

	<input type="hidden" name="product_id" value="<?php echo esc_attr( $product_id ); ?>">
	<input type="hidden" name="order_id" value="<?php echo esc_attr( $order_id ); ?>">

	<input class="btn btn-large btn-block" type="submit" name="submit_comment"
		   value="<?php esc_attr_e( 'Add comment', 'wcvendors' ); ?>">

</form>
