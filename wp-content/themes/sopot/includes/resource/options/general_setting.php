<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'sopot'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'sopot' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'sopot'),
            'default' => true,
        ),
        array(
            'id'      => 'preloader_text',
            'type'    => 'textarea',
            'title'   => __( 'Preloader Text', 'sopot' ),
            'desc'    => esc_html__( 'Enter the Preloader Text', 'sopot' ),
            'default' => '<span data-text-preloader="l" class="letters-loading">
            l
        </span>
        <span data-text-preloader="o" class="letters-loading">
            o
        </span>
        <span data-text-preloader="a" class="letters-loading">
            a
        </span>
        <span data-text-preloader="d" class="letters-loading">
            d
        </span>
        <span data-text-preloader="i" class="letters-loading">
            i
        </span>
        <span data-text-preloader="n" class="letters-loading">
            n
        </span>
        <span data-text-preloader="g" class="letters-loading">
            g
        </span>',
        ),
        array(
            'id' => 'theme_main_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'sopot'),
            'default' => '#ff6f0f',
            'transparent' => false
        ),
        array(
            'id' => 'theme_main_color2',
            'type' => 'color',
            'title' => esc_html__('Dark Color', 'sopot'),
            'default' => '#001d23',
            'transparent' => false
        ),
    ),
);
