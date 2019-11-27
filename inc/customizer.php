<?php

function mytheme_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'blackSheep_primaryColour' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blackSheep_primaryColourControl', array(
        'label'      => __( 'Primary Colour', 'blackSheepCustom' ),
        'description' => 'Change the primary colour',
        'section'    => 'colors',
        'settings'   => 'blackSheep_primaryColour',
    ) ) );

    $wp_customize->add_setting( 'blackSheep_primaryTextColour' , array(
        'default'   => '#FFFFFF',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blackSheep_primaryTextColourControl', array(
        'label'      => __( 'Primary Text Colour', 'blackSheepCustom' ),
        'description' => 'Change the primary text colour',
        'section'    => 'colors',
        'settings'   => 'blackSheep_primaryTextColour',
    ) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
    ?>
    <style type="text/css">
        .primary {
            background-color: <?php echo get_theme_mod('blackSheep_primaryColour', '#000000'); ?>;
        }
        .primaryText {
            color: <?php echo get_theme_mod('blackSheep_primaryTextColour', '#FFFFFF'); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
