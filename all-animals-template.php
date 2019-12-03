<?php
/*
Template Name: All Animals Template
Template Post Type: page
*/
?>

<?php get_header(); ?>
<div class="container">
    <div class="row my-3">
        <div class="col">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <div class="card h-100">
                        <h2 class="card-header text-center"><?php the_title(); ?></h2>

                        <div class="card-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
    $args = array(
        'post_type' => 'animal'
    );
    $allAnimals = new WP_Query($args);
    ?>

    <?php if ($allAnimals->have_posts()): ?>
        <div class="row">
            <?php while ($allAnimals->have_posts()): $allAnimals->the_post(); ?>

                <div class="col-12 d-flex justify-content-center col-sm-3">
                    <div class="card border-0 p-3 h-100">
                        <h5 class="text-center card-title"><?php the_title(); ?></h5>
                        <?php the_post_thumbnail('medium_thumbnail', ['class' => 'card-img-fluid']); ?>
                        <div class="card-body">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn primary text-white btn-block">Read more</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>



<?php get_footer(); ?>
