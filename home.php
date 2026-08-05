<?php

get_header();
?>

<!-- ============ BREADCRUMB ============ -->
<nav aria-label="Breadcrumb" class="w-full border-b border-hive bg-paper">
  <ol class="max-w-6xl mx-auto px-6 py-3 flex items-center gap-2 text-[13px] font-mono text-slate" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex items-center gap-2">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item" class="hover:text-ink transition-colors"><span itemprop="name">Home</span></a>
      <meta itemprop="position" content="1">
      <span class="text-hive" aria-hidden="true">/</span>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex items-center gap-2" aria-current="page">
      <span itemprop="name" class="text-ink"><?php is_category() ? single_cat_title() : print( 'Blog' ); ?></span>
      <meta itemprop="item" content="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
      <meta itemprop="position" content="2">
    </li>
  </ol>
</nav>

<main class="w-full">

<!-- ============ PAGE INTRO ============ -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-12 md:pt-20">
  <div class="reveal max-w-2xl">
    <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">The blog</p>
    <?php if ( is_category() ) : ?>
      <h1 class="font-display font-extrabold text-[32px] md:text-[44px] leading-[1.1] tracking-tight text-ink"><?php single_cat_title(); ?></h1>
      <p class="mt-5 text-[16px] text-slate leading-relaxed"><?php echo esc_html( category_description() ); ?></p>
    <?php else : ?>
      <h1 class="font-display font-extrabold text-[32px] md:text-[44px] leading-[1.1] tracking-tight text-ink">Insights on Microsoft 365, Google Workspace, and IT support</h1>
      <p class="mt-5 text-[16px] text-slate leading-relaxed">Practical guides to help your business manage cloud platforms, secure email, and avoid the IT pitfalls that cost you time.</p>
    <?php endif; ?>
  </div>
</section>

<!-- ============ CATEGORY FILTER ============ -->
<section class="max-w-6xl mx-auto px-6 pb-10">
  <div class="reveal flex flex-wrap gap-2.5" role="tablist" aria-label="Filter posts by category">
    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
       class="px-4 py-2 rounded-full text-[13px] font-medium <?php echo ! is_category() ? 'bg-ink text-paper' : 'border border-hive text-slate hover:border-honey hover:text-ink transition-colors'; ?>"
       role="tab" aria-selected="<?php echo ! is_category() ? 'true' : 'false'; ?>">All Posts</a>

    <?php
    $categories = get_categories( array( 'hide_empty' => false ) );
    foreach ( $categories as $cat ) :
        $is_active = is_category( $cat->term_id );
    ?>
      <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
         class="px-4 py-2 rounded-full text-[13px] font-medium <?php echo $is_active ? 'bg-ink text-paper' : 'border border-hive text-slate hover:border-honey hover:text-ink transition-colors'; ?>"
         role="tab" aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"><?php echo esc_html( $cat->name ); ?></a>
    <?php endforeach; ?>
  </div>
</section>

<!-- ============ FEATURED POST ============ -->
<?php
// Only show the featured/sticky post on the main blog index, not on
// filtered category views, so it doesn't repeat across every category.
if ( ! is_category() ) {
    get_template_part( 'template-parts/featured-post' );
}
?>

<!-- ============ BLOG GRID + PAGINATION ============ -->
<?php
/**
 * Blog Grid — Recent Articles
 * -----------------------------------------------------------------
 * FIXED: no longer relies on the global loop (have_posts() / the_post()).
 * This template runs on a regular Page (confirmed by "Edit Page" in the
 * admin bar), so the global query only ever contains the Page itself,
 * not your blog posts. It now runs its own WP_Query instead, the same
 * pattern already used in template-parts/featured-post.php.
 * -----------------------------------------------------------------
 */
 
// Handle pagination on both a normal page and a static front page
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
 
$sticky = get_option( 'sticky_posts' );
 
$blog_query = new WP_Query( array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => get_option( 'posts_per_page' ),
    'paged'               => $paged,
    'post__not_in'        => $sticky,      // exclude the featured/sticky post shown above
    'ignore_sticky_posts'=> 1,
    'orderby'             => 'date',
    'order'               => 'DESC',
) );
?>
 
<?php if ( $blog_query->have_posts() ) : ?>
 
<section class="max-w-6xl mx-auto px-6 pb-20">
  <h2 class="sr-only">Recent articles</h2>
  <div class="grid md:grid-cols-3 gap-6">
 
    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
 
      $category = get_the_category();
      $primary_category = ! empty( $category ) ? $category[0] : null;
 
      $content    = get_post_field( 'post_content', get_the_ID() );
      $word_count = str_word_count( wp_strip_all_tags( $content ) );
      $read_time  = max( 1, ceil( $word_count / 200 ) );
    ?>
 
    <article class="reveal post-card rounded-lg border border-hive overflow-hidden hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300">
      <a href="<?php the_permalink(); ?>" aria-hidden="true">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'medium_large', array(
              'class'   => 'w-full aspect-[3/2] object-cover',
              'loading' => 'lazy',
          ) ); ?>
        <?php else : ?>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/post-fallback.jpg' ); ?>" alt="" class="w-full aspect-3/2 object-cover" loading="lazy" width="600" height="400">
        <?php endif; ?>
      </a>
      <div class="p-5">
        <?php if ( $primary_category ) : ?>
          <span class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase">
            <a href="<?php echo esc_url( get_category_link( $primary_category->term_id ) ); ?>" class="hover:text-ink transition-colors">
              <?php echo esc_html( $primary_category->name ); ?>
            </a>
          </span>
        <?php endif; ?>
 
        <h3 class="font-display font-bold text-[16px] mt-2.5 leading-snug">
          <a href="<?php the_permalink(); ?>" class="hover:text-honeydark transition-colors">
            <?php the_title(); ?>
          </a>
        </h3>
 
        <p class="mt-2 text-[13.5px] text-slate leading-relaxed">
          <?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?>
        </p>
 
        <div class="mt-4 flex items-center gap-3 text-[12px] font-mono text-slate">
          <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
            <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
          </time>
          <span aria-hidden="true">&middot;</span>
          <span><?php echo esc_html( $read_time ); ?> min read</span>
        </div>
      </div>
    </article>
 
    <?php endwhile; ?>
 
  </div>
 
  <!-- ============ PAGINATION ============ -->
  <?php if ( $blog_query->max_num_pages > 1 ) : ?>
  <nav aria-label="Blog pagination" class="reveal flex items-center justify-center gap-2 mt-14">
    <?php
    echo paginate_links( array(
        'base'         => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
        'format'       => '?paged=%#%',
        'current'      => max( 1, $paged ),
        'total'        => $blog_query->max_num_pages,
        'mid_size'     => 2,
        'prev_text'    => '← Prev',
        'next_text'    => 'Next →',
        'type'         => 'list',
    ) );
    ?>
  </nav>
  <?php endif; ?>
 
</section>
 
<?php
// Restore the main query so anything after this template part
// (widgets, other loops) isn't affected by our custom query.
wp_reset_postdata();
?>
 
<?php else : ?>
 
  <section class="max-w-6xl mx-auto px-6 pb-20 text-center">
    <p class="text-[14.5px] text-slate">No articles published yet, check back soon.</p>
  </section>
 
<?php wp_reset_postdata(); endif; ?>

<!-- ============ NEWSLETTER ============ -->
<!-- WP NOTE: this form needs a real handler. Options: swap in a
     Mailchimp/ConvertKit plugin's shortcode, or a Contact Form 7 form
     configured to add the email to your list via its Mailchimp
     integration, or wire the action="" up to your own REST endpoint. -->
<section class="bg-cell text-paper w-full">
  <div class="max-w-6xl mx-auto px-6 py-16 md:py-20 text-center">
    <h2 class="reveal font-display font-extrabold text-[26px] md:text-[32px] tracking-tight">Stay updated</h2>
    <p class="reveal mt-3 text-[14.5px] text-hive/70 max-w-md mx-auto">Practical Microsoft 365 and Google Workspace tips, delivered straight to your inbox.</p>
    <form class="reveal mt-7 flex flex-col sm:flex-row gap-3 max-w-md mx-auto" action="<?php echo esc_url( home_url( '/subscribe/' ) ); ?>" method="post">
      <label for="newsletter-email" class="sr-only">Email address</label>
      <input id="newsletter-email" type="email" name="email" required placeholder="you@company.com" class="flex-1 rounded-md px-4 py-3 text-[14px] text-ink bg-paper placeholder:text-slate focus-visible:outline-2 focus-visible:outline-honey">
      <?php wp_nonce_field( 'newsletter_subscribe', 'newsletter_nonce' ); ?>
      <button type="submit" class="rounded-md bg-honey text-ink text-[14px] font-semibold px-6 py-3 hover:bg-paper transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey">Subscribe</button>
    </form>
  </div>
</section>

</main>

<?php get_footer(); ?>