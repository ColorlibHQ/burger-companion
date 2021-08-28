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
 * Burger Featured Products section widget.
 *
 * @since 1.0
 */
class Burger_Featured_Products extends Widget_Base {

	public function get_name() {
		return 'burger-featured-products';
	}

	public function get_title() {
		return __( 'Featured Products', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Featured Products contents  ------------------------------
		$this->start_controls_section(
			'featured-products_content',
			[
				'label' => __( 'Featured Products Contents', 'burger-companion' ),
			]
        );
		$this->add_control(
            'featured_contents', [
                'label' => __( 'Create New', 'burger-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => esc_html__( 'BG Image', 'burger-companion' ),
                        'description' => esc_html__( 'Best size is 960x550', 'burger-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'item_price',
                        'label' => __( 'Price', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$20', 'burger-companion' ),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'The Burger President', 'burger-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Text', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Great way to make your business appear trust <br> and relevant.',
                    ],
                    [
                        'name' => 'btn_title',
                        'label' => __( 'Button Title', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Order Now', 'burger-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [
                        'item_img'        => [
                            'url'         => Utils::get_placeholder_image_src(),
                        ],
                        'item_price'      => __( '$20', 'burger-companion' ),
                        'item_title'      => __( 'The Burger President', 'burger-companion' ),
                        'item_text'       => 'Great way to make your business appear trust <br> and relevant.',
                        'btn_title'       => __( 'Order Now', 'burger-companion' ),
                    ],
                    [
                        'item_img'        => [
                            'url'         => Utils::get_placeholder_image_src(),
                        ],
                        'item_price'      => __( '$30', 'burger-companion' ),
                        'item_title'      => __( 'The Burger Smokin', 'burger-companion' ),
                        'item_text'       => 'Great way to make your business appear trust <br> and relevant.',
                        'btn_title'       => __( 'Order Now', 'burger-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_team_member', [
                'label' => __( 'Style Member Section', 'burger-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'burger-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $featured_contents  = !empty( $settings['featured_contents'] ) ? $settings['featured_contents'] : '';
    ?>
    <!-- featured_product_start -->
    <div class="Burger_President_area">
        <div class="Burger_President_here">
            <?php
            if( is_array( $featured_contents ) && count( $featured_contents ) > 0 ) {
                foreach( $featured_contents as $item ) {
                    $item_img = !empty( $item['item_img']['id'] ) ? wp_get_attachment_image( $item['item_img']['id'], 'burger_featured_img_960x550', '', array('alt' => burger_image_alt( $item['item_img']['url'] ) ) ) : '';
                    $item_price = ( !empty( $item['item_price'] ) ) ? $item['item_price'] : '';
                    $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                    $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                    $btn_title = ( !empty( $item['btn_title'] ) ) ? $item['btn_title'] : '';
                    $btn_url = ( !empty( $item['btn_url']['url'] ) ) ? $item['btn_url']['url'] : '';
                    ?>
                    <div class="single_Burger_President">
                        <div class="room_thumb">
                            <?php
                                if ( $item_img ) {
                                    echo wp_kses_post( $item_img );
                                }
                            ?>
                            <div class="room_heading d-flex justify-content-between align-items-center">
                                <div class="room_heading_inner">
                                    <?php
                                        if ( $item_price ) {
                                            echo '<span>'.esc_html( $item_price ).'</span>';
                                        }
                                        if ( $item_title ) {
                                            echo '<h3>'.esc_html( $item_title ).'</h3>';
                                        }
                                        if ( $item_text ) {
                                            echo '<p>'.wp_kses_post( nl2br($item_text) ).'</p>';
                                        }
                                        if ( $btn_title ) {
                                            echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_title ).'</a>';
                                        }
                                    ?>
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
    <!-- featured_product_end  -->
    <?php

    }
}
