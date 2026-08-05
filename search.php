<?php
/**
 * search.php
 * WordPress uses this automatically for any /?s=query request —
 * no manual linking needed, it's found by filename per the
 * template hierarchy.
 */
get_header();
?>

<nav aria-label="Breadcrumb" class="w-full border-b border-hive bg-paper">
  <ol class="max-w-6xl mx-auto px-6 py-3 flex items-center gap-2 text-[13px] font-mono text-slate">
    <li class="flex items-center gap-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-ink transition-colors">Home</a><span class="text-hive" aria-hidden="true">/</span></li>
    <li aria-current="page" class="text-ink">Search results</li>
  </ol>
</nav>

<main class="w-full">

  <section class="max-w-6xl mx-auto px-6 pt-16 pb-10 md:pt-20">
    <div class="reveal max-w-2xl">
      <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">Search</p>
      <h1 class="font-display font-extrabold text-[28px] md:text-[38px] leading-[1.15] tracking-tight text-ink">
        <?php
        global $wp_query;
        printf(
            /* translators: %s: search term, %d: result count */
            esc_html( _n( '%2$d result for "%1$s"', '%2$d results for "%1$s"', $wp_query->found_posts, 'itsupportbee' ) ),
            esc_html( get_search_query() ),
            (int) $wp_query->found_posts
        );
        ?>
      </h1>
    </div>
  </section>

  <section class="max-w-6xl mx-auto px-6 pb-24 grid md:grid-cols-[1fr_280px] gap-10 items-start">

    <div>
      <?php if ( have_posts() ) : ?>

        <div class="grid sm:grid-cols-2 gap-6">
          <?php while ( have_posts() ) : the_post();
            $category = get_the_category();
            $primary_category = ! empty( $category ) ? $category[0] : null;
          ?>
          <article class="reveal post-card rounded-lg border border-hive overflow-hidden hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300">
            <a href="<?php the_permalink(); ?>" aria-hidden="true">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full aspect-[3/2] object-cover', 'loading' => 'lazy' ) ); ?>
              <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/post-fallback.jpg' ); ?>" alt="" class="w-full aspect-3/2 object-cover" loading="lazy" width="600" height="400">
              <?php endif; ?>
            </a>
            <div class="p-5">
              <?php if ( $primary_category ) : ?>
                <span class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase"><?php echo esc_html( $primary_category->name ); ?></span>
              <?php endif; ?>
              <h2 class="font-display font-bold text-[16px] mt-2.5 leading-snug">
                <a href="<?php the_permalink(); ?>" class="hover:text-honeydark transition-colors"><?php the_title(); ?></a>
              </h2>
              <p class="mt-2 text-[13.5px] text-slate leading-relaxed"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></p>
            </div>
          </article>
          <?php endwhile; ?>
        </div>

        <nav aria-label="Search results pagination" class="reveal flex items-center justify-center gap-2 mt-14">
          <?php the_posts_pagination( array( 'prev_text' => '← Prev', 'next_text' => 'Next →' ) ); ?>
        </nav>

      <?php else : ?>

        <div class="reveal rounded-lg border border-hive p-10 text-center">
          <p class="text-[15px] text-ink font-medium">No results for "<?php echo esc_html( get_search_query() ); ?>"</p>
          <p class="text-[13.5px] text-slate mt-2">Try a different term, or browse recent articles in the sidebar.</p>
          <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="inline-flex items-center rounded-md bg-honey text-ink text-[13.5px] font-semibold px-5 py-2.5 mt-5 hover:bg-honeydark hover:text-paper transition-colors">Browse all articles</a>
        </div>

      <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>

  </section>

</main>

<?php get_footer(); ?>