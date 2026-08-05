<?php get_header(); ?>

<main class="max-w-6xl mx-auto px-6 py-16">

<?php while ( have_posts() ) : the_post(); ?>

    <article>

        <h1 class="text-4xl font-bold mb-8">
            <?php the_title(); ?>
        </h1>

        <div class="prose max-w-none">
            <?php the_content(); ?>
        </div>

    </article>

<?php endwhile; ?>

</main>

<?php get_footer(); ?>