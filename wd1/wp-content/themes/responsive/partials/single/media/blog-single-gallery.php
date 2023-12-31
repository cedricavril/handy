<?php
/**
 * Blog single gallery format media
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Get attachments.
$attachments = responsive_get_gallery_ids( get_the_ID() );

// Return standard entry style if password protected or there aren't any attachments.
if ( post_password_required() || empty( $attachments ) ) {
	get_template_part( 'partials/single/media/blog-single' );
	return;
} ?>

<div class="thumbnail">

	<div class="gallery-format clr">

		<?php
		// Loop through each attachment ID.
		foreach ( $attachments as $attachment ) :

			// Get attachment data.
			$attachment_title = get_the_title( $attachment );
			$attachment_alt   = get_post_meta( $attachment, '_wp_attachment_image_alt', true );
			$attachment_alt   = $attachment_alt ? $attachment_alt : $attachment_title;

			// Get image output.
			$attachment_html = wp_get_attachment_image(
				$attachment,
				'full',
				'',
				array(
					'alt'      => $attachment_alt,
					'itemprop' => 'image',
				)
			);

			// Display with lightbox.
			if ( responsive_gallery_is_lightbox_enabled() == 'on' ) :
				?>

				<a href="<?php echo esc_url( wp_get_attachment_url( $attachment ) ); ?>" aria-label="<?php echo esc_attr( $attachment_alt ); ?>" title="<?php echo esc_attr( $attachment_alt ); ?>" class="gallery-lightbox">
					<?php echo wp_kses_post( $attachment_html ); ?>
				</a>

				<?php
				// Display single image.
			else :
				?>

				<?php echo wp_kses_post( $attachment_html ); ?>

				<?php
			endif;

		endforeach;
		?>

	</div>

</div>
