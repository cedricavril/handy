<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <div class="entry-meta-group clearfix">
    
    <div class="grid_2 alpha">
      <?php echo contango_post_date(); ?>
    </div>
    
    <div class="grid_8 omega">
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="entry-meta">    
		  <?php echo contango_post_author() . contango_post_comments() . contango_post_format() . contango_post_edit_link(); ?>
      </div><!-- .entry-meta -->
    </div>
  
  </div>
  
  <div class="entry-content clearfix">	
	 <?php the_content(); ?>
  </div>
  
</article>