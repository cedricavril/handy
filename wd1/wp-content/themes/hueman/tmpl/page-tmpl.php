<?php while ( have_posts() ): the_post(); ?>

  <article <?php post_class('group'); ?>>

    <?php if ( hu_is_checked( 'singular-page-featured-image' ) ) { hu_get_template_part('parts/page-image'); } ?>

    <div class="entry themeform">
      <?php the_content(); ?>
      <nav class="pagination group">
        <?php
          //Checks for and uses wp_pagenavi to display page navigation for multi-page posts.
          if ( function_exists('wp_pagenavi') )
            wp_pagenavi( array( 'type' => 'multipart' ) );
          else
            wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','hueman'),'after'=>'</div>'));
        ?>
      </nav><!--/.pagination-->
      <div class="clear"></div>
    </div><!--/.entry-->

  </article>

  <?php if ( hu_is_checked('page-comments') ) { comments_template('/comments.php',true); } ?>

<?php endwhile; ?>