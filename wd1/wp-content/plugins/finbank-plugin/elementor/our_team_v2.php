<?php
namespace FINBANKPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;
/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Our_Team_v2 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_our_team_v2';
	}
	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Our Team V2', 'finbank' );
	}
	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-library-open';
	}
	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'finbank' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'our_team_v2',
			[
				'label' => esc_html__( 'Our Team V2', 'finbank' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'finbank' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'finbank' ),
					'title'      => esc_html__( 'Title', 'finbank' ),
					'menu_order' => esc_html__( 'Menu Order', 'finbank' ),
					'rand'       => esc_html__( 'Random', 'finbank' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'finbank' ),
					'ASC'  => esc_html__( 'ASC', 'finbank' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'finbank'),
				  'label_block' => true,
				  'options' => get_team_categories()
				]
		);
		$this->end_controls_section();
	}
	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = get_query_var('paged');
		$paged = finbank_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-finbank' );
		$args = array(
			'post_type'      =>  'team',
			'posts_per_page' => finbank_set( $settings, 'query_number' ),
			'orderby'        => finbank_set( $settings, 'query_orderby' ),
			'order'          => finbank_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( finbank_set( $settings, 'query_category' ) ) $args['team_cat'] = finbank_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ ?>
        
        <!-- team-section -->
        <section class="team-section centred sec-pad pb-215">
            <div class="auto-container">
                <div class="four-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><a href="<?php echo (get_post_meta( get_the_id(), 'team_link', true ));?>"><?php the_post_thumbnail('finbank_270x270'); ?></a></figure>
                            <div class="lower-content">
                                 <?php
									$icons = get_post_meta( get_the_id(), 'social_profile', true );
									if ( ! empty( $icons ) ) :
								?>
								<ul class="social-links clearfix">		
								<?php
									foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( finbank_set( $h_icon, 'data' ) ) );
									if ( finbank_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', finbank_set( $header_social_icons, 'icon' ) );
									?>
									<li><a href="<?php echo esc_url(finbank_set( $header_social_icons, 'url' )); ?>" <?php if( finbank_set( $header_social_icons, 'background' ) || finbank_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(finbank_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(finbank_set( $header_social_icons, 'color' )); ?>"<?php endif;?> class="icon fab <?php echo esc_attr( finbank_set( $header_social_icons, 'icon' ) ); ?>"></a></li>
								<?php endforeach; ?>							
								</ul>
								<?php endif; ?>
                                <h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
                                <span class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                            </div>
                        </div>
                    </div>
                   <?php endwhile; ?> 
                </div>
            </div>
        </section>
        <!-- team-section end -->
        
         

              	
		<?php }
		wp_reset_postdata();
	}
}