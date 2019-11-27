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

}
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
    ?>
    <style type="text/css">
        .primary {
            background-color: <?php echo get_theme_mod('blackSheep_primaryColour', '#000000'); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
