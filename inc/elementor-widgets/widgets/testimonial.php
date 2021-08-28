<?php
namespace Burgerelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Burger elementor testimonial section widget.
 *
 * @since 1.0
 */
class Burger_Testimonial extends Widget_Base {

	public function get_name() {
		return 'burger-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial content', 'burger-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'burger-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Testimonials', 'burger-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'burger-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Happy Customers', 'burger-companion' )
            ]
        );
		$this->add_control(
            'testimonials', [
                'label' => __( 'Create New', 'burger-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'review_text',
                        'label' => __( 'Review Text', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( '“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque. Kristiana Chouhan', 'burger-companion' ),
                    ],
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'burger-companion' ),
                        'description' => __( 'The Image size should be 62x62', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Hasan Fardous', 'burger-companion' ),
                    ],
                    [
                        'name' => 'reviews',
                        'label' => __( 'Client Review', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::CHOOSE,
                        'default' => '5',
                        'options' => [
                            '1' => [
                                'title' => __( '1 Star', 'burger-companion' ),
                                'icon' => 'fa fa-star',
                            ],
                            '2' => [
                                'title' => __( '2 Stars', 'burger-companion' ),
                                'icon' => 'fa fa-star',
                            ],
                            '3' => [
                                'title' => __( '3 Stars', 'burger-companion' ),
                                'icon' => 'fa fa-star',
                            ],
                            '4' => [
                                'title' => __( '4 Stars', 'burger-companion' ),
                                'icon' => 'fa fa-star',
                            ],
                            '5' => [
                                'title' => __( '5 Stars', 'burger-companion' ),
                                'icon' => 'fa fa-star',
                            ],
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'review_text'   => __( '“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque. Kristiana Chouhan', 'burger-companion' ),
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Hasan Fardous', 'burger-companion' ),
                        'reviews' => '5',
                    ],
                    [      
                        'review_text'   => __( '“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque. Kristiana Chouhan', 'burger-companion' ),
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Shakil Ahmed', 'burger-companion' ),
                        'reviews' => '5',
                    ],
                    [      
                        'review_text'   => __( '“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque. Kristiana Chouhan', 'burger-companion' ),
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Arafat Hossain', 'burger-companion' ),
                        'reviews' => '5',
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End gallery content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */

        $this->start_controls_section(
            'style_gallery_section', [
                'label' => __( 'Style Gallery Section', 'burger-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hover_overlay_col', [
                'label' => __( 'Hover overy Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .single_gallery .hover_pop:before' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'burger-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button BG Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hov_col', [
                'label' => __( 'Button Hover Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    // call load widget script
    $this->load_widget_script(); 
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $testimonials = !empty( $settings['testimonials'] ) ? $settings['testimonials'] : '';
    ?>
    
    <!-- testimonial_area  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <?php
                            if ( $sub_title ) {
                                echo '<span>'.esc_html( $sub_title ).'</span>';
                            }
                            if ( $sec_title ) {
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <?php
                        if( is_array( $testimonials ) && count( $testimonials ) > 0 ){
                            foreach ( $testimonials as $item ) {
                                $review_text = !empty( $item['review_text'] ) ? $item['review_text'] : '';
                                $client_img = !empty( $item['client_img']['id'] ) ? wp_get_attachment_image( $item['client_img']['id'], 'burger_np_thumb', '', array('alt' => burger_image_alt( $item['client_img']['url'] ) ) ) : '';
                                $client_name = !empty( $item['client_name'] ) ? $item['client_name'] : '';
                                $reviews = !empty( $item['reviews'] ) ? $item['reviews'] : '';
                                ?>
                                <div class="single_carousel">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="single_testmonial text-center">
                                                <?php
                                                    if ( $review_text ) {
                                                        echo '<p>'.wp_kses_post( $review_text ).'</p>';
                                                    }
                                                ?>
                                                <div class="testmonial_author">
                                                    <div class="thumb">
                                                        <?php
                                                            if ( $client_img ) {
                                                                echo $client_img;
                                                            }
                                                        ?>
                                                    </div>
                                                    
                                                    <?php
                                                        if ( $client_name ) {
                                                            echo '<h4>'.esc_html( $client_name ).'</h4>';
                                                        }

                                                        if( $reviews > 0 ){
                                                            echo '<div class="stars">';
                                                            for( $i = 0; $i < $reviews; $i++ ) {
                                                                echo '<i class="fa fa-star"></i>';
                                                            }
                                                            echo '</div>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // testmonial_active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:1,
                    nav:false
                },
                1200:{
                    items:1,
                    nav:false
                },
                1500:{
                    items:1
                }
            }
            });          
        })(jQuery);
        </script>
        <?php 
        }
    }	
}