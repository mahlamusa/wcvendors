<?php

foreach ( $comments as $comment ) :
	$last_added = human_time_diff( strtotime( $comment->comment_date_gmt ), time() );

	?>

	<p>
		<?php printf( __( 'added %s ago', 'wcvendors' ), $last_added ); ?>
		</br>
		<?php echo $comment->comment_content; ?>
	</p>

<?php endforeach; ?>
