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
class Interesting_Numbers extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_interesting_numbers';
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
        return esc_html__( 'Interesting Numbers', 'finbank' );
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
            'interesting_numbers',
            [
                'label' => esc_html__( 'Interesting Numbers', 'finbank' ),
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
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Our Network', 'finbank')],
                			['block_title' => esc_html__('Customers', 'finbank')],
							['block_title' => esc_html__('Employee', 'finbank')],
							['block_title' => esc_html__('Loans Disbursed', 'finbank')]
            			],
            		'fields' => 
						[
							[
                    			'name' => 'icon_path',
                    			'label' => esc_html__('Icon', 'finbank'),
                    			'type' => Controls_Manager::TEXTAREA,
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
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'finbank')
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
	
    <!--Start Facts Area-->
    <section class="facts-area">
        <?php if($settings['bg_image']['id']){ ?>
        <div class="facts-area-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
        <?php } ?>
        <div class="container">
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
            <div class="row">
                <?php foreach($settings['funfact'] as $key => $item): ?>
                <!--Start Single Fact Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-fact-box">
                        <div class="icon">
                            <?php echo wp_kses($item['icon_path'], true);?>
                        </div>
                        <div class="text">
                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                        </div>
                    </div>
                </div>
                <!--End Single Fact Box-->
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--End Facts Area-->
      
                 
        <?php
    }
}
