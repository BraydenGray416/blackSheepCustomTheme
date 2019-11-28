<?php get_header(); ?>
<div class="container">
    <?php if (has_header_image()): ?>
        <div class="container-fluid p-0">
            <img src="<?php echo(get_header_image()); ?>" alt="" class="img-fluid">
        </div>
    <?php endif; ?>
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <div class="card mt-2">
                <h5 class="card-header"><?php the_title(); ?></h5>
                <div class="card-body">
                    <?php if (!is_singular()): ?>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </div>
                                <div class="col-12 col-md-8">
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="btn primary text-white">View More</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn primary text-white">View More</a>
                        <?php endif; ?>

                    <?php else: ?>
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                        <?php the_content(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
