<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage FINBANK
 * @author     Theme Kalia
 * @version    1.0
 */

if (class_exists('Erdunt_Resizer')) {
    $img_obj = new Erdunt_Resizer();
} else {
    $img_obj = array();
}
$options = finbank_WSH()->option();
$allowed_tags = wp_kses_allowed_html('post');

global $post;
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);

?>


<div <?php post_class(); ?>>
	
	<!--Start Single blog Style2-->
    <div class="single-blog-style1 single-blog-style1--style2 blog-large">
        <?php if(has_post_thumbnail()){ ?>
        <div class="img-holder">
            
            <div class="inner">
                <?php the_post_thumbnail('full'); ?>
                <div class="overlay-icon">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                        <span class="icon-right-arrow"></span>
                    </a>
                </div>
            </div>
            <div class="category-date-box">
                <?php if(has_category()){ ?>
                <div class="category">
                    <span class="icon-play-button-1"></span>
                    <h5><?php the_category(' '); ?></h5>
                </div>
                <?php } ?>
				<?php if(! $options->get( 'blog_post_date' ) ){ ?>
                <div class="date">
                    <h5><?php echo wp_kses(get_the_date(), true); ?></h5>
                </div>
                <?php } ?>
                <?php if(! $options->get( 'blog_post_author' ) ){ ?>
                <div class="author">
                    <h5><?php esc_html_e('By', 'finbank'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></h5>
                </div>
                <?php } ?>
                <div class="share-btn">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span class="icon-share"></span></a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="text-holder">
            <h3 class="blog-title">
                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
            </h3>
            <div class="text">
            <?php the_excerpt(); ?>
            </div>
            <div class="bottom">
                <div class="read-more-btn">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                        <span class="icon-right-arrow"></span><?php esc_html_e('Continue Reading', 'finbank'); ?>
                    </a>
                </div>
                <div class="meta-box">
                    <ul class="meta-info">
                        <?php if(! $options->get( 'blog_post_date' ) ){ ?><li><span class="icon-clock"></span> <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo wp_kses(get_the_date(), true); ?></a></li><?php } ?>
                        <?php if(! $options->get( 'blog_post_comments' ) ){ ?><li><span class="icon-comment"></span> <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'finbank'), true), wp_kses(__('1 Comment' , 'finbank'), true), wp_kses(__('% Comments' , 'finbank'), true)); ?></a></li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Single blog Style2-->   
    
</div>