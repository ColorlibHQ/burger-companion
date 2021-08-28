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
 * Burger gallery Contents section widget.
 *
 * @since 1.0
 */
class Burger_Instagram_Gallery extends Widget_Base {

	public function get_name() {
		return 'burger-instagram-gallery';
	}

	public function get_title() {
		return __( 'Instagram Gallery', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  gallery contents  ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery Contents', 'burger-companion' ),
			]
        );
		$this->add_control(
            'galleries', [
                'label' => __( 'Create New', 'burger-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ _id }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => __( 'Item Image', 'burger-companion' ),
                        'description' => __( 'The Image size should be 264x264', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'item_url',
                        'label' => __( 'Instagram URL', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
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
    $galleries  = !empty( $settings['galleries'] ) ? $settings['galleries'] : '';
    ?>

    <!-- instragram_area_start -->
    <div class="instragram_area">
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $galleries ) && count( $galleries ) > 0 ){
                    foreach ( $galleries as $item ) {
                        $item_img = !empty( $item['item_img']['id'] ) ? wp_get_attachment_image( $item['item_img']['id'], 'burger_gallery_img_264x264', '', array('alt' => burger_image_alt( $item['item_img']['url'] ) ) ) : '';
                        $item_url = !empty( $item['item_url']['url'] ) ? $item['item_url']['url'] : '';
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_instagram">
                                <?php
                                    if ( $item_img ) {
                                        echo wp_kses_post( $item_img );
                                    }
                                    echo '
                                    <div class="ovrelay">
                                        <a href="'.esc_url( $item_url ).'">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>';
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- instragram_area_end  -->
    <?php

    }
}
