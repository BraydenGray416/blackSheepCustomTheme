<?php get_header(); ?>

<div class="container">
    <?php if (has_header_image()): ?>
        <div class="container-fluid p-0">
            <img src="<?php echo(get_header_image()); ?>" alt="" class="img-fluid">
        </div>
    <?php endif; ?>
    <div class="row justify-content-center multiImagesRow">
        <?php for ($m=1; $m < 6; $m++): ?>
            <?php if (get_theme_mod('blackSheep_multiImage_'.$m)): ?>
                <div class="d-flex flex-wrap flex-column ">
                    <img src="<?php echo get_theme_mod('blackSheep_multiImage_'.$m); ?>" alt="Sister Company image" class="multiImages">
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>


</div>


<?php get_footer(); ?>
