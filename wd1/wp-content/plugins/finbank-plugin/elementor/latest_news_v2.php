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
class Latest_News_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_latest_news_v2';
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
		return esc_html__( 'Latest News V2', 'finbank' );
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
			'latest_news_v2',
			[
				'label' => esc_html__( 'Latest News V2', 'finbank' ),
			]
		);
		$this->add_control(
			'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style Home Three', 'finbank' ),
					'two' => esc_html__( 'Choose Style Home Onepage One', 'finbank' ),
				),
			]
		);
		$this->add_control(
			'show_pattern_images',
			[
				'label'       => __( 'Enable/Disable Pattern', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'finbank' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
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
			'show_subscribe_box',
			[
				'label'       => __( 'Enable/Disable Subscribe Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'icon_image',
			[
				'label' => __( 'Icon Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Form Title', 'finbank' ),
			]
		);
		$this->add_control(
			'mailchimp_form_url',
			[
				'label'       => __( 'Mailchimp Form Url', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Mailchimp Form Url', 'finbank' ),
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
	
    <!--Start Blog Style2 Area-->
    <section class="blog-style2-area <?php if($settings['style_two'] == 'two') echo 'pdb60'; else echo ''; ?>" id="news">
        <?php if($settings['show_pattern_images']):?>
        <div class="blog-style2-area__shape1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/blog-style2-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>"></div>
        <div class="blog-style2-area__shape2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/blog-style2-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>"></div>
        <?php endif; ?>
        <div class="container">
            <?php if($settings['style_two'] =='two'):?>
			<?php if($settings['title'] || $settings['text']) { ?>
            <div class="sec-title text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
				<?php if($settings['text']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            
            <?php else:?>
            
            <div class="blog-style2-area__top">
                <?php if($settings['title'] || $settings['text']) { ?>
                <div class="sec-title">
                    <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                	<?php if($settings['text']) { ?>
                    <div class="sub-title">
                        <p><?php echo wp_kses($settings['text'], true);?></p>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if($settings['btn_title'] || $settings['btn_link']['url']) { ?>
                <div class="btns-box">
                    <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                        <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php endif; ?>
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <!--Start Single blog Style2-->
                <div class="col-xl-6">
                    <div class="single-blog-style1 single-blog-style1--style2">
                        <div class="img-holder">
                            <?php if(has_post_thumbnail()){ ?>
                            <div class="inner">
                                <?php the_post_thumbnail('finbank_540x330'); ?>
                                <div class="overlay-icon">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                        <span class="icon-right-arrow"></span>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="category-date-box">
                                <?php if(has_category()){ ?>
                                <div class="category">
                                    <span class="icon-play-button-1"></span>
                                    <h5><?php the_category(' '); ?></h5>
                                </div>
                                <?php } ?>
                                <div class="date">
                                    <h5><?php echo wp_kses(get_the_date(), true); ?></h5>
                                </div>
                                <div class="author">
                                    <h5><?php esc_html_e('By', 'finbank'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3 class="blog-title">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="bottom">
                                <div class="read-more-btn">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span class="icon-right-arrow"></span><?php esc_html_e('Read More', 'finbank'); ?></a>
                                </div>
                                <div class="meta-box">
                                    <ul class="meta-info">
                                        <li><span class="icon-clock"></span> <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo wp_kses(get_the_time(), true); ?> <?php esc_html_e('Read', 'finbank');?></a></li>
                                        <li><span class="icon-comment"></span> <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'finbank'), true), wp_kses(__('1 Comment' , 'finbank'), true), wp_kses(__('% Comments' , 'finbank'), true)); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single blog Style2-->
				<?php endwhile; ?>
            </div>
			<?php if($settings['show_subscribe_box']):?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="subscribe-box-style1 subscribe-box-style1--style2">
                        <?php if($settings['icon_image']['id']){ ?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <?php } ?>
                        <?php if($settings['form_title']){ ?>
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['form_title'], true);?></h3>
                        </div>
                        <?php } ?>
                        <?php if($settings['mailchimp_form_url']) { ?>
                        <div class="subscribe-form-style1">
                            <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			<?php endif; ?>
        </div>
    </section>
    <!--End Blog Style2 Area-->
                    
        <?php }
		wp_reset_postdata();
	}

}
