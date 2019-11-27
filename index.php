<?php get_header(); ?>
<div class="container">
    <?php if (has_header_image()): ?>
        <div class="container-fluid p-0">
            <!-- <img src="<?php echo(get_header_image()); ?>" alt="" class="img-fluid"> -->
            <div class="headerImage" style="background-image:url(<?php echo(get_header_image()); ?>)">
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
