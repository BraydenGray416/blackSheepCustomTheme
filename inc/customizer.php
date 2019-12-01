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

    $wp_customize->add_setting( 'blackSheep_secondaryColour' , array(
        'default'   => '#10a72e',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blackSheep_secondaryColourControl', array(
        'label'      => __( 'Secondary Colour', 'blackSheepCustom' ),
        'description' => 'Change the secondary colour',
        'section'    => 'colors',
        'settings'   => 'blackSheep_secondaryColour',
    ) ) );

    $wp_customize->add_section( 'blackSheep_slideshowSection' , array(
        'title'      => __( 'Slideshow', 'blackSheepCustom' ),
        'priority'   => 30,
    ) );
    for ($i=1; $i <=3 ; $i++) {
        $wp_customize->add_setting( 'blackSheep_slide_'.$i , array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blackSheep_slide_'.$i.'Control', array(
            'label'      => __( 'Add Slide ' . $i, 'blackSheepCustom' ),
            'section'    => 'blackSheep_slideshowSection',
            'settings'   => 'blackSheep_slide_'.$i,
        ) ) );
    }

}
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
    ?>
    <style type="text/css">
        .primary {
            background-color: <?php echo get_theme_mod('blackSheep_primaryColour', '#000000'); ?>;
        }
        .secondary {
            background-color: <?php echo get_theme_mod('blackSheep_secondaryColour', '#10a72e'); ?>
        }
    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
