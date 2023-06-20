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
class List_View_News extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_list_view_news';
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
		return esc_html__( 'List View News', 'finbank' );
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
			'list_view_news',
			[
				'label' => esc_html__( 'List View News', 'finbank' ),
			]
		);
		$this->add_control(
			'show_sidebar',
			[
				'label'       => __( 'Enable/Disable Sidebar', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'condition' => [
					'show_sidebar' => 'yes',
				],
				'options'  => finbank_get_sidebars(),
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			  'options' => get_blog_categories()
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'post_type'      => 'post',
			'posts_per_page' => finbank_set( $settings, 'query_number' ),
			'orderby'        => finbank_set( $settings, 'query_orderby' ),
			'order'          => finbank_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( finbank_set( $settings, 'query_category' ) ) $args['category_name'] = finbank_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
	?>
	
    <!--Start Blog Page Three-->
    <section class="blog-page-three">
        <div class="container">
            <div class="row">
                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-xl-9 col-md-12 col-sm-12 '; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div class="blog-page-content-box">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <!--Start Single blog Style3-->
                        <div class="single-blog-style1 single-blog-style1--style3">
                            <div class="image-colum">
                                <div class="img-holder">
                                    <?php if(has_post_thumbnail()){ ?>
                                    <div class="inner">
                                        <?php the_post_thumbnail('finbank_350x270'); ?>
                                        <div class="overlay-icon">
                                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                                <span class="icon-right-arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="category-date-box">
                                        <div class="category">
                                            <span class="icon-play-button-1"></span>
                                            <h5><?php the_category(' '); ?></h5>
                                        </div>
                                        <div class="date">
                                            <h5><?php echo wp_kses(get_the_date(), true); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-colum">
                                <div class="text-holder">
                                    <h3 class="blog-title">
                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="text">
                                        <p><?php echo wp_kses(finbank_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                    </div>
                                    <div class="bottom">
                                        <div class="meta-box">
                                            <ul class="meta-info">
                                                <li><span class="icon-clock"></span> <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo wp_kses(get_the_time(), true); ?> <?php esc_html_e('Read', 'finbank');?></a></li>
                                        		<li><span class="icon-comment"></span> <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'finbank'), true), wp_kses(__('1 Comment' , 'finbank'), true), wp_kses(__('% Comments' , 'finbank'), true)); ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="share-btn">
                                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span class="icon-share"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single blog Style3-->
                        <?php endwhile; ?>
                        <?php if($settings['show_pagination']):?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="styled-pagination clearfix">
                                    <?php finbank_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => 'Next <i class="fas fa-arrow-right right"></i>', 'prev_text' => '<i class="fas fa-arrow-left left"></i> Prev')); ?>
                                </div>
                            </div>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
                <?php if($settings['show_sidebar']):?>
				<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <!--Start Thm Sidebar Box-->
                <div class="col-xl-3 col-lg-7">
                    <div class="thm-sidebar-box">
                        <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                </div>
                <!--End Thm Sidebar Box-->
				<?php endif; endif; ?>
            </div>
        </div>
    </section>
    <!--End Blog Page Three-->
                
        <?php }
		wp_reset_postdata();
	}

}
