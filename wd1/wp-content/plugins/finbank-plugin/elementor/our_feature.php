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
class Our_Feature extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_our_feature';
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
        return esc_html__( 'Our Feature', 'finbank' );
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
            'our_feature',
            [
                'label' => esc_html__( 'Our Feature', 'finbank' ),
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
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Fixed Returns with Peace of Mind', 'finbank')],
						['block_title' => esc_html__('Banking Solutions for a Business', 'finbank')],
						['block_title' => esc_html__('Our Strategies for Better Returns', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'icon_image',
						'label' => esc_html__('Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'pattern_image',
						'label' => esc_html__('Pattern Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'pattern_image2',
						'label' => esc_html__('Pattern Image Two', 'finbank'),
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
						'label_block' => true,
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
		
        <!--Start Features Style1 Area-->
        <section class="features-style1-area">
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
                <div class="features-style1-content">
                    <ul class="clearfix">
                        <?php $i=1; foreach($settings['features'] as $key => $item): ?>
                        <!--Start Single Features Style1 Box-->
                        <li>
                            <div class="single-features-style1-box">
                                <?php if($item['pattern_image']['id']){ ?>
                                <div class="shape-left">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['pattern_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                </div>
                                <?php } ?>
                                <?php if($item['pattern_image2']['id']){ ?>
                                <div class="shape-bottom">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['pattern_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                </div>
                                <?php } ?>
                                <?php if($item['icon_image']['id']){ ?>
                                <div class="counting-box">
                                    <div class="counting-box-bg"
                                        style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>);"></div>
                                    <h3><?php echo wp_kses(sprintf('%02d', $i), true); ?></h3>
                                </div>
                                <?php } ?>
                                <div class="text-box">
                                    <h4><?php echo wp_kses($item['block_sub_title'], true);?></h4>
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                    <?php if($item['btn_title'] || $item['btn_link']['url']) { ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"><?php echo wp_kses( $item['btn_title'], true ); ?><i class="fas fa-plus"></i></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                        <!--End Single Features Style1 Box-->
                        <?php $i++; endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Features Style1 Area-->      
             
        <?php
    }
}
