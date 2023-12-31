<div id="secondary" class="grid_5 widget-area" role="complementary">
  <div id="sidebar">
  
	<?php 
    if ( ! dynamic_sidebar( 'contango-primary-sidebar' ) ):
    $contango_theme_data = contango_theme_data();
    ?>
    
    <aside class="widget widget_search widget-widget_search">
      <div class="widget-wrap widget-inside">
        <?php get_search_form(); ?>
      </div>
    </aside>
    
    <aside class="widget widget_pages widget-widget_pages">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Pages', 'contango' ); ?></h3>
          <ul><?php wp_list_pages( 'title_li=' ); ?></ul>
      </div>
    </aside>
    
    <aside class="widget widget_categories widget-widget_categories">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Categories', 'contango' ); ?></h3>
          <ul><?php wp_list_categories('title_li='); ?></ul>
      </div>
    </aside>
    
    <aside class="widget widget_archive widget-widget_archive">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Archives', 'contango' ); ?></h3>
          <ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
      </div>
    </aside>
    
    <aside class="widget widget_calendar widget-widget_calendar">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Calendar', 'contango' ); ?></h3>
        <?php get_calendar(); ?>
      </div>
    </aside>
    
    <aside class="widget widget_recent_entries widget-widget_recent_entries">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Recent Posts', 'contango' ); ?></h3>
          <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
      </div>
    </aside>
    
    <aside class="widget widget_tag_cloud widget-widget_tag_cloud">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Tag Cloud', 'contango' ); ?></h3>
        <?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
      </div>
    </aside>
    
    <aside class="widget widget_text widget-widget_text">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'About Contango', 'contango' ); ?></h3>
        <div class="textwidget"><?php printf( __( '%s', 'contango' ), $contango_theme_data['Description'] ); ?></div>
      </div>
    </aside>
    
    <aside class="widget widget_meta widget-widget_meta">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Meta', 'contango' ); ?></h3>
          <ul>
            <?php wp_register(); ?>
            <li><?php wp_loginout(); ?></li>
            <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
            <?php wp_meta(); ?>
          </ul>
      </div>
    </aside>
    
    <?php endif; ?>
  
  </div> <!-- end #sidebar -->
</div>  <!-- end .grid_5 -->