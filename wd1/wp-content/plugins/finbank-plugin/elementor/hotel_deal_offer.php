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
class Hotel_Deal_Offer extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_hotel_deal_offer';
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
        return esc_html__( 'Hotel Deal Offer', 'finbank' );
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
            'hotel_deal_offer',
            [
                'label' => esc_html__( 'Hotel Deal Offer', 'finbank' ),
            ]
        );
		$this->add_control(
            'features', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Travel & Hotel Offers', 'finbank')],
						['block_title' => esc_html__('Buy a Mobile Phone', 'finbank')],
						['block_title' => esc_html__('Travel & Hotel Offers', 'finbank')],
						['block_title' => esc_html__('Buy a Mobile Phone', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'image',
						'label' => esc_html__('Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'finbank'),
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
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'finbank' ),
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
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
	
    <!--Start Deals Area-->
    <section class="deals-area">
        <div class="auto-container">
            <div class="deals-content-box">
                <div class="owl-carousel owl-theme thm-owl__carousel deals-carousel-one owl-nav-style-one"
                    data-owl-options='{
                    "loop": true,
                    "autoplay": true,
                    "margin": 50,
                    "nav": true,
                    "dots": false,
                    "smartSpeed": 500,
                    "autoplayTimeout": 10000,
                    "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                    "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 1
                            },
                            "992": {
                                "items": 1
                            },
                            "1550": {
                                "items": 1.4
                            }
                        }
                    }'>

					<?php foreach($settings['features'] as $key => $item): ?>
                    <!--Start Single Deals Box-->
                    <div class="single-deals-box">
                        <div class="text-box">
                            <div class="inner-title">
                                <h4><?php echo wp_kses($item['block_sub_title'], true);?></h4>
                                <h2><?php echo wp_kses($item['block_title'], true);?></h2>
                            </div>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
							<?php $features_list = $item['features_list'];
                                if(!empty($features_list)){
                                $features_list = explode("\n", ($features_list)); 
                            ?>
                            <ul>
                            <?php foreach($features_list as $features): ?>
                            <li>
                               <div class="inner">
                                    <div class="icon">
                                        <span class="icon-checkbox-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($features, true); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <?php if($item['btn_link']['url']) { ?>
                            <div class="btns-box">
                                <a class="btn-one" href="<?php echo esc_url( $item['btn_link']['url'] ); ?>">
                                    <span class="txt"><?php echo wp_kses( $item['btn_title'], true ); ?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($item['image']['id']) { ?>
                        <div class="img-box">
                            <div class="img-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>);"></div>
                            <div class="shape-left-1"></div>
                            <div class="shape-right-1"></div>
                            <div class="shape-right-2"></div>
                        </div>
                        <?php } ?>
                    </div>
                    <!--End Single Deals Box-->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!--End Deals Area-->       
             
        <?php
    }
}
