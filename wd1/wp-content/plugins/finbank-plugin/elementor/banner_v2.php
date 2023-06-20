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
class Banner_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_banner_v2';
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
        return esc_html__( 'Banner V2', 'finbank' );
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
            'banner_v2',
            [
                'label' => esc_html__( 'Banner V2', 'finbank' ),
            ]
        );
		$this->add_control(
            'slides', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('Providing<br> the best future<br> for your best <br> living.', 'finbank')],
						['title' => esc_html__('Prestige bank<br> makes access to<br> savings fast & <br> simple.', 'finbank')],
						['title' => esc_html__('Bank with<br> the happiest<br> employees in the <br> country.', 'finbank')],
					],
				'fields' => 
				[
					[
						'name' => 'bg_image',
						'label' => esc_html__('Slide BG Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'finbank')
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
						'name' => 'btn_title_1',
						'label' => esc_html__('Button Title 1', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'finbank')
					],
					[
						'name' => 'btn_link_1',
						'label' => __( 'Button Link 1', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'text2',
						'label' => esc_html__('Text', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'icon_text',
						'label' => esc_html__('Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'icon_text2',
						'label' => esc_html__('Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{title}}',
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
	
    <!--Main Slider Start-->
    <section class="main-slider main-slider-style2" id="home">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
            },
            "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
            "delay": 5000
            }}'>
            <div class="swiper-wrapper">
				<?php foreach($settings['slides'] as $key => $item): ?>
                <!--Start Single Swiper Slide-->
                <div class="swiper-slide">
                    <div class="content-layer">
                        <div class="main-slider-content">
                            <div class="main-slider-content__inner">
                                <div class="big-title">
                                    <h2><?php echo wp_kses($item['title'], true); ?></h2>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses($item['text'], true); ?></p>
                                </div>
                                <?php if($item['btn_link']['url'] || $item['btn_link_1']['url']){ ?>
                                <div class="btns-box">
                                    <?php if($item['btn_link']['url']){ ?>
                                    <a class="btn-one" href="<?php echo esc_url($item['btn_link']['url']); ?>">
                                        <span class="txt"><?php echo wp_kses($item['btn_title'], true); ?></span>
                                    </a>
                                    <?php } ?>
                                    <?php if($item['btn_link_1']['url']){ ?>
                                    <a class="btn-one style2" href="<?php echo esc_url($item['btn_link_1']['url']); ?>">
                                        <span class="txt"><?php echo wp_kses($item['btn_title_1'], true); ?></span>
                                    </a>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <div class="bottom-text">
                                    <p><?php echo wp_kses($item['text2'], true); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($item['bg_image']['id']){ ?>
                    <div class="image-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>);">
                    <?php } ?>
                        <?php if($item['icon_text']){ ?>
                        <!--Start Slide Single Features-->
                        <div class="slide-single-features one">
                            <span class="icon-accept"></span>
                            <h3><?php echo wp_kses($item['icon_text'], true); ?></h3>
                        </div>
                        <!--End Slide Single Features-->
                        <?php } ?>
                        <?php if($item['icon_text2']){ ?>
                        <!--Start Slide Single Features-->
                        <div class="slide-single-features two">
                            <span class="icon-accept"></span>
                            <h3><?php echo wp_kses($item['icon_text2'], true); ?> </h3>
                        </div>
                        <!--End Slide Single Features-->
                        <?php } ?>
                    </div>
                </div>
                <!--End Single Swiper Slide-->
				<?php endforeach; ?>
                <!-- If we need navigation buttons -->
                <div class="main-slider__nav main-slider__nav--style2">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <i class="icon-chevron left"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <i class="icon-chevron right"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Main Slider End-->        
        
        <?php
    }
}
