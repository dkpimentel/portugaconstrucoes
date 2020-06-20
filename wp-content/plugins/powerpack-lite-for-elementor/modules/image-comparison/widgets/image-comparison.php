<?php
namespace PowerpackElementsLite\Modules\ImageComparison\Widgets;

use PowerpackElementsLite\Base\Powerpack_Widget;

// Elementor Classes
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Image Comparison Widget
 */
class Image_Comparison extends Powerpack_Widget {
    
    /**
	 * Retrieve image comparison widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() {
        return 'pp-image-comparison';
    }

    /**
	 * Retrieve image comparison widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
    public function get_title() {
        return __( 'Image Comparison', 'power-pack' );
    }

    /**
	 * Retrieve the list of categories the image comparison widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
    public function get_categories() {
        return [ 'power-pack' ];
    }

    /**
	 * Retrieve image comparison widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
    public function get_icon() {
        return 'ppicon-image-comparison power-pack-admin-icon';
    }
    
    /**
	 * Retrieve the list of scripts the image comparison widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
    public function get_script_depends() {
        return [
            'jquery-event-move',
            'twentytwenty',
            'powerpack-frontend'
        ];
    }

    /**
	 * Retrieve the list of styles the image comparison widget depended on.
	 *
	 * Used to set style dependencies required to run the widget.
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
    public function get_style_depends() {
        return [
            'twentytwenty'
        ];
    }

    /**
	 * Register image comparison widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
    protected function _register_controls() {

        /*-----------------------------------------------------------------------------------*/
        /*	CONTENT TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Content Tab: Before Image
         */
        $this->start_controls_section(
            'section_before_image',
            [
                'label'             => __( 'Before Image', 'power-pack' ),
            ]
        );

        $this->add_control(
            'before_label',
            [
                'label'             => __( 'Label', 'power-pack' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( 'Before', 'power-pack' ),
            ]
        );

		$this->add_control(
			'before_image',
			[
				'label'             => __( 'Image', 'power-pack' ),
				'type'              => Controls_Manager::MEDIA,
				'default'           => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        /**
         * Content Tab: After Image
         */
        $this->start_controls_section(
            'section_after_image',
            [
                'label'             => __( 'After Image', 'power-pack' ),
            ]
        );

        $this->add_control(
            'after_label',
            [
                'label'             => __( 'Label', 'power-pack' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( 'After', 'power-pack' ),
            ]
        );

		$this->add_control(
			'after_image',
			[
				'label'             => __( 'Image', 'power-pack' ),
				'type'              => Controls_Manager::MEDIA,
				'default'           => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        /**
         * Content Tab: Settings
         */
        $this->start_controls_section(
            'section_member_box_settings',
            [
                'label'             => __( 'Settings', 'power-pack' ),
            ]
        );
        
        $this->add_control(
            'visible_ratio',
            [
                'label'                 => __( 'Visible Ratio', 'power-pack' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 1,
                        'step'  => 0.1,
                    ],
                ],
                'size_units'            => '',
            ]
        );
        
        $this->add_control(
            'orientation',
            [
                'label'                 => __( 'Orientation', 'power-pack' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'horizontal',
                'options'               => [
                    'vertical'      => __( 'Vertical', 'power-pack' ),
                    'horizontal'    => __( 'Horizontal', 'power-pack' ),
                ],
            ]
        );
        
        $this->add_control(
            'move_slider',
            [
                'label'                 => __( 'Move Slider', 'power-pack' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'drag',
                'options'               => [
                    'drag'          => __( 'Drag', 'power-pack' ),
                    'mouse_move'    => __( 'Mouse Move', 'power-pack' ),
                    'mouse_click'   => __( 'Mouse Click', 'power-pack' ),
                ],
            ]
        );
        
        $this->add_control(
            'overlay',
            [
                'label'             => __( 'Overlay', 'power-pack' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => __( 'Show', 'power-pack' ),
                'label_off'         => __( 'Hide', 'power-pack' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->end_controls_section();

        /**
		 * Content Tab: Docs Links
		 *
		 * @since 1.4.8
		 * @access protected
		 */
		$this->start_controls_section(
			'section_help_docs',
			[
				'label' => __( 'Help Docs', 'powerpack' ),
			]
		);
		
		$this->add_control(
			'help_doc_1',
			[
				'type'            => Controls_Manager::RAW_HTML,
				/* translators: %1$s doc link */
				'raw'             => sprintf( __( '%1$s Widget Overview %2$s', 'powerpack' ), '<a href="https://powerpackelements.com/docs/powerpack/widgets/image-comparison/image-comparison-widget-overview/?utm_source=widget&utm_medium=panel&utm_campaign=userkb" target="_blank" rel="noopener">', '</a>' ),
				'content_classes' => 'pp-editor-doc-links',
			]
		);

		$this->end_controls_section();
		
		/*-----------------------------------------------------------------------------------*/
        /*	STYLE TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Style Tab: Overlay
         */
        $this->start_controls_section(
            'section_member_overlay_style',
            [
                'label'             => __( 'Overlay', 'power-pack' ),
                'tab'               => Controls_Manager::TAB_STYLE,
				'condition'         => [
					'overlay'  => 'yes',
				],
            ]
        );

        $this->start_controls_tabs( 'tabs_overlay_style' );

        $this->start_controls_tab(
            'tab_overlay_normal',
            [
                'label'             => __( 'Normal', 'power-pack' ),
            ]
        );
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'              => 'overlay_background',
				'types'             => [ 'classic', 'gradient' ],
				'selector'          => '{{WRAPPER}} .twentytwenty-overlay',
				'condition'         => [
					'overlay'  => 'yes',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_overlay_hover',
            [
                'label'             => __( 'Hover', 'power-pack' ),
            ]
        );
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'              => 'overlay_background_hover',
				'types'             => [ 'classic', 'gradient' ],
				'selector'          => '{{WRAPPER}} .twentytwenty-overlay:hover',
				'condition'         => [
					'overlay'  => 'yes',
				],
			]
		);

        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->end_controls_section();

        /**
         * Style Tab: Handle
         */
        $this->start_controls_section(
            'section_handle_style',
            [
                'label'             => __( 'Handle', 'power-pack' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tabs_handle_style' );

        $this->start_controls_tab(
            'tab_handle_normal',
            [
                'label'             => __( 'Normal', 'power-pack' ),
            ]
        );

        $this->add_control(
            'handle_icon_color',
            [
                'label'             => __( 'Icon Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
                    '{{WRAPPER}} .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'              => 'handle_background',
				'types'             => [ 'classic', 'gradient' ],
				'selector'          => '{{WRAPPER}} .twentytwenty-handle',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'              => 'handle_border',
				'label'             => __( 'Border', 'power-pack' ),
				'placeholder'       => '1px',
				'default'           => '1px',
				'selector'          => '{{WRAPPER}} .twentytwenty-handle',
				'separator'         => 'before',
			]
		);

		$this->add_control(
			'handle_border_radius',
			[
				'label'             => __( 'Border Radius', 'power-pack' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .twentytwenty-handle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'                  => 'handle_box_shadow',
				'selector'              => '{{WRAPPER}} .twentytwenty-handle',
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_handle_hover',
            [
                'label'             => __( 'Hover', 'power-pack' ),
            ]
        );

        $this->add_control(
            'handle_icon_color_hover',
            [
                'label'             => __( 'Icon Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-handle:hover .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
                    '{{WRAPPER}} .twentytwenty-handle:hover .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'              => 'handle_background_hover',
				'types'             => [ 'classic', 'gradient' ],
				'selector'          => '{{WRAPPER}} .twentytwenty-handle:hover',
			]
		);

        $this->add_control(
            'handle_border_color_hover',
            [
                'label'             => __( 'Border Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-handle:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        
        $this->end_controls_section();

        /**
         * Style Tab: Divider
         */
        $this->start_controls_section(
            'section_divider_style',
            [
                'label'             => __( 'Divider', 'power-pack' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label'             => __( 'Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
			'divider_width',
			[
				'label'             => __( 'Width', 'power-pack' ),
				'type'              => Controls_Manager::SLIDER,
				'default'           => [
                    'size' => 3,
                    'unit' => 'px',
                ],
				'size_units'        => [ 'px', '%' ],
				'range'             => [
					'px' => [
						'max' => 20,
					],
				],
				'tablet_default'    => [
					'unit' => 'px',
				],
				'mobile_default'    => [
					'unit' => 'px',
				],
				'selectors'         => [
					'{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc(-{{SIZE}}{{UNIT}}/2);',
				],
			]
		);

        $this->end_controls_section();

        /**
         * Style Tab: Label
         */
        $this->start_controls_section(
            'section_label_style',
            [
                'label'             => __( 'Label', 'power-pack' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
			'label_horizontal_position',
			[
				'label'                 => __( 'Position', 'power-pack' ),
				'type'                  => Controls_Manager::CHOOSE,
				'label_block'           => false,
				'default'               => 'top',
				'options'               => [
					'top'          => [
						'title'    => __( 'Top', 'power-pack' ),
						'icon'     => 'eicon-v-align-top',
					],
					'middle'       => [
						'title'    => __( 'Middle', 'power-pack' ),
						'icon'     => 'eicon-v-align-middle',
					],
					'bottom'       => [
						'title'    => __( 'Bottom', 'power-pack' ),
						'icon'     => 'eicon-v-align-bottom',
					],
				],
				'prefix_class'          => 'pp-ic-label-horizontal-',
				'condition'             => [
					'orientation'  => 'horizontal',
				],
			]
		);
        
        $this->add_control(
			'label_vertical_position',
			[
				'label'                 => __( 'Position', 'power-pack' ),
				'type'                  => Controls_Manager::CHOOSE,
				'label_block'           => false,
				'options'               => [
					'left'      => [
						'title' => __( 'Left', 'power-pack' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center'           => [
						'title' => __( 'Center', 'power-pack' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'            => [
						'title' => __( 'Right', 'power-pack' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'               => 'center',
				'prefix_class'  => 'pp-ic-label-vertical-',
				'condition'             => [
					'orientation'  => 'vertical',
				],
			]
		);
        
        $this->add_responsive_control(
			'label_align',
			[
				'label'             => __( 'Align', 'power-pack' ),
				'type'              => Controls_Manager::SLIDER,
				'size_units'        => [ 'px', '%' ],
				'range'             => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors'         => [
					'{{WRAPPER}}.pp-ic-label-horizontal-top .twentytwenty-horizontal .twentytwenty-before-label:before,
                    {{WRAPPER}}.pp-ic-label-horizontal-top .twentytwenty-horizontal .twentytwenty-after-label:before' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-ic-label-horizontal-bottom .twentytwenty-horizontal .twentytwenty-before-label:before,
                    {{WRAPPER}}.pp-ic-label-horizontal-bottom .twentytwenty-horizontal .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.pp-ic-label-vertical-left .twentytwenty-vertical .twentytwenty-before-label:before,
                    {{WRAPPER}}.pp-ic-label-vertical-left .twentytwenty-vertical .twentytwenty-after-label:before' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.pp-ic-label-vertical-right .twentytwenty-vertical .twentytwenty-before-label:before,
                    {{WRAPPER}}.pp-ic-label-vertical-right .twentytwenty-vertical .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->start_controls_tabs( 'tabs_label_style' );

        $this->start_controls_tab(
            'tab_label_before',
            [
                'label'             => __( 'Before', 'power-pack' ),
            ]
        );

        $this->add_control(
            'label_text_color_before',
            [
                'label'             => __( 'Text Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-before-label:before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_bg_color_before',
            [
                'label'             => __( 'Background Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-before-label:before' => 'background: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'              => 'label_border',
				'label'             => __( 'Border', 'power-pack' ),
				'placeholder'       => '1px',
				'default'           => '1px',
				'selector'          => '{{WRAPPER}} .twentytwenty-before-label:before',
			]
		);

		$this->add_control(
			'label_border_radius',
			[
				'label'             => __( 'Border Radius', 'power-pack' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .twentytwenty-before-label:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_label_after',
            [
                'label'             => __( 'After', 'power-pack' ),
            ]
        );

        $this->add_control(
            'label_text_color_after',
            [
                'label'             => __( 'Text Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-after-label:before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_bg_color_after',
            [
                'label'             => __( 'Background Color', 'power-pack' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .twentytwenty-after-label:before' => 'background: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'              => 'label_border_after',
				'label'             => __( 'Border', 'power-pack' ),
				'placeholder'       => '1px',
				'default'           => '1px',
				'selector'          => '{{WRAPPER}} .twentytwenty-after-label:before',
			]
		);

		$this->add_control(
			'label_border_radius_after',
			[
				'label'             => __( 'Border Radius', 'power-pack' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .twentytwenty-after-label:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'label_typography',
                'label'             => __( 'Typography', 'power-pack' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
				'separator'         => 'before',
            ]
        );

		$this->add_responsive_control(
			'label_padding',
			[
				'label'             => __( 'Padding', 'power-pack' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'         => 'before',
			]
		);

        $this->end_controls_section();

    }

    /**
	 * Render image comparison widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'image-comparison', 'class', 'pp-image-comparison twentytwenty-container' );

        $this->add_render_attribute( 'image-comparison', 'id', 'pp-image-comparison-' . esc_attr( $this->get_id() ) );

        $pp_widget_options = [
            'visible_ratio'         => ( $settings['visible_ratio']['size'] != '' ? $settings['visible_ratio']['size'] : '0.5' ),
            'orientation'           => ( $settings['orientation'] != '' ? $settings['orientation'] : 'vertical' ),
            'before_label'          => ( $settings['before_label'] != '' ? esc_attr( $settings['before_label'] ) : '' ),
            'after_label'           => ( $settings['after_label'] != '' ? esc_attr( $settings['after_label'] ) : '' ),
            'slider_on_hover'       => ( $settings['move_slider'] == 'mouse_move' ? true : false ),
            'slider_with_handle'    => ( $settings['move_slider'] == 'drag' ? true : false ),
            'slider_with_click'     => ( $settings['move_slider'] == 'mouse_click' ? true : false ),
            'no_overlay'            => ( $settings['overlay'] == 'yes' ? false : true )
        ];
        ?>
        <div <?php echo $this->get_render_attribute_string( 'image-comparison' ); ?> data-settings='<?php echo wp_json_encode( $pp_widget_options ); ?>'>
			<?php
                if ( ! empty( $settings['before_image']['url'] ) ) :
        
                    $this->add_render_attribute( 'before-image', 'src', esc_url( $settings['before_image']['url'] ) );
                    $this->add_render_attribute( 'before-image', 'alt', Control_Media::get_image_alt( $settings['before_image'] ) );
                    $this->add_render_attribute( 'before-image', 'title', Control_Media::get_image_title( $settings['before_image'] ) );
        
                    printf( '<img %s />', $this->get_render_attribute_string( 'before-image' ) );
        
                endif;

                if ( ! empty( $settings['after_image']['url'] ) ) :
        
                    $this->add_render_attribute( 'after-image', 'src', esc_url( $settings['after_image']['url'] ) );
                    $this->add_render_attribute( 'after-image', 'alt', Control_Media::get_image_alt( $settings['after_image'] ) );
                    $this->add_render_attribute( 'after-image', 'title', Control_Media::get_image_title( $settings['after_image'] ) );
        
                    printf( '<img %s />', $this->get_render_attribute_string( 'after-image' ) );
        
                endif;
            ?>
		</div>
        <?php
    }

    /**
	 * Render image comparison widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _content_template() {
        ?>
        <#
            var visible_ratio       = ( settings.visible_ratio.size != '' ) ? settings.visible_ratio.size : '0.5';
            var slider_on_hover     = ( settings.move_slider == 'mouse_move' ) ? true : false;
            var slider_with_handle  = ( settings.move_slider == 'drag' ) ? true : false;
            var slider_with_click   = ( settings.move_slider == 'mouse_click' ) ? true : false;
            var no_overlay          = ( settings.overlay == 'yes' ) ? false : true;
        #>
        <div class="pp-image-comparison twentytwenty-container" data-settings='{ "visible_ratio":{{ visible_ratio }},"orientation":"{{ settings.orientation }}","before_label":"{{ settings.before_label }}","after_label":"{{ settings.after_label }}","slider_on_hover":{{ slider_on_hover }},"slider_with_handle":{{ slider_with_handle }},"slider_with_click":{{ slider_with_click }},"no_overlay":{{ no_overlay }} }'>
            <# if ( settings.before_image.url != '' ) { #>
                <img src="{{ settings.before_image.url }}">
            <# } #>

            <# if ( settings.after_image.url != '' ) { #>
                <img src="{{ settings.after_image.url }}">
            <# } #>
		</div>
        <?php
    }
}