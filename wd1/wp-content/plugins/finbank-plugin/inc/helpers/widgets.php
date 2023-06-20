<?php
///----footer widgets Two---
//About Company
class Finbank_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_About_Company', /* Name */esc_html__('Finbank About Company','finbank'), array( 'description' => esc_html__('Show the About Company', 'finbank' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>
      		
        <div class="footer-top-style2__left-content">
            <!--Start Our Company Info-->
            <div class="our-company-info">
                <?php if($instance['widget_bg_img']){ ?>
                <div class="footer-logo-style1">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url($instance['widget_bg_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                    </a>
                </div>
                <?php } ?>
                <div class="bottom-text2">
                    <?php if($instance['content']){ ?><p><?php echo wp_kses_post($instance['content']); ?></p><?php } ?>
                    <?php if($instance['button_link'] and $instance['button_title']){ ?>
                    <div class="btn-box">
                        <a href="<?php echo esc_url($instance['button_link']); ?>"><span class="icon-right-arrow"></span> <?php echo wp_kses_post($instance['button_title']); ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!--End Our Company Info-->
        </div> 
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_bg_img'] = strip_tags($new_instance['widget_bg_img']);
		$instance['content'] = $new_instance['content'];
		$instance['button_title'] = $new_instance['button_title'];
		$instance['button_link'] = $new_instance['button_link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_bg_img = ($instance) ? esc_attr($instance['widget_bg_img']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$button_title = ($instance) ? esc_attr($instance['button_title']) : 'More About Us';
		$button_link = ($instance) ? esc_attr($instance['button_link']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>"><?php esc_html_e('Logo Image Url:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_bg_img')); ?>" type="text" value="<?php echo esc_attr($widget_bg_img); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'finbank'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button_title')); ?>"><?php esc_html_e('Button Title:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('conatct us', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('button_title')); ?>" name="<?php echo esc_attr($this->get_field_name('button_title')); ?>" type="text" value="<?php echo esc_attr($button_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button_link')); ?>"><?php esc_html_e('Button Link:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('button_link')); ?>" name="<?php echo esc_attr($this->get_field_name('button_link')); ?>" type="text" value="<?php echo esc_attr($button_link); ?>" />
        </p>             
                
		<?php 
	}
	
}

//Quick Contact
class Finbank_Quick_Contact extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_Quick_Contact', /* Name */esc_html__('Finbank Quick Contact','finbank'), array( 'description' => esc_html__('Show the Quick Contact', 'finbank' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="footer-top-style2__right-content">
                <div class="footer-contact-info-style">
                    <ul>
                        <?php if($instance['title'] || $instance['address']){ ?>
                        <li>
                            <div class="icon">
                                <span class="icon-map"></span>
                            </div>
                            <div class="text">
                                <?php if($instance['title']){ ?><h3><?php echo wp_kses_post($instance['title']); ?></h3><?php } ?>
                                <?php if($instance['address']){ ?><p><?php echo wp_kses_post($instance['address']); ?></p><?php } ?>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if($instance['title2'] || $instance['phone_no'] || $instance['email']){ ?>
                        <li>
                            <div class="icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="text">
                                <?php if($instance['title2']){ ?><h3><?php echo wp_kses_post($instance['title2']); ?></h3><?php } ?>
                                <?php if($instance['phone_no']){ ?><p><?php echo wp_kses_post($instance['phone_title']); ?> <a href="tel:<?php echo esc_attr($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></p><?php } ?>
                                <?php if($instance['email']){ ?><p><?php echo wp_kses_post($instance['email_title']); ?> <a href="mailto:<?php echo esc_attr($instance['email']); ?>"><?php echo wp_kses_post($instance['email']); ?></a><?php } ?>
                                </p>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>            
                <div class="find-nearest-branch-box">
                    <?php if($instance['no_branch']){ ?>
                    <div class="top-outer">
                        <div class="top">
                            <div class="icon">
                                <span class="icon-bank-1"></span>
                            </div>
                            <div class="inner-title">
                                <h3><?php echo wp_kses_post($instance['no_branch']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-box1">
                        <form class="zip-form" action="#">
                            <input id="zip" name="zip" type="number" placeholder="Enter Zip Code...">
                            <button type="submit">
                                <i class="icon-right-arrow"></i>Find
                            </button>
                        </form>
                    </div>
                </div>
            
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['title2'] = $new_instance['title2'];
		$instance['phone_title'] = $new_instance['phone_title'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_title'] = $new_instance['email_title'];
		$instance['email'] = $new_instance['email'];
		$instance['no_branch'] = $new_instance['no_branch'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title = ($instance) ? esc_attr($instance['title']) : 'Corporate Branch';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$title2 = ($instance) ? esc_attr($instance['title2']) : 'Help Desk';
		$phone_title = ($instance) ? esc_attr($instance['phone_title']) : 'Call to: ';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_title = ($instance) ? esc_attr($instance['email_title']) : 'Send a Mail: ';
		$email = ($instance) ? esc_attr($instance['email']) : '';
		$no_branch = ($instance) ? esc_attr($instance['no_branch']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Address Title:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Corporate Branch', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'finbank'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title2')); ?>"><?php esc_html_e('Title:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Help Desk', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title2')); ?>" name="<?php echo esc_attr($this->get_field_name('title2')); ?>" type="text" value="<?php echo esc_attr($title2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>"><?php esc_html_e('Phone Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>" type="text" value="<?php echo esc_attr($phone_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('+111-222-1234', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_title')); ?>"><?php esc_html_e('Email Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title')); ?>" name="<?php echo esc_attr($this->get_field_name('email_title')); ?>" type="text" value="<?php echo esc_attr($email_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email Address:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('no_branch')); ?>"><?php esc_html_e('No. of Branches:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('no_branch')); ?>" name="<?php echo esc_attr($this->get_field_name('no_branch')); ?>" type="text" value="<?php echo esc_attr($no_branch); ?>" />
        </p>
        
               
		<?php 
	}
	
}

///----footer widgets Three---
//About Company V2
class Finbank_About_Company_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_About_Company_V2', /* Name */esc_html__('Finbank About Company V2','finbank'), array( 'description' => esc_html__('Show the About Company V2', 'finbank' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>
      	
        <div class="our-company-info">
            <?php if($instance['widget_bg_img2']){ ?>
            <div class="footer-logo-style1">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url($instance['widget_bg_img2']); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                </a>
            </div>
            <?php } ?>
            <?php if($instance['content2']){ ?>
            <div class="bottom-text">
                <p><?php echo wp_kses_post($instance['content2']); ?></p>
            </div>
            <?php } ?>
            <?php if($instance['year']){ ?>
            <div class="footer-certificate-box">
                <div class="icon">
                    <span class="icon-certificate"></span>
                </div>
                <div class="title">
                    <h3><?php echo wp_kses_post($instance['year']); ?></h3>
                </div>
            </div>
            <?php } ?>
        </div> 
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_bg_img2'] = strip_tags($new_instance['widget_bg_img2']);
		$instance['content2'] = $new_instance['content2'];
		$instance['year'] = $new_instance['year'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_bg_img2 = ($instance) ? esc_attr($instance['widget_bg_img2']) : '';
		$content2 = ($instance) ? esc_attr($instance['content2']) : '';
		$year = ($instance) ? esc_attr($instance['year']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_bg_img2')); ?>"><?php esc_html_e('Logo Image Url:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_bg_img2')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_bg_img2')); ?>" type="text" value="<?php echo esc_attr($widget_bg_img2); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content2')); ?>"><?php esc_html_e('Content:', 'finbank'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content2')); ?>" name="<?php echo esc_attr($this->get_field_name('content2')); ?>" ><?php echo wp_kses_post($content2); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('year')); ?>"><?php esc_html_e('Banker Year:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Title', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('year')); ?>" name="<?php echo esc_attr($this->get_field_name('year')); ?>" type="text" value="<?php echo esc_attr($year); ?>" />
        </p>             
                
		<?php 
	}
	
}

//Quick Contact V2
class Finbank_Quick_Contact_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_Quick_Contact_V2', /* Name */esc_html__('Finbank Quick Contact V2','finbank'), array( 'description' => esc_html__('Show the Quick Contact V2', 'finbank' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="find-nearest-branch-box-style2">
                <?php if($instance['form_title'] || $instance['form_url']) {?>
                <div class="icon">
                    <span class="icon-map"></span>
                </div>
                <?php if($instance['form_title']) {?><h3><?php echo wp_kses_post($instance['form_title']); ?></h3><?php } ?>				
                <div id="nearest-branch-form" class="default-form2">
					<?php echo do_shortcode($instance['form_url']); ?>
                </div>
                <?php } ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['form_title'] = $new_instance['form_title'];
		$instance['form_url'] = $new_instance['form_url'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$form_title = ($instance) ? esc_attr($instance['form_title']) : '';
		$form_url = ($instance) ? esc_attr($instance['form_url']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_title')); ?>"><?php esc_html_e('Form Title:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Title', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_title')); ?>" name="<?php echo esc_attr($this->get_field_name('form_title')); ?>" type="text" value="<?php echo esc_attr($form_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url')); ?>"><?php esc_html_e('Form Url:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Url', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url')); ?>" type="text" value="<?php echo esc_attr($form_url); ?>" />
        </p>
               
		<?php 
	}
	
}

///----Service Sidebar widgets---
//Apply Credit Card
class Finbank_Apply_Credit_Card extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_Apply_Credit_Card', /* Name */esc_html__('Finbank Apply Credit Card','finbank'), array( 'description' => esc_html__('Show the Apply Credit Card', 'finbank' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <!--Start Sidebar Banner Box-->
            <div class="sidebar-banner-box">
                <div class="top-box float-bob-y"></div>
                <div class="bottom-box float-bob-x"></div>
                <?php if($instance['widget_bg_img3']){ ?>
                <div class="logo-box">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url($instance['widget_bg_img3']); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                    </a>
                </div>
                <?php } ?>
                <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                <?php $features_list = $instance['features_list'];
					if(!empty($features_list)){
					$features_list = explode("\n", ($features_list)); 
				?>
				<ul>
				<?php foreach($features_list as $features): ?>
				   <li><span class="icon-checkbox-mark"></span> <?php echo wp_kses($features, true); ?></li>
				<?php endforeach; ?>
				</ul>
				<?php } ?>
                <?php if($instance['button_link2'] and $instance['button_title2']){ ?>
                <div class="btns-box">
                    <a class="btn-one" href="<?php echo esc_url($instance['button_link2']); ?>">
                        <span class="txt"><?php echo wp_kses_post($instance['button_title2']); ?></span>
                    </a>
                </div>
                <?php } ?>
            </div>
            <!--End Sidebar Banner Box-->
            
                           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['widget_bg_img3'] = strip_tags($new_instance['widget_bg_img3']);
		$instance['title'] = $new_instance['title'];
		$instance['features_list'] = $new_instance['features_list'];
		$instance['button_title2'] = $new_instance['button_title2'];
		$instance['button_link2'] = $new_instance['button_link2'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$widget_bg_img3 = ($instance) ? esc_attr($instance['widget_bg_img3']) : '';
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$features_list = ($instance) ? esc_attr($instance['features_list']) : '';
		$button_title2 = ($instance) ? esc_attr($instance['button_title2']) : 'Apply Now';
		$button_link2 = ($instance) ? esc_attr($instance['button_link2']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_bg_img3')); ?>"><?php esc_html_e('Logo Image Url:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_bg_img3')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_bg_img3')); ?>" type="text" value="<?php echo esc_attr($widget_bg_img3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('features_list')); ?>"><?php esc_html_e('Feature List:', 'finbank'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('features_list')); ?>" name="<?php echo esc_attr($this->get_field_name('features_list')); ?>" ><?php echo wp_kses_post($features_list); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button_title2')); ?>"><?php esc_html_e('Button Title:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('conatct us', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('button_title2')); ?>" name="<?php echo esc_attr($this->get_field_name('button_title2')); ?>" type="text" value="<?php echo esc_attr($button_title2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button_link2')); ?>"><?php esc_html_e('Button Link:', 'finbank'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'finbank');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('button_link2')); ?>" name="<?php echo esc_attr($this->get_field_name('button_link2')); ?>" type="text" value="<?php echo esc_attr($button_link2); ?>" />
        </p>     
                
		<?php 
	}
	
}

///----Career Sidebar widgets---
//Upload Your Resume
class Finbank_Upload_Your_Resume extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_Upload_Your_Resume', /* Name */esc_html__('Finbank Upload Your Resume','finbank'), array( 'description' => esc_html__('Show the Upload Your Resume', 'finbank' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		<?php if($instance['upload_title']){ ?>
            <div class="inner-title">
                <h3><?php echo wp_kses_post($instance['upload_title']); ?></h3>
            </div>
            <?php } ?>
            <div class="resume-box__one">
                <ul>
                    <li>
                        <h5><?php echo wp_kses_post($instance['salary_title']); ?></h5>
                        <p><?php echo wp_kses_post($instance['salary']); ?></p>
                    </li>
                    <li>
                        <h5><?php echo wp_kses_post($instance['vacancy_title']); ?></h5>
                        <p><?php echo wp_kses_post($instance['vacancy']); ?></p>
                    </li>
                    <li>
                        <h5><?php echo wp_kses_post($instance['allowance_title']); ?></h5>
                        <p><?php echo wp_kses_post($instance['allowance']); ?></p>
                    </li>
                    <li>
                        <h5><?php echo wp_kses_post($instance['paid_title']); ?></h5>
                        <p><?php echo wp_kses_post($instance['leave']); ?></p>
                    </li>
                </ul>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['upload_title'] = $new_instance['upload_title'];
		$instance['salary_title'] = $new_instance['salary_title'];
		$instance['salary'] = $new_instance['salary'];
		$instance['vacancy_title'] = $new_instance['vacancy_title'];
		$instance['vacancy'] = $new_instance['vacancy'];
		$instance['allowance_title'] = $new_instance['allowance_title'];
		$instance['allowance'] = $new_instance['allowance'];
		$instance['paid_title'] = $new_instance['paid_title'];
		$instance['leave'] = $new_instance['leave'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$upload_title = ($instance) ? esc_attr($instance['upload_title']) : '';
		$salary_title = ($instance) ? esc_attr($instance['salary_title']) : '';
		$salary = ($instance) ? esc_attr($instance['salary']) : '';
		$vacancy_title = ($instance) ? esc_attr($instance['vacancy_title']) : '';
		$vacancy = ($instance) ? esc_attr($instance['vacancy']) : '';
		$allowance_title = ($instance) ? esc_attr($instance['allowance_title']) : '';
		$allowance = ($instance) ? esc_attr($instance['allowance']) : '';
		$paid_title = ($instance) ? esc_attr($instance['paid_title']) : '';
		$leave = ($instance) ? esc_attr($instance['leave']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('upload_title')); ?>"><?php esc_html_e('Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('upload_title')); ?>" name="<?php echo esc_attr($this->get_field_name('upload_title')); ?>" type="text" value="<?php echo esc_attr($upload_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('salary_title')); ?>"><?php esc_html_e('Salary Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('salary_title')); ?>" name="<?php echo esc_attr($this->get_field_name('salary_title')); ?>" type="text" value="<?php echo esc_attr($salary_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('salary')); ?>"><?php esc_html_e('Salary:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('salary')); ?>" name="<?php echo esc_attr($this->get_field_name('salary')); ?>" type="text" value="<?php echo esc_attr($salary); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vacancy_title')); ?>"><?php esc_html_e('Vacancy Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vacancy_title')); ?>" name="<?php echo esc_attr($this->get_field_name('vacancy_title')); ?>" type="text" value="<?php echo esc_attr($vacancy_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vacancy')); ?>"><?php esc_html_e('Vacancy:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vacancy')); ?>" name="<?php echo esc_attr($this->get_field_name('vacancy')); ?>" type="text" value="<?php echo esc_attr($vacancy); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('allowance_title')); ?>"><?php esc_html_e('Allowance Title:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('allowance_title')); ?>" name="<?php echo esc_attr($this->get_field_name('allowance_title')); ?>" type="text" value="<?php echo esc_attr($allowance_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('allowance')); ?>"><?php esc_html_e('Allowance:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('allowance')); ?>" name="<?php echo esc_attr($this->get_field_name('allowance')); ?>" type="text" value="<?php echo esc_attr($allowance); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('paid_title')); ?>"><?php esc_html_e('Paid:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('paid_title')); ?>" name="<?php echo esc_attr($this->get_field_name('paid_title')); ?>" type="text" value="<?php echo esc_attr($paid_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('leave')); ?>"><?php esc_html_e('Leave:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('leave')); ?>" name="<?php echo esc_attr($this->get_field_name('leave')); ?>" type="text" value="<?php echo esc_attr($leave); ?>" />
        </p>
               
		<?php 
	}
	
}

//Our Team
class Finbank_Our_Team extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Finbank_Our_Team', /* Name */esc_html__('Finbank Our Team','finbank'), array( 'description' => esc_html__('Show the Our Team', 'finbank' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="resume-box__two">
            <?php 
				$args = array('post_type' => 'team', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'team_cat','field' => 'id','terms' => (array)$instance['cat']));
				$this->posts($args);
			?>
        </div>
                
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 1;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'finbank'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'finbank'), 'selected'=>$cat, 'taxonomy' => 'team_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
        
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				while( $query->have_posts() ): $query->the_post(); 
			?>
            <div class="resume-box__two-shape-bg" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/resume-box__two-shape.png);"></div>
            <div class="img-box">
                <?php the_post_thumbnail('finbank_120x120'); ?>
            </div>
            <div class="text-box">
                <h3><?php the_title(); ?></h3>
                <p><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>
                <ul>
                    <li><?php esc_html_e('Call:', 'finbank'); ?> <a href="tel:<?php echo (get_post_meta( get_the_id(), 'team_phone', true ));?>"><?php echo (get_post_meta( get_the_id(), 'team_phone', true ));?></a></li>
                    <li><?php esc_html_e('Mail:', 'finbank'); ?> <a href="mailto:<?php echo (get_post_meta( get_the_id(), 'team_email', true ));?>"><?php echo (get_post_meta( get_the_id(), 'team_email', true ));?></a></li>
                </ul>
                <div class="resume-social-link-box">
                    <?php
						$icons = get_post_meta( get_the_id(), 'social_profile', true );
						if ( ! empty( $icons ) ) :
					?>
					<ul class="clearfix">
					<?php
						foreach ( $icons as $h_icon ) :
						$header_social_icons = json_decode( urldecode( finbank_set( $h_icon, 'data' ) ) );
						if ( finbank_set( $header_social_icons, 'enable' ) == '' ) {
							continue;
						}
						$icon_class = explode( '-', finbank_set( $header_social_icons, 'icon' ) );
						?>
						<li><a href="<?php echo esc_url(finbank_set( $header_social_icons, 'url' )); ?>" <?php if( finbank_set( $header_social_icons, 'background' ) || finbank_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(finbank_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(finbank_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( finbank_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
					<?php endforeach; ?>
					</ul>
					<?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

///----Blog widgets---
//Popular Post
class Finbank_Popular_Post extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Finbank_Popular_Post', /* Name */esc_html__('Finbank Blog Popular Post', 'finbank'), array( 'description' => esc_html__('Show the Blog Popular Post', 'finbank')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>
		
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <div class="sidebar-blog-post">
            <div class="owl-carousel owl-theme thm-owl__carousel sidebar-blog-carousel owl-nav-style-one"
                data-owl-options='{
                "loop": true,
                "autoplay": true,
                "margin": 0,
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
                        "1200": {
                            "items": 1
                        }
                    }
                }'>
        		<?php $query_string = array('showposts'=>$instance['number']);
					if ($instance['cat']) {
						$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
					}
					$this->posts($query_string); 
				?>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'finbank');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'finbank'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'finbank'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'finbank'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!--Start Single Sidebar Blog Post Colum-->
            <div class="single-sidebar-blog-post-colum">
                <ul>
                	<?php
						$count=0;
						global $post;
						while ($query->have_posts()): $query->the_post();
						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
					?>
                	<?php if(($count%2) == 0 && $count != 0):?>                    
                </ul>
            </div>
            <!--End Single Sidebar Blog Post Colum-->
            <!--Start Single Sidebar Blog Post Colum-->
            <div class="single-sidebar-blog-post-colum">
                <ul>
                	<?php endif; ?>
                	<li class="sidebar-blog-post-single">
                        <div class="img-box">
                        	<?php the_post_thumbnail('finbank_270x120'); ?>
                            <div class="overlay-content">
                                <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="title-box">
                            <div class="post-date"><?php echo wp_kses(get_the_date(), true); ?></div>
                            <h4>
                                <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a>
                            </h4>
                        </div>
                    </li>
                    <?php $count++; endwhile; ?>
            	</ul>
            </div>          

        <?php endif;
        wp_reset_postdata();
    }
}
