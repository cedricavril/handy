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
class Our_Testimonial_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_our_testimonial_v2';
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
		return esc_html__( 'Our Testimonials V2', 'finbank' );
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
			'our_testimonial_v2',
			[
				'label' => esc_html__( 'Our Testimonials V2', 'finbank' ),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'finbank' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'finbank' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
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
			  'options' => get_testimonials_categories()
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
		
        $paged = finbank_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-finbank' );
		$args = array(
			'post_type'      => 'testimonials',
			'posts_per_page' => finbank_set( $settings, 'query_number' ),
			'orderby'        => finbank_set( $settings, 'query_orderby' ),
			'order'          => finbank_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( finbank_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = finbank_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
	
    <!--Start Testimonial Style2 Area-->
    <section class="testimonial-style2-area">
        <div class="container">
            <div class="row masonary-layout">
				<?php $count = 1; while ( $query->have_posts() ) : $query->the_post(); ?>
                <!--Start Single Testimonial Style2-->
                <div class="col-xl-6 col-lg-6">
                    <div class="single-testimonial-style2 <?php if( $count == 1 || $count == 4 || $count == 5 || $count == 8 ) echo "bg-white"; else echo "";?>">
                        <div class="top">
                            <div class="review-box">
                                <ul>
                                    <?php $rating = get_post_meta( get_the_id(), 'testimonial_rating', true );
										if(!empty($rating)){
										for ($x = 1; $x <= 5; $x++) {
											if($x <= $rating) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-half-alt"></i></li>';
										}
									} ?>
                                </ul>
                            </div>
                            <div class="date-box">
                                <p><?php echo wp_kses(get_the_date(), true); ?></p>
                            </div>
                        </div>
                        <div class="text-box">
                            <p><?php echo wp_kses(finbank_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                        </div>
                        <div class="customer-info">
                            <div class="img-box">
                                <?php the_post_thumbnail('finbank_50x50'); ?>
                            </div>
                            <div class="title-box">
                                <h3><?php the_title(); ?></h3>
                                <span><?php echo (get_post_meta( get_the_id(), 'author_designation', true ));?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Testimonial Style2-->
				<?php $count++; endwhile; ?>
            </div>
        </div>
    </section>
    <!--End Testimonial Style2 Area-->

        <?php }
		wp_reset_postdata();
	}

}
