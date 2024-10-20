<?php

class Elementor_Tabslider_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Tabslider Widget';
    }

    public function get_title()
    {
        return esc_html__('Tabslider Widget', 'custom-tab');
    }

    public function get_icon()
    {
        return 'eicon-text';
    }

    public function get_categories()
    {
        return ['custom-tab-category'];
    }

    public function get_keywords()
    {
        return ['Tabslider', 'heading'];
    }

    public function get_custom_help_url()
    {
        return 'https://example.com/widget-name';
    }

    protected function get_upsale_data()
    {
        return [];
    }

    protected function _register_controls() {
        // Use \Elementor\Controls_Manager instead of Controls_Manager directly
        $this->start_controls_section(
            'tab_content_section',
            [
                'label' => __('Tabs', 'custom-tab'),
            ]
        );

        $this->add_control(
            'slider_title',
            [
                'label' => __('Slider Title', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Reach your ideal customers when they are most likely to buy with:', 'custom-tab'),
            ]
        );

            // Title Alignment Control (moved above repeater)
        $this->add_control(
            'slider_title_alignment',
            [
                'label' => __('Title Alignment', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'custom-tab'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'custom-tab'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'custom-tab'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center', // Default alignment
                'toggle' => true,
            ]
        );

        $repeater = new \Elementor\Repeater(); // Add repeater instance
        $repeater->add_control(
            'tab_title',
            [
                'label' => __('Tab Title', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Tab Title', 'custom-tab'),
            ]
        );
        $repeater->add_control(
            'tab_description',
            [
                'label' => __('Tab Description', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Tab Description', 'custom-tab'),
            ]
        );
        $repeater->add_control(
            'tab_image',
            [
                'label' => __('Tab Image', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'tab_icon_image',
            [
                'label' => __('Tab Icon Image', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '', // Default to an empty URL
                ],
            ]
        );

        // Removed the tab_title_color, tab_description_color, and tab_background_color controls

        $this->add_control(
            'tabs',
            [
                'label' => __('Tabs', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => __('Intent', 'custom-tab'),
                        'tab_description' => __('Indicates a company\'s "likelihood to buy" based on their behavioral signals so you can offer them exactly what they\'re looking for.', 'custom-tab'),
                        'tab_slug' => 'intent',
                    ],
                    [
                        'tab_title' => __('Job Change Filter and Alerts', 'custom-tab'),
                        'tab_description' => __('Stay up to date on your prospects\' job changes so you can explore new business opportunities.', 'custom-tab'),
                        'tab_slug' => 'job',
                    ],
                    [
                        'tab_title' => __('Technology Filter', 'custom-tab'),
                        'tab_description' => __('Gives you the ability to target companies based on their tech stacks.', 'custom-tab'),
                        'tab_slug' => 'tech',
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();



        // Styles Section
        $this->start_controls_section(
            'tab_style_main_title',
            [
                'label' => __('Main-Title', 'custom-tab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Tab Title Typography Control
        $this->add_control(
            'main_title_color',
            [
                'label' => __('Color', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .tab__main-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_maintitle_typography',
                'label' => __('Typography', 'custom-tab'),
                'selector' => '{{WRAPPER}} .tab__main-title h2',
            ]
        );

        

        $this->end_controls_section();


        $this->start_controls_section(
            'tab_style_title',
            [
                'label' => __('Tab-Title', 'custom-tab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Tab Title Typography Control
        $this->add_control(
            'tab_title_color',
            [
                'label' => __('Color', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .nav-link h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_title_typography',
                'label' => __('Typography', 'custom-tab'),
                'selector' => '{{WRAPPER}} .nav-link h6',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tab_style_des',
            [
                'label' => __('Tab-Description', 'custom-tab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Tab Description Typography Control
        $this->add_control(
            'tab_description_color',
            [
                'label' => __('Color', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                    '{{WRAPPER}} .nav-item-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_description_typography',
                'label' => __('Typography', 'custom-tab'),
                'selector' => '{{WRAPPER}} .nav-item-content span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tab_style_active',
            [
                'label' => __('Tab-Active', 'custom-tab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Active Tab Link Color Control
        $this->add_control(
            'active_tab_color',
            [
                'label' => __(' Color', 'custom-tab'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff0000', // Default active color
                'selectors' => [
                    '{{WRAPPER}} .tab__btn-wrapper .nav-link.active::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tab_style_content',
            [
                'label' => __('Tab-Content', 'custom-tab'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'custom-tab' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'custom-tab' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="tab__wrapper mt-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="tab__main-title">
                            <h2 style="text-align: <?php echo esc_attr($settings['slider_title_alignment']); ?>;"><?php echo esc_html($settings['slider_title']); ?></h2>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-lg-6 text-center">
                        <div class="tab__btn-wrapper">
                            <!-- Tab buttons -->
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <?php foreach ($settings['tabs'] as $index => $tab) : ?>
                                    <?php
                                    // Inline CSS for background image
                                    $icon_url = isset($tab['tab_icon_image']['url']) ? esc_url($tab['tab_icon_image']['url']) : '';
                                    ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" 
                                                id="pills-<?php echo esc_attr($tab['tab_slug']); ?>-tab" 
                                                data-bs-toggle="pill" 
                                                data-bs-target="#pills-<?php echo esc_attr($tab['tab_slug']); ?>" 
                                                type="button" 
                                                role="tab" 
                                                aria-controls="pills-<?php echo esc_attr($tab['tab_slug']); ?>" 
                                                aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                            <style>
                                                #pills-<?php echo esc_attr($tab['tab_slug']); ?>-tab::before {
                                                    content: '';
                                                    display: block;
                                                    width: 50px;
                                                    height: 50px;
                                                    background-image: url('<?php echo $icon_url; ?>');
                                                    background-size: contain;
                                                    background-repeat: no-repeat;
                                                    position: absolute;
                                                    left: -25px;
                                                    top: 50%;
                                                    transform: translateY(-50%);
                                                }
                                                @media (max-width: 991px) {
                                                    #pills-<?php echo esc_attr($tab['tab_slug']); ?>-tab::before {
                                                        width: 40px !important;
                                                        height: 40px !important;
                                                        left: 50% !important;
                                                        top: -25px !important;
                                                    }
                                                }
                                            </style>
                                            <div class="nav-item-content">
                                                <h6><?php echo esc_html($tab['tab_title']); ?></h6>
                                                <span><?php echo esc_html($tab['tab_description']); ?></span>
                                            </div>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-lg-6">
                        <div class="tab-content" id="pills-tabContent">

                            <?php foreach ($settings['tabs'] as $index => $tab) : ?>
                                <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>" 
                                     id="pills-<?php echo esc_attr($tab['tab_slug']); ?>" 
                                     role="tabpanel" 
                                     aria-labelledby="pills-<?php echo esc_attr($tab['tab_slug']); ?>-tab">
                                     <div class="nav-item-content nav-item-content-mob">
                                                <h6><?php echo esc_html($tab['tab_title']); ?></h6>
                                                <p><?php echo esc_html($tab['tab_description']); ?></p>
                                    </div>
                                    <img src="<?php echo esc_url($tab['tab_image']['url']); ?>" alt="<?php echo esc_attr($tab['tab_title']); ?>" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    
    

}

