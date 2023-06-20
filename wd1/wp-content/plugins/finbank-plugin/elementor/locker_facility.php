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
class Locker_Facility extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_locker_facility';
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
        return esc_html__( 'Locker Facility', 'finbank' );
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
            'locker_facility',
            [
                'label' => esc_html__( 'Locker Facility', 'finbank' ),
            ]
        );
		$this->add_control(
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['list_title' => esc_html__('Item1', 'finbank')],
						['list_title' => esc_html__('Item2', 'finbank')],
						['list_title' => esc_html__('Item3', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'list_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style One', 'finbank' ),
							'two'  => esc_html__( 'Choose Style Two', 'finbank' ),
							'three'  => esc_html__( 'Choose Style Three', 'finbank' ),
						),
					],
				],
				'title_field' => '{{list_title}}',
			 ]
        );
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
				'default'     => __( 'Download', 'finbank' ),
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
			'text2',
			[
				'label'       => __( 'Description', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_title2',
			[
				'label'       => __( 'Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
				'default'     => __( 'Contact Us', 'finbank' ),
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
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
	
    <!--Start Locker Facility Area-->
    <section class="locker-facility-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="locker-facility-highlights">
                        <?php foreach($settings['features'] as $key => $item): ?>
                        <div class="single-box <?php if($item['style_two'] == 'three') echo 'three'; elseif($item['style_two'] == 'two') echo 'two'; else 'one'; ?>">
                            <div class="icon">
                                <span class="icon-checkbox-mark"></span>
                            </div>
                            <p><?php echo wp_kses($item['list_title'], true);?></p>
                        </div>
                        <?php endforeach; ?>
                        <div class="img-box">
                            <div class="inner">
                                <?php if($settings['about_image']['id']){ ?>
                                <img class="float-bob-y" src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                <div class="icon">
                                    <span class="icon-protection"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span><span class="path7"></span><span
                                            class="path8"></span><span class="path9"></span><span
                                            class="path10"></span><span class="path11"></span><span
                                            class="path12"></span><span class="path13"></span><span
                                            class="path14"></span></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="locker-facility-text-box">
                        <?php if($settings['title']) { ?>
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                        </div>
                        <?php } ?>
                        <?php if($settings['text']) { ?>
                        <div class="text-box">
                            <p><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
                        <?php } ?>
                        <?php if($settings['btn_link']['url']) { ?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']);?>">
                                <span class="txt"><?php echo wp_kses($settings['btn_title'], true);?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if($settings['btn_link2']['url'] || $settings['text2']) { ?>
                        <div class="faq-question-btn">
                            <div class="icon">
                                <span class="icon-faq"></span>
                            </div>
                            <p><?php echo wp_kses($settings['text2'], true);?></p>
                            <a href="<?php echo esc_url($settings['btn_link2']['url']);?>"><span class="icon-right-arrow"></span><?php echo wp_kses($settings['btn_title2'], true);?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Locker Facility Area-->
             
        <?php
    }
}
