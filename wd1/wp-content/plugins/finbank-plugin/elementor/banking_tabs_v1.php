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
class Banking_Tabs_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_banking_tabs_v1';
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
		return esc_html__( 'Banking Tabs V1', 'finbank' );
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
			'banking_tabs_v1',
			[
				'label' => esc_html__( 'Banking Tabs V1', 'finbank' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Chat Icon Url', 'finbank' ),
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
		   'features_tab', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Individuals', 'finbank')],
						['btn_title' => esc_html__('Companies', 'finbank')]
					],
				'fields' => 
				[
					
					[
						'name' => 'btn_sub_title',
						'label' => esc_html__('Tab Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'text_limit',
						'label'   => esc_html__( 'Number of Text', 'finbank' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_number',
						'label'   => esc_html__( 'Number of post', 'finbank' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_orderby',
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
					],
					[
						'name' => 'query_order',
						'label'   => esc_html__( 'Order', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'DESC',
						'options' => array(
							'DESC' => esc_html__( 'DESC', 'finbank' ),
							'ASC'  => esc_html__( 'ASC', 'finbank' ),
						),
					],
					[
					  'name' => 'query_category',
					  'type' => Controls_Manager::SELECT,
					  'label' => esc_html__('Category', 'finbank'),
					  'label_block' => true,
					  'options' => get_service_categories()
					],
				],
				'title_field' => '{{btn_title}}',
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
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link2',
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
	?>
    
    <!--Start Service Style1 Area-->
    <section class="service-style1-area" id="services">
        <?php if($settings['bg_image']['id']){ ?>
        <div class="service-style1-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="service-style1-title">
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
                        <?php if($settings['btn_link']['url']) { ?>
                        <div class="get-assistant-box">
                            <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><span class="icon-chatting"></span></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="service-style1-tab">
                        <!--Start Service Style1 Tab Button-->
                        <div class="service-style1-tab__button">
                            <ul class="tabs-button-box clearfix">
                                <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                                <li data-tab="#<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 2) echo 'active-btn-item' ?>">
                                    <?php if($item['btn_sub_title'] || $item['btn_title']) { ?>
                                    <div class="inner">
                                        <div class="left">
                                            <h4><?php echo wp_kses($item['btn_sub_title'], true); ?></h4>
                                            <h3><?php echo wp_kses($item['btn_title'], true); ?></h3>
                                        </div>
                                        <div class="right">
                                            <span class="icon-down-arrow"></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </li>
                                <?php $count++; endforeach; ?>
                            </ul>
                        </div>
                        <!--End Service Style1 Tab Button-->

                        <!--Start Tabs Content Box-->
                        <div class="tabs-content-box">
							<?php $count = 1; foreach($settings['features_tab'] as $keys => $item): 
								$paged = finbank_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
						
								$this->add_render_attribute( 'wrapper', 'class', 'templatepath-finbank' );
								$args = array(
									'post_type'      => 'service',
									'posts_per_page' => finbank_set( $item, 'query_number' ),
									'orderby'        => finbank_set( $item, 'query_orderby' ),
									'order'          => finbank_set( $item, 'query_order' ),
									'text_limit'     => finbank_set( $item, 'text_limit' ),
									'paged'         => $paged
								);
								
								if( finbank_set( $item, 'query_category' ) ) $args['service_cat'] = finbank_set( $item, 'query_category' );
								$query = new \WP_Query( $args );
								if ( $query->have_posts()):	
							?>
                            <!--Tab-->
                            <div class="tab-content-box-item <?php if($count == 2) echo 'tab-content-box-item-active';?>" id="<?php echo esc_attr($count);?>">
                                <div class="service-style1-tab-content-box-item">
                                    <div class="row">
                                        <?php 
											while ( $query->have_posts() ) : $query->the_post();
										?> 
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", get_post_meta(get_the_id(), 'service_icon', true )), true); ?>"></span>
                                                </div>
                                                <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><?php the_title(); ?></a></h3>
                                                <div class="border-box"></div>
                                                <p><?php echo wp_kses(finbank_trim(get_the_content(), $item['text_limit']), true); ?></p>
                                                <h6><?php echo (get_post_meta( get_the_id(), 'description', true ));?></h6>
                                                <div class="btn-box">
                                                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                        <?php endwhile;?>
                                    </div>
                                </div>
                            </div>
							<?php endif;?>
                            <?php $count++; endforeach; ?>
                        </div>
                        <!--End Tabs Content Box-->

                    </div>
                </div>
            </div>
			<?php if($settings['btn_link2']['url']){ ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="service-style1__btns-box text-center">
                        <a class="btn-one" href="<?php echo esc_url($settings['btn_link2']['url']); ?>">
                            <span class="txt"><?php echo wp_kses($settings['btn_title'], true); ?></span>
                        </a>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </section>
    <!--End Service Style1 Area-->
    
	<?php 
	}
}
