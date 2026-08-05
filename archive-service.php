<?php get_header(); ?>

<h1>Our Services</h1>

<?php
while (have_posts()) :
    the_post();
?>

<h2>
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</h2>

<?php the_excerpt(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>