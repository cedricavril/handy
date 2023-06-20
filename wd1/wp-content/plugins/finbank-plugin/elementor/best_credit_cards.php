<?php namespace FINBANKPLUGIN\Element;

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
class Best_Credit_Cards extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_best_credit_cards';
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
        return esc_html__( 'Best Credit Cards', 'finbank' );
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
            'best_credit_cards',
            [
                'label' => esc_html__( 'Best Credit Cards', 'finbank' ),
            ]
        );
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => finbank_get_sidebars(),
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
             'info_cards', 
		 	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Platinum Credit Card', 'finbank')],
						['block_title' => esc_html__('Millinnia Credit Card', 'finbank')],
						['block_title' => esc_html__('Money Back Credit Card', 'finbank')],
						['block_title' => esc_html__('Easy EMI Credit Card', 'finbank')],
						['block_title' => esc_html__('Diners Club Privilege Card', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'block_cate',
						'label' => esc_html__('Category', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('List Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'bg_image',
						'label' => esc_html__('Slide BG Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Apply Now', 'finbank')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'finbank')
					],
					[
						'name' => 'btn_link2',
						'label' => __( 'Button Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
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
	
    <!--Start Cards Area-->
    <section class="cards-area">
        <div class="container">
            <div class="row">
				<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <div class="col-xl-3">
                    <div class="sidebar-box-style1">
                        <!--Start Single Sidebar Box Style1-->
                        <div class="single-sidebar-box-style1 margintop">
                            <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                        </div>
                        <!--End Single Sidebar Box Style1-->
                    </div>
                </div>
				<?php endif; ?>
                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-xl-9 col-md-12 col-sm-12 '; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div class="cards-content-box">
						<?php if($settings['title']) { ?>
                        <div class="cards-content-box-top">
                            <div class="left-box">
                                <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            </div>
                        </div>
						<?php } ?>
                        <?php foreach($settings['info_cards'] as $key => $item): ?>
                        <!--Start Single Card Box-->
                        <div class="single-card-box">
                            <?php if($item['block_cate']) { ?><div class="category-box"><?php echo wp_kses($item['block_cate'], true);?></div><?php } ?>
                            <div class="cards-img-box">
                                <?php if($item['block_title']) { ?>
                                <div class="inner-title">
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                </div>
                                <?php } ?>
                                <?php if($item['bg_image']['id']) { ?>
                                <div class="inner">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                </div>
                                <?php } ?>
                                <div class="btn-box">
                                    <?php if($item['btn_title'] || $item['btn_link']['url']){ ?>
                                    <a class="btn-one style2" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                        <span class="txt"><?php echo wp_kses($item['btn_title'], true); ?></span>
                                    </a>
                                    <?php } ?>
                                    <?php if($item['btn_title2'] || $item['btn_link2']['url']){ ?>
                                    <a class="btn-one" href="<?php echo esc_url($item['btn_link2']['url']); ?>">
                                        <span class="txt"><?php echo wp_kses($item['btn_title2'], true); ?></span>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="cards-text-box">
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                                <h3><?php echo wp_kses($item['block_title2'], true);?></h3>
                                <?php $features_list = $item['features_list'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); 
								?>
								<ul>
									<?php foreach($features_list as $features): ?>
									   <li><?php echo wp_kses($features, true); ?></li>
									<?php endforeach; ?>
								</ul>
								<?php } ?>
                            </div>
                        </div>
                        <!--End Single Card Box-->
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Cards Area-->
                         
        <?php
    }
}


