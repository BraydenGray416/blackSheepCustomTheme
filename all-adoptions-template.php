<?php
/*
Template Name: All Adoptions Template
Template Post Type: page
*/
?>
<?php $counter = 0; ?>

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
        'post_type' => 'adoption'
    );
    $allAdoptions = new WP_Query($args);
    ?>

    <?php if ($allAdoptions->have_posts()): ?>
        <div class="row">
            <?php while ($allAdoptions->have_posts()): $allAdoptions->the_post(); $counter++; ?>
                <?php if ($counter % 2 == 0): ?>
                    <div class="col-12 my-2">
                        <div class="card p-3 h-100">
                            <h5 class="text-center card-title"><?php the_title(); ?></h5>
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="btn primary text-white">View More</a>
                                    <a href="mailto:blacksheepotaki@gmail.com?Subject=<?php the_title(); ?>" target="_top" class="btn secondary text-white">Enquire</a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-12 my-2">
                        <div class="card p-3 h-100">
                            <h5 class="text-center card-title"><?php the_title(); ?></h5>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </div>
                                <div class="col-12 col-md-8">
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="btn primary text-white">View More</a>
                                    <a href="mailto:blacksheepotaki@gmail.com?Subject=<?php the_title(); ?>" target="_top" class="btn secondary text-white">Enquire</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>



<?php get_footer(); ?>
