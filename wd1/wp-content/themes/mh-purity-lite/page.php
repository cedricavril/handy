<?php get_header(); ?>
<div class="wrapper mh-clearfix">
    <div class="content <?php mh_content_class(); ?>">
	    <?php while (have_posts()) : the_post(); ?>
    		<?php mh_before_page_content(); ?>
			<div <?php post_class(); ?>>
	       		<div class="entry mh-clearfix">
	        		<?php the_content(); ?>
				</div>
	    	</div>
	    	<?php comments_template(); ?>
		<?php endwhile; ?>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>