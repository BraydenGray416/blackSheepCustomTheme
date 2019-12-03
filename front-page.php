<?php get_header(); ?>

<div class="container">
    <?php if (has_header_image()): ?>
        <div class="container-fluid p-0">
            <img src="<?php echo(get_header_image()); ?>" alt="" class="img-fluid">
        </div>
    <?php endif; ?>
    <div class="h4 d-flex justify-content-center text-center my-5">
        <?php echo get_theme_mod('blackSheep_headerSubtext'); ?>
    </div>
    <div class="row justify-content-center multiImagesRow">
        <?php for ($m=1; $m < 6; $m++): ?>
            <?php if (get_theme_mod('blackSheep_multiImage_'.$m)): ?>
                <div class="d-flex flex-wrap flex-column ">
                    <img src="<?php echo get_theme_mod('blackSheep_multiImage_'.$m); ?>" alt="Sister Company image" class="multiImages">
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <?php
    for ($i=1; $i <= 20 ; $i++) {
        if(get_theme_mod('blackSheep_slide_'.$i)){
            $firstSlide = $i;
            break;
        }
    }
    ?>

    <?php if(isset($firstSlide)): ?>
        <div class="container">
            <div id="homeCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php for ($i=1; $i <= 20 ; $i++): ?>
                        <?php if(get_theme_mod('blackSheep_slide_'.$i)): ?>
                            <div class="carousel-item <?php if($firstSlide === $i){ echo 'active';} ?>">
                                <img src="<?php echo get_theme_mod('blackSheep_slide_'.$i); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <?php while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>



<?php get_footer(); ?>
