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
    for ($i=1; $i <=20 ; $i++) {
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

    $wp_customize->add_section( 'blackSheep_multiImageSection', array(
        'title'     => __( 'Multi Images', 'blackSheepCustom'),
        'priority'  => 30,
    ) );
    for ($m=1; $m <=6 ; $m++) {
        $wp_customize->add_setting( 'blackSheep_multiImage_'.$m , array(
            'default'   =>'',
            'transport' =>'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blackSheep_multiImage_'.$m.'Control', array(
            'label'     =>__( 'Add Image ' .$m, 'blackSheepCustom'),
            'section'   =>'blackSheep_multiImageSection',
            'settings'  =>'blackSheep_multiImage_'.$m,
        ) ) );
    }

    $wp_customize->add_section( 'textSections', array(
        'title'      => __( 'Text Sections', 'blackSheepCustom'),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'blackSheep_headerSubtext', array(
        'default'    => '',
        'transport'  => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control ($wp_customize, 'blackSheep_headerSubtextControl', array(
        'label'     =>__( 'Enter in the text for underneath the header image', 'blackSheepCustom'),
        'section'   => 'textSections',
        'settings'  => 'blackSheep_headerSubtext',
        'type'      => 'text',
    )
));
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
