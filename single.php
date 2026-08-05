<?php
/**
 * Single Post Template — single.php
 * -----------------------------------------------------------------
 * Built from the provided loop skeleton. get_header() / get_footer()
 * are assumed to already contain the site nav and footer markup
 * from the earlier page conversions.
 * -----------------------------------------------------------------
 */
get_header();
?>

<?php while ( have_posts() ) : the_post();

    // ---- Prep data used in multiple places below ----
    $categories       = get_the_category();
    $primary_category = ! empty( $categories ) ? $categories[0] : null;

    $content    = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $read_time  = max( 1, ceil( $word_count / 200 ) );

    // ---- Auto-build a Table of Contents from the post's H2s ----
    // Adds an id="" to each H2 in the rendered content and collects
    // matching TOC entries in the same pass.
    $toc_items    = array();
    $post_content = apply_filters( 'the_content', get_the_content() );

    $post_content = preg_replace_callback(
        '/<h2([^>]*)>(.*?)<\/h2>/i',
        function ( $matches ) use ( &$toc_items ) {
            $text = wp_strip_all_tags( $matches[2] );
            $slug = sanitize_title( $text );
            $toc_items[] = array( 'slug' => $slug, 'text' => $text );
            return '<h2' . $matches[1] . ' id="' . esc_attr( $slug ) . '">' . $matches[2] . '</h2>';
        },
        $post_content
    );
?>

<!-- ============ BREADCRUMB ============ -->
<nav aria-label="Breadcrumb" class="w-full border-b border-hive bg-paper">
  <ol class="max-w-6xl mx-auto px-6 py-3 flex items-center gap-2 text-[13px] font-mono text-slate flex-wrap">
    <li class="flex items-center gap-2">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-ink transition-colors">Home</a>
      <span class="text-hive" aria-hidden="true">/</span>
    </li>
    <li class="flex items-center gap-2">
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="hover:text-ink transition-colors">Blog</a>
      <span class="text-hive" aria-hidden="true">/</span>
    </li>
    <?php if ( $primary_category ) : ?>
    <li class="flex items-center gap-2">
      <a href="<?php echo esc_url( get_category_link( $primary_category->term_id ) ); ?>" class="hover:text-ink transition-colors"><?php echo esc_html( $primary_category->name ); ?></a>
      <span class="text-hive" aria-hidden="true">/</span>
    </li>
    <?php endif; ?>
    <li aria-current="page" class="text-ink truncate max-w-55 sm:max-w-none"><?php the_title(); ?></li>
  </ol>
</nav>

<main class="w-full">

<!-- ============ ARTICLE HEADER ============ -->
<header class="max-w-3xl mx-auto px-6 pt-14 pb-8">
  <?php if ( $primary_category ) : ?>
    <span class="reveal font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase">
      <a href="<?php echo esc_url( get_category_link( $primary_category->term_id ) ); ?>" class="hover:text-ink transition-colors"><?php echo esc_html( $primary_category->name ); ?></a>
    </span>
  <?php endif; ?>

  <h1 class="reveal font-display font-extrabold text-[28px] md:text-[40px] leading-[1.15] tracking-tight text-ink mt-3">
    <?php the_title(); ?>
  </h1>

  <div class="reveal flex items-center gap-3 mt-5 text-[13px] font-mono text-slate">
    <span>By <?php the_author(); ?></span>
    <span aria-hidden="true">&middot;</span>
    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
    <span aria-hidden="true">&middot;</span>
    <span><?php echo esc_html( $read_time ); ?> min read</span>
  </div>
</header>

<?php if ( has_post_thumbnail() ) : ?>
<div class="reveal max-w-5xl mx-auto px-6">
  <?php the_post_thumbnail( 'large', array(
      'class' => 'w-full rounded-lg aspect-[2/1] object-cover',
  ) ); ?>
</div>
<?php endif; ?>

<!-- ============ BODY + TOC ============ -->
<section class="max-w-5xl mx-auto px-6 py-14 grid md:grid-cols-[200px_1fr] gap-12">

  <?php if ( ! empty( $toc_items ) ) : ?>
  <!-- TABLE OF CONTENTS — auto-generated from this post's H2s -->
  <aside class="reveal hidden md:block">
    <nav aria-label="Table of contents" class="sticky top-24">
      <p class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase mb-4">On this page</p>
      <ol class="space-y-3 text-[13px] text-slate">
        <?php foreach ( $toc_items as $i => $item ) : ?>
          <li><a href="#<?php echo esc_attr( $item['slug'] ); ?>" class="hover:text-ink transition-colors"><?php echo $i + 1; ?>. <?php echo esc_html( $item['text'] ); ?></a></li>
        <?php endforeach; ?>
      </ol>
    </nav>
  </aside>
  <?php endif; ?>

  <!-- ARTICLE BODY -->
  <article class="post-body reveal <?php echo empty( $toc_items ) ? 'md:col-span-2' : ''; ?>">
    <?php echo $post_content; // already passed through the_content filters above ?>
  </article>
</section>

<!-- ============ AUTHOR BIO + SHARE ============ -->
<section class="max-w-3xl mx-auto px-6 pb-14">
  <div class="reveal flex flex-col sm:flex-row sm:items-center justify-between gap-6 rounded-lg border border-hive p-6">
    <div class="flex items-center gap-4">
      <?php echo get_avatar( get_the_author_meta( 'ID' ), 44, '', '', array( 'class' => 'hex w-11 h-11 flex-shrink-0' ) ); ?>
      <div>
        <p class="font-display font-bold text-[14px]"><?php the_author(); ?></p>
        <p class="text-[13px] text-slate"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <span class="text-[12px] font-mono text-slate uppercase tracking-wide">Share</span>
      <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey transition-colors">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="#565C6B"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.22 8.24h4.56V23H.22V8.24zM8.5 8.24h4.37v2.02h.06c.61-1.15 2.1-2.36 4.32-2.36 4.62 0 5.47 3.04 5.47 7v8.1h-4.56v-7.18c0-1.71-.03-3.92-2.39-3.92-2.39 0-2.76 1.87-2.76 3.8V23H8.5V8.24z"/></svg>
      </a>
      <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" target="_blank" rel="noopener" aria-label="Share on X" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey transition-colors">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="#565C6B"><path d="M18.9 2H22l-7.6 8.7L23.3 22h-7.1l-5.6-7.3L4.2 22H1l8.1-9.3L.9 2H8.2l5 6.7L18.9 2z"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ============ RELATED POSTS ============ -->
<?php
$related_ids = array();
if ( $primary_category ) {
    $related = new WP_Query( array(
        'category__in'   => array( $primary_category->term_id ),
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
    ) );

    if ( $related->have_posts() ) :
        $related_ids = wp_list_pluck( $related->posts, 'ID' );
?>
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-20 md:py-24">
    <h2 class="reveal font-display font-bold text-[20px] mb-8">Related articles</h2>
    <div class="grid md:grid-cols-3 gap-6">
      <?php while ( $related->have_posts() ) : $related->the_post();
        $rel_cats = get_the_category();
        $rel_cat  = ! empty( $rel_cats ) ? $rel_cats[0] : null;
      ?>
      <article class="reveal post-card rounded-lg border border-hive overflow-hidden hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300">
        <a href="<?php the_permalink(); ?>" aria-hidden="true">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full aspect-[3/2] object-cover', 'loading' => 'lazy' ) ); ?>
          <?php else : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/post-fallback.jpg' ); ?>" alt="" class="w-full aspect-3/2 object-cover" loading="lazy" width="600" height="400">
          <?php endif; ?>
        </a>
        <div class="p-5">
          <?php if ( $rel_cat ) : ?>
            <span class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase"><?php echo esc_html( $rel_cat->name ); ?></span>
          <?php endif; ?>
          <h3 class="font-display font-bold text-[15px] mt-2.5 leading-snug">
            <a href="<?php the_permalink(); ?>" class="hover:text-honeydark transition-colors"><?php the_title(); ?></a>
          </h3>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; } ?>

<!-- ============ CLOSING CTA ============ -->
<section class="bg-cell text-paper w-full">
  <div class="max-w-6xl mx-auto px-6 py-20 md:py-24 text-center">
    <h2 class="reveal font-display font-extrabold text-[26px] md:text-[34px] tracking-tight max-w-lg mx-auto">Want us to handle this for you?</h2>
    <p class="reveal mt-4 text-[14.5px] text-hive/70 max-w-md mx-auto">Free 15-minute consultation. We'll map out a plan together.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="reveal inline-flex items-center rounded-md bg-honey text-ink text-[14px] font-semibold px-7 py-3.5 mt-8 hover:bg-paper transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey">Book a free consultation</a>
  </div>
</section>

</main>

<?php endwhile; ?>

<?php get_footer(); ?>