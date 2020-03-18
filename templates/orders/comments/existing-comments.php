<?php

foreach ( $comments as $_comment ) :
	$last_added = human_time_diff( strtotime( $_comment->comment_date_gmt ), time() );

	?>

	<p>
	<?php // translators: %s Time passed since comment was added ?>
		<?php echo esc_attr( sprintf( __( 'added %s ago', 'wcvendors' ), $last_added ) ); ?>
		</br>
		<?php echo wp_kses_post( $comment->comment_content ); ?>
	</p>

<?php endforeach; ?>
