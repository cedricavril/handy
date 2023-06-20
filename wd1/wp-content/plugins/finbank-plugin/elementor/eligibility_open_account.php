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
class Eligibility_Open_Account extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_eligibility_open_account';
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
        return esc_html__( 'Eligibility Open Account', 'finbank' );
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
            'eligibility_open_account',
            [
                'label' => esc_html__( 'Eligibility Open Account', 'finbank' ),
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
			'image',
			[
				'label' => __( 'Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Nationality', 'finbank')],
						['block_title' => esc_html__('Age', 'finbank')],
						['block_title' => esc_html__('Nationality', 'finbank')],
						['block_title' => esc_html__('Age', 'finbank')]
					],
				'fields' => 
				[
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
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'count_title',
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
			'counter_start',
			[
				'label'       => __( 'Start Value', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Start Value', 'finbank' ),
			]
		);
		$this->add_control(
			'counter_stop',
			[
				'label'       => __( 'Stop Value', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Stop Value', 'finbank' ),
			]
		);
		$this->add_control(
			'alphabet_letter',
			[
				'label'       => __( 'Alphabet Letter', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Alphabet Letter', 'finbank' ),
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
	
    <!--Start Eligibility Area-->
    <section id="eligibility" class="eligibility-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="eligibility-img-box">
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
                        <?php if($settings['image']['id']) { ?>
                        <div class="eligibility-img-box__inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="eligibility-content-box">
                        <div class="eligibility-content-box__inner">
                            <ul>
                                <?php $i=1; foreach($settings['features'] as $key => $item): ?>
                                <li>
                                    <div class="inner">
                                        <div class="counting"><?php echo wp_kses(sprintf('%2d', $i), true); ?></div>
                                        <div class="text">
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true);?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                        </div>

                        <div class="facts-box-style2">
                            <?php if($settings['alphabet_letter'] || $settings['counter_stop']) { ?>
                            <div class="counting">
                                <h2 class="odometer" data-count="<?php echo esc_attr($settings['counter_stop']);?>"><?php echo esc_attr($settings['counter_start']);?></h2>
                                <span class="k"><?php echo esc_attr($settings['alphabet_letter']);?></span>
                            </div>
                            <?php } ?>
                            <?php if($settings['count_title']) { ?>
                            <div class="inner-title">
                                <h3><?php echo wp_kses($settings['count_title'], true);?></h3>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Eligibility Area-->
        
        <?php
    }
}
