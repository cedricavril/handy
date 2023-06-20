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
class Account_Charges extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_account_charges';
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
        return esc_html__( 'Account Charges', 'finbank' );
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
            'account_charges',
            [
                'label' => esc_html__( 'Account Charges', 'finbank' ),
            ]
        );
		$this->add_control(
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
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
						['block_title' => esc_html__('Account Interest Rates<br> Per Annum', 'finbank')],						
						['block_title' => esc_html__('Debit Card', 'finbank')],
						['block_title' => esc_html__('Credit Card', 'finbank')]
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
						'name' => 'block_title2',
						'label' => esc_html__('Balance Title', 'finbank'),
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
						'name' => 'block_title3',
						'label' => esc_html__('Interest Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'features_list2',
						'label' => esc_html__('Feature List', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
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
	
    <!--Start Interest Charges Area-->
    <section id="interest" class="interest-charges-area">
        <?php if($settings['pattern_image']['id']){ ?>
        <div class="interest-charges-area-shape1">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
        </div>
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
                <div class="col-xl-12">
                    <div class="interest-charges-table-box">
                        <div class="table-outer">
                            <table class="interest-charges-table">
                                <tbody>
									<?php foreach($settings['features'] as $key => $item): ?>
                                    <tr>
                                        <?php if($item['block_title']) { ?>
                                        <td class="title">
                                            <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                        </td>
                                        <?php } ?>
                                        <td class="balance">
                                            <?php if($item['block_title2']) { ?>
                                            <div class="inner-title">
                                                <h3><?php echo wp_kses($item['block_title2'], true);?></h3>
                                            </div>
                                            <?php } ?>
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
                                        </td>
                                        <td class="interest">
                                            <?php if($item['block_title3']) { ?>
                                            <div class="inner-title">
                                                <h3><?php echo wp_kses($item['block_title3'], true);?></h3>
                                            </div>
                                            <?php } ?>
                                            <?php $features_list = $item['features_list2'];
												if(!empty($features_list)){
												$features_list = explode("\n", ($features_list)); 
											?>
											<ul>
												<?php foreach($features_list as $features): ?>
												   <li><?php echo wp_kses($features, true); ?></li>
												<?php endforeach; ?>
											</ul>
											<?php } ?>
                                        </td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Interest Charges Area-->
        
        <?php
    }
}
