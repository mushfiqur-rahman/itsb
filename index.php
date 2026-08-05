<?php
/**
 * The fallback template.
 * WordPress uses this whenever no more specific template
 * (single.php, page.php, home.php, category.php, etc.)
 * matches the current request. It should never be empty.
 */
get_header();
?>

<main class="max-w-6xl mx-auto px-6 py-16">

  <?php if ( have_posts() ) : ?>
    <div class="grid md:grid-cols-3 gap-6">
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="post-card rounded-lg border border-hive overflow-hidden">
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'itsb-card', array( 'class' => 'w-full aspect-[3/2] object-cover' ) ); } ?>
          </a>
          <div class="p-5">
            <h2 class="font-display font-bold text-[16px]">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="mt-2 text-[13.5px] text-slate"><?php the_excerpt(); ?></p>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <?php the_posts_pagination(); ?>

  <?php else : ?>
    <p class="text-[15px] text-slate">Nothing found.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>