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
class Required_Documents extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_required_documents';
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
        return esc_html__( 'Required Documents', 'finbank' );
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
            'required_documents',
            [
                'label' => esc_html__( 'Required Documents', 'finbank' ),
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
			'title2',
			[
				'label'       => __( 'Left Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'title3',
			[
				'label'       => __( 'Left Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Non Resident', 'finbank')],
						['block_title' => esc_html__('For Resident', 'finbank')]
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
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'title4',
			[
				'label'       => __( 'Right Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'title5',
			[
				'label'       => __( 'Right Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
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
	
    <!--Start Documents Area-->
    <section id="required" class="documents-area">
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

                <div class="col-xl-3 col-lg-6">
                    <?php if($settings['title2']) { ?>
                    <!--Start Single Documents Box-->
                    <div class="single-documents-box">
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['title2'], true);?></h3>
                        </div>
                    </div>
                    <!--End Single Documents Box-->
                    <?php } ?>
                    <?php if($settings['title3']) { ?>
                    <!--Start Single Documents Box-->
                    <div class="single-documents-box">
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['title3'], true);?></h3>
                        </div>
                    </div>
                    <!--End Single Documents Box-->
                    <?php } ?>
                </div>
				<?php foreach($settings['features'] as $key => $item): ?>
                <div class="col-xl-3 col-lg-6">
                    <!--Start Single Documents Box-->
                    <div class="single-documents-box">
                        <div class="inner-title">
                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                        </div>
                        <?php 
							$features_list = $item['features_list'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
                        <ul>
                            <?php foreach($features_list as $features): ?>
                            <li><span class="icon-play-button-1"></span><?php echo wp_kses($features, true); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <!--End Single Documents Box-->
                </div>
                <?php endforeach; ?>
                <div class="col-xl-3 col-lg-6">
                    <?php if($settings['title4']) { ?>
                    <!--Start Single Documents Box-->
                    <div class="single-documents-box">
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['title4'], true);?></h3>
                        </div>
                    </div>
                    <!--End Single Documents Box-->
                    <?php } ?>
                    <?php if($settings['title5']) { ?>
                    <!--Start Single Documents Box-->
                    <div class="single-documents-box">
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['title5'], true);?></h3>
                        </div>
                    </div>
                    <!--End Single Documents Box-->
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>
    <!--End Documents Area-->   
             
        <?php
    }
}
