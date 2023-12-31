<?php $meta = get_post_custom($post->ID); ?>

<?php if ( has_post_format( 'audio' ) ): // Audio @fromfull ?>

    <?php $formats = array();
      foreach ( explode('|','mp3|ogg') as $format ) {
        if ( isset($meta['_audio_'.$format.'_url']) ) {
          $format = ($format=='ogg')?'oga':$format;
          // Change mp3 to m4a if necessary
          if ( $format == 'mp3' ) {
            if ( strstr($meta['_audio_mp3_url'][0],'.m4a') ) {
              $format = 'm4a';
            }
          }
          $formats[] = $format;
        }
      }
    ?>

    <?php if ( !empty($formats) ): ?>
    <script>
    jQuery(document).ready(function(){
      if(jQuery().jPlayer) {
        jQuery("#jquery-jplayer-<?php the_ID(); ?>").jPlayer({
          ready: function () {
            jQuery(this).jPlayer("setMedia", {
              <?php if(in_array('mp3',$formats)) { echo 'mp3: "'.$meta['_audio_mp3_url'][0].'",'."\n"; } ?>
              <?php if(in_array('m4a',$formats)) { echo 'm4a: "'.$meta['_audio_mp3_url'][0].'",'."\n"; } ?>
              <?php if(in_array('oga',$formats)) { echo 'oga: "'.$meta['_audio_ogg_url'][0].'",'."\n"; } ?>
            });
          },
          swfPath: "<?php echo esc_url( get_template_directory_uri() ); ?>/js",
          cssSelectorAncestor: "#jp-interface-<?php the_ID(); ?>",
          supplied: "<?php echo implode(',',$formats); ?>"
        });
      }
    });
    </script>
    <?php endif; ?>

    <div class="post-format">
      <div class="image-container">
        <?php if ( has_post_thumbnail() ) {
          $image_size = hu_is_checked( 'singular-post-cropped-feat-img' ) ? 'thumb-large' : 'full';
          hu_the_post_thumbnail($image_size, '', false);//no attr, no placeholder
          $caption = get_post(get_post_thumbnail_id())->post_excerpt;
          if ( isset($caption) && $caption ) echo '<div class="image-caption">'.$caption.'</div>';
        } ?>
      </div>

      <div id="jquery-jplayer-<?php the_ID(); ?>" class="jp-jplayer"></div>

      <div class="jp-audio">
        <div id="jp-interface-<?php the_ID(); ?>" class="jp-interface">
          <ul class="jp-controls">
            <li><a href="#" class="jp-play" tabindex="1"><i class="fas fa-play"></i></a></li>
            <li><a href="#" class="jp-pause" tabindex="1"><i class="fas fa-pause"></i></a></li>
            <li><a href="#" class="jp-mute" tabindex="1"><i class="fas fa-volume-up"></i></a></li>
            <li><a href="#" class="jp-unmute" tabindex="1"><i class="fas fa-volume-down"></i></a></li>
          </ul>
          <div class="jp-progress-container">
            <div class="jp-progress">
              <div class="jp-seek-bar">
                <div class="jp-play-bar"></div>
              </div>
            </div>
          </div>
          <div class="jp-volume-bar-container">
            <div class="jp-volume-bar">
              <div class="jp-volume-bar-value"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

<?php endif; //end of @fromfull?>

<?php if ( has_post_format( 'gallery' ) ): // Gallery ?>

  	<div class="post-format">
  		<?php $images = hu_post_images(); if ( !empty($images) ): ?>
  		<div class="flex-container">
  			<div class="flexslider" id="flexslider-for-gallery-post-format-<?php the_ID(); ?>">
  				<ul class="slides">
  					<?php foreach ( $images as $image ): ?>
  						<li>
  							<?php $imageid = wp_get_attachment_image_src($image->ID,'large'); ?>
  							<img src="<?php echo esc_attr( $imageid[0] ); ?>" alt="<?php echo esc_attr( $image->post_title ); ?>">

  							<?php if ( $image->post_excerpt ): ?>
  								<div class="image-caption"><?php echo $image->post_excerpt; ?></div>
  							<?php endif; ?>
  						</li>
  					<?php endforeach; ?>
  				</ul>
  			</div>
  		</div>
  		<?php endif; ?>
  	</div>

<?php endif; ?>

<?php if ( has_post_format( 'image' ) ): // Image ?>

  	<div class="post-format">
  		<div class="image-container">
  			<?php if ( has_post_thumbnail() ) {
          $image_size = hu_is_checked( 'singular-post-cropped-feat-img' ) ? 'thumb-large' : 'full';
          hu_the_post_thumbnail($image_size, '', false);//no attr, no placeholder
  				$caption = get_post(get_post_thumbnail_id())->post_excerpt;
  				if ( isset($caption) && $caption ) echo '<div class="image-caption">'.$caption.'</div>';
  			} ?>
  		</div>
	</div>

<?php endif; ?>

<?php if ( has_post_format( 'video' ) ): // Video @fromfull ?>
  	 <div class="post-format">
      <?php
        if ( isset($meta['_video_url'][0]) && !empty($meta['_video_url'][0]) ) {
          global $wp_embed;
          $video = $wp_embed->run_shortcode('[embed]'.$meta['_video_url'][0].'[/embed]');
          echo $video;
        }
      ?>
    </div>
<?php endif; ?>

<?php if ( has_post_format( 'quote' ) ): // Quote @fromfull ?>
    <div class="post-format">
      <div class="format-container hu-pad">
        <i class="fas fa-quote-right"></i>
        <blockquote><?php echo isset($meta['_quote'][0])?wpautop($meta['_quote'][0]):''; ?></blockquote>
        <p class="quote-author"><?php echo (isset($meta['_quote_author'][0])?'&mdash; '.$meta['_quote_author'][0]:''); ?></p>
      </div>
    </div>
<?php endif; ?>

<?php if ( has_post_format( 'chat' ) ): // Chat @fromfull?>
  	<div class="post-format">
      <div class="format-container hu-pad">
        <i class="far fa-comments"></i>
        <blockquote>
          <?php echo (isset($meta['_chat'][0])?wpautop($meta['_chat'][0]):''); ?>
        </blockquote>
      </div>
    </div>
<?php endif; ?>

<?php if ( has_post_format( 'link' ) ): // Link @fromfull ?>
  	<div class="post-format">
      <div class="format-container hu-pad">
        <p><a href="<?php echo (isset($meta['_link_url'][0])?$meta['_link_url'][0]:'#'); ?>">
          <i class="fas fa-link"></i>
          <?php echo (isset($meta['_link_title'][0])?$meta['_link_title'][0]:get_the_title()); ?> &rarr;
        </a></p>
      </div>
    </div>
<?php endif; ?>
