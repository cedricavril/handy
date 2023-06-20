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
class Statistics_Area_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_statistics_area_v2';
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
        return esc_html__( 'Statistics Area V2', 'finbank' );
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
            'statistics_area_v2',
            [
                'label' => esc_html__( 'Statistics Area V2', 'finbank' ),
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
			'title2',
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
			'image2',
			[
				'label' => __( 'Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
	
    <!--Start Statistics Area-->
    <section class="statistics-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="statistics-content-box">
                        <?php if($settings['title']) { ?>
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                        </div>
                        <?php } ?>
                        <?php if($settings['text']) { ?>
                        <div class="text">
                            <p><?php echo wp_kses($settings['text'], true);?></p>
                        </div>
                        <?php } ?>
                        <div class="download-box">
                            <?php if($settings['btn_title'] || $settings['title2']) { ?>
                            <div class="icon">
                                <span class="icon-pdf"></span>
                            </div>
                            <div class="title">
                                <?php if($settings['btn_title']) { ?>
                                <h5><a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><?php echo wp_kses( $settings['btn_title'], true ); ?></a></h5>
                                <?php } ?>
                                <?php if($settings['title2']) { ?><h3><?php echo wp_kses( $settings['title2'], true ); ?></h3><?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if($settings['image2']['id']) { ?>
                <div class="col-xl-6">
                    <div class="statistics-chart">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--End Statistics Area-->
        
        <?php
    }
}
