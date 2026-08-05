<?php
/**
 * IT Support Bee Theme — functions.php
 * -----------------------------------------------------------------
 */

// ============================================================
// ASSET ENQUEUING (your existing code, unchanged)
// ============================================================

function itsupportbee_assets() {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/output.css',
        [],
        filemtime(get_template_directory() . '/assets/css/output.css')
    );
}

add_action('wp_enqueue_scripts', 'itsupportbee_assets');


function itsupportbee_scripts() {
    wp_enqueue_script(
        'itsupportbee-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true // Load before </body>
    );
}
add_action('wp_enqueue_scripts', 'itsupportbee_scripts');


// ============================================================
// THEME SETUP — required for most theme features to work at all
// ============================================================

function itsupportbee_setup() {

    // Makes the theme translatable (needed even if you only ever use English)
    load_theme_textdomain( 'itsupportbee', get_template_directory() . '/languages' );

    // Lets WordPress manage <title> tags instead of hardcoding them in header.php
    add_theme_support( 'title-tag' );

    // Featured images — the_post_thumbnail() calls throughout your templates
    // will silently do nothing without this line
    add_theme_support( 'post-thumbnails' );

    // Register the sizes your templates actually reference
    add_image_size( 'itsb-card', 600, 400, true );   // blog grid cards
    add_image_size( 'itsb-featured', 1200, 600, true ); // featured post / article header

    // Modern markup for search forms, comment forms, galleries, etc.
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ) );

    // RSS feed auto-discovery
    add_theme_support( 'automatic-feed-links' );

    // Nicer default embed/oEmbed sizing
    add_theme_support( 'responsive-embeds' );

    // Register the nav menu location your header.php calls wp_nav_menu() against
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'itsupportbee' ),
        'footer'  => __( 'Footer Menu', 'itsupportbee' ),
    ) );
    add_theme_support( 'custom-logo', array(
    'height'      => 80,
    'width'       => 80,
    'flex-height' => true,
    'flex-width'  => true,
) );
 
}
add_action( 'after_setup_theme', 'itsupportbee_setup' );


// Sets the max content width used by oEmbeds and image insertion (matches your max-w-6xl containers)
if ( ! isset( $content_width ) ) {
    $content_width = 1152;
}



/**
 * Add this to functions.php, alongside itsupportbee_assets().
 * Loads Font Awesome (Brands set is all you need for the footer icons,
 * but the full free CSS is simplest to enqueue as one file).
 */
function itsupportbee_fontawesome() {
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [],
        '6.5.2'
    );
}
add_action( 'wp_enqueue_scripts', 'itsupportbee_fontawesome' );


// ============================================================
// NEWSLETTER SIGNUP — handles the form built on the blog listing page
// ============================================================

// Create the subscribers table once, on theme activation
function itsupportbee_create_subscribers_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'itsb_subscribers';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        email VARCHAR(190) NOT NULL,
        subscribed_at DATETIME NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
}
add_action( 'after_switch_theme', 'itsupportbee_create_subscribers_table' );

// Handle the form submission (matches the form's action="…/subscribe/")
function itsupportbee_handle_newsletter_signup() {
    if ( ! isset( $_POST['newsletter_nonce'] ) || ! wp_verify_nonce( $_POST['newsletter_nonce'], 'newsletter_subscribe' ) ) {
        wp_die( 'Security check failed. Please go back and try again.' );
    }

    $email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

    if ( $email && is_email( $email ) ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'itsb_subscribers';
        $wpdb->query(
            $wpdb->prepare(
                "INSERT IGNORE INTO $table_name (email, subscribed_at) VALUES (%s, %s)",
                $email,
                current_time( 'mysql' )
            )
        );
        wp_safe_redirect( add_query_arg( 'subscribed', '1', wp_get_referer() ?: home_url( '/' ) ) );
    } else {
        wp_safe_redirect( add_query_arg( 'subscribed', '0', wp_get_referer() ?: home_url( '/' ) ) );
    }
    exit;
}
// Fires on any POST to /subscribe/
add_action( 'init', function () {
    if ( isset( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], '/subscribe' ) === 0 && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
        itsupportbee_handle_newsletter_signup();
    }
} );

// View subscribers in wp-admin: Tools → Newsletter Subscribers
function itsupportbee_subscribers_admin_page() {
    add_management_page(
        'Newsletter Subscribers',
        'Newsletter Subscribers',
        'manage_options',
        'itsb-subscribers',
        'itsupportbee_render_subscribers_page'
    );
}
add_action( 'admin_menu', 'itsupportbee_subscribers_admin_page' );

function itsupportbee_render_subscribers_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'itsb_subscribers';
    $subscribers = $wpdb->get_results( "SELECT email, subscribed_at FROM $table_name ORDER BY subscribed_at DESC" );
    ?>
    <div class="wrap">
        <h1>Newsletter Subscribers (<?php echo count( $subscribers ); ?>)</h1>
        <table class="widefat striped">
            <thead><tr><th>Email</th><th>Subscribed</th></tr></thead>
            <tbody>
            <?php foreach ( $subscribers as $s ) : ?>
                <tr>
                    <td><?php echo esc_html( $s->email ); ?></td>
                    <td><?php echo esc_html( $s->subscribed_at ); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}


// ============================================================
// SMALL QUALITY-OF-LIFE DEFAULTS
// ============================================================

// Matches your card copy pattern (wp_trim_words) sitewide as the excerpt default
function itsupportbee_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'itsupportbee_excerpt_length' );

function itsupportbee_excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'itsupportbee_excerpt_more' );

// Removes the WP version number from <head> — minor security-through-obscurity best practice
remove_action( 'wp_head', 'wp_generator' );

function itsupportbee_meta_tags() {

    // ---------- Resolve title, description, and image per page type ----------
    if ( is_front_page() ) {
        $title       = get_bloginfo( 'name' ) . ' — Remote Microsoft 365 & Google Workspace Support';
        $description = get_bloginfo( 'description' ) ?: 'Remote IT support, Microsoft 365 and Google Workspace administration, and cloud migration for growing businesses.';
        $url         = home_url( '/' );
        $image       = get_template_directory_uri() . '/assets/images/og-default.jpg';
        $og_type     = 'website';

    } elseif ( is_singular( 'post' ) ) {
        $title       = get_the_title() . ' | ' . get_bloginfo( 'name' );
        $description = get_the_excerpt() ?: wp_trim_words( get_the_content(), 30 );
        $url         = get_permalink();
        $image       = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_template_directory_uri() . '/assets/images/og-default.jpg';
        $og_type     = 'article';

    } elseif ( is_category() ) {
        $title       = single_cat_title( '', false ) . ' | ' . get_bloginfo( 'name' );
        $description = category_description() ?: 'Articles on ' . single_cat_title( '', false ) . ' from ' . get_bloginfo( 'name' ) . '.';
        $url         = get_category_link( get_queried_object_id() );
        $image       = get_template_directory_uri() . '/assets/images/og-default.jpg';
        $og_type     = 'website';

    } elseif ( is_page() ) {
        $title       = get_the_title() . ' | ' . get_bloginfo( 'name' );
        $description = get_the_excerpt() ?: get_bloginfo( 'description' );
        $url         = get_permalink();
        $image       = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_template_directory_uri() . '/assets/images/og-default.jpg';
        $og_type     = 'website';

    } elseif ( is_search() ) {
        $title       = 'Search results for "' . get_search_query() . '" | ' . get_bloginfo( 'name' );
        $description = '';
        $url         = home_url( '/?s=' . urlencode( get_search_query() ) );
        $image       = get_template_directory_uri() . '/assets/images/og-default.jpg';
        $og_type     = 'website';

    } else {
        // 404 and any other fallback
        $title       = get_bloginfo( 'name' );
        $description = get_bloginfo( 'description' );
        $url         = home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
        $image       = get_template_directory_uri() . '/assets/images/og-default.jpg';
        $og_type     = 'website';
    }

    $description = wp_strip_all_tags( $description );
    $description = mb_substr( $description, 0, 160 ); // Google generally truncates past ~160 chars anyway

    // ---------- Description ----------
    if ( $description ) {
        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    }

    // ---------- Canonical ----------
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";

    // ---------- Robots ----------
    // noindex search results and paginated archive pages beyond page 1 to avoid thin-content indexing
    if ( is_search() || ( is_paged() && ! is_singular() ) ) {
        echo '<meta name="robots" content="noindex,follow">' . "\n";
    } else {
        echo '<meta name="robots" content="index,follow">' . "\n";
    }

    // ---------- Open Graph ----------
    echo '<meta property="og:type" content="' . esc_attr( $og_type ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    if ( $description ) {
        echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    }
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";

    if ( 'article' === $og_type ) {
        echo '<meta property="article:published_time" content="' . esc_attr( get_the_date( 'c' ) ) . '">' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . "\n";
        $cats = get_the_category();
        if ( ! empty( $cats ) ) {
            echo '<meta property="article:section" content="' . esc_attr( $cats[0]->name ) . '">' . "\n";
        }
    }

    // ---------- Twitter Card ----------
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
    if ( $description ) {
        echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
    }
    echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
}
add_action( 'wp_head', 'itsupportbee_meta_tags', 1 );




/**
 * ============================================================
 * STRUCTURED DATA (JSON-LD)
 * ------------------------------------------------------------
 * Add this block to functions.php, alongside the code already there.
 *
 * All schema markup lives here instead of inside individual template
 * files. One hook, one function, branching by page type — so nothing
 * goes stale when content is edited in wp-admin, and nothing has to
 * be updated in six different files when something changes.
 * ============================================================
 */
 
function itsupportbee_schema_markup() {
 
    // ---------- Breadcrumb (used on every page except the homepage) ----------
    if ( ! is_front_page() ) {
        $breadcrumb_items = array(
            array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ),
        );
        $position = 2;
 
        if ( is_singular( 'post' ) ) {
            $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position++, 'name' => 'Blog', 'item' => get_permalink( get_option( 'page_for_posts' ) ) );
            $cats = get_the_category();
            if ( ! empty( $cats ) ) {
                $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position++, 'name' => $cats[0]->name, 'item' => get_category_link( $cats[0]->term_id ) );
            }
            $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position, 'name' => get_the_title(), 'item' => get_permalink() );
 
        } elseif ( is_category() ) {
            $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position++, 'name' => 'Blog', 'item' => get_permalink( get_option( 'page_for_posts' ) ) );
            $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position, 'name' => single_cat_title( '', false ), 'item' => get_category_link( get_queried_object_id() ) );
 
        } elseif ( is_page() ) {
            $ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
            foreach ( $ancestors as $ancestor_id ) {
                $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position++, 'name' => get_the_title( $ancestor_id ), 'item' => get_permalink( $ancestor_id ) );
            }
            $breadcrumb_items[] = array( '@type' => 'ListItem', 'position' => $position, 'name' => get_the_title(), 'item' => get_permalink() );
        }
 
        itsupportbee_output_schema( array(
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $breadcrumb_items,
        ) );
    }
 
    // ---------- Homepage: Organization ----------
    if ( is_front_page() ) {
        itsupportbee_output_schema( array(
            '@context'    => 'https://schema.org',
            '@type'       => 'Organization',
            'name'        => get_bloginfo( 'name' ),
            'url'         => home_url( '/' ),
            'description' => get_bloginfo( 'description' ),
            'areaServed'  => array( 'US', 'GB', 'AU', 'EU' ),
        ) );
    }
 
    // ---------- Single blog post: BlogPosting ----------
    if ( is_singular( 'post' ) ) {
        itsupportbee_output_schema( array(
            '@context'         => 'https://schema.org',
            '@type'            => 'BlogPosting',
            'headline'         => get_the_title(),
            'description'      => get_the_excerpt(),
            'datePublished'    => get_the_date( 'c' ),
            'dateModified'     => get_the_modified_date( 'c' ),
            'author'           => array( '@type' => 'Person', 'name' => get_the_author() ),
            'publisher'        => array( '@type' => 'Organization', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) ),
            'mainEntityOfPage' => get_permalink(),
            'image'            => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '',
        ) );
    }
 
    // ---------- Services overview page: Service + OfferCatalog ----------
    // Adjust the slug check to match your actual Services page.
    if ( is_page( 'services' ) ) {
        itsupportbee_output_schema( array(
            '@context'  => 'https://schema.org',
            '@type'     => 'Service',
            'provider'  => array( '@type' => 'Organization', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) ),
            'areaServed' => array( 'US', 'GB', 'AU', 'EU' ),
            'hasOfferCatalog' => array(
                '@type' => 'OfferCatalog',
                'name'  => 'IT Support Bee Services',
                'itemListElement' => array_map( function ( $name ) {
                    return array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => $name ) );
                }, array(
                    'Microsoft 365 Administration',
                    'Google Workspace Administration',
                    'Cloud and Email Migration',
                    'Email Deliverability',
                    'Remote IT Support',
                ) ),
            ),
        ) );
    }
 
    // ---------- Individual service detail pages: Service + FAQPage ----------
    // Works if each service is a child Page under /services/ using the slug as the key.
    if ( is_page() && ! is_page( 'services' ) && wp_get_post_parent_id( get_the_ID() ) && get_post( wp_get_post_parent_id( get_the_ID() ) )->post_name === 'services' ) {
 
        itsupportbee_output_schema( array(
            '@context'    => 'https://schema.org',
            '@type'       => 'Service',
            'name'        => get_the_title(),
            'serviceType' => 'IT Support',
            'provider'    => array( '@type' => 'Organization', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) ),
            'areaServed'  => array( 'US', 'GB', 'AU', 'EU' ),
            'description' => get_the_excerpt(),
        ) );
 
        // FAQ content per service — stored as post meta (ACF Repeater, or
        // register_post_meta + a metabox) with fields "faq_question" / "faq_answer".
        // This pulls whatever you've entered for THIS page rather than
        // hardcoding three fixed questions like the original mockup did.
        $faqs = get_post_meta( get_the_ID(), 'service_faqs', true ); // expects array of ['question'=>'', 'answer'=>'']
 
        if ( ! empty( $faqs ) && is_array( $faqs ) ) {
            itsupportbee_output_schema( array(
                '@context'  => 'https://schema.org',
                '@type'     => 'FAQPage',
                'mainEntity' => array_map( function ( $faq ) {
                    return array(
                        '@type'          => 'Question',
                        'name'           => $faq['question'],
                        'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $faq['answer'] ),
                    );
                }, $faqs ),
            ) );
        }
    }
 
    // ---------- Contact page ----------
    if ( is_page( 'contact' ) ) {
        itsupportbee_output_schema( array(
            '@context'   => 'https://schema.org',
            '@type'      => 'ContactPage',
            'url'        => get_permalink(),
            'about'      => array( '@type' => 'Organization', 'name' => get_bloginfo( 'name' ) ),
        ) );
    }
}
add_action( 'wp_head', 'itsupportbee_schema_markup' );
 
/**
 * Helper — prints a PHP array as a <script type="application/ld+json"> block.
 * Centralizing this one line avoids repeating json_encode()/escaping in
 * every branch above.
 */
function itsupportbee_output_schema( $data ) {
    echo '<script type="application/ld+json">' .
        wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) .
        '</script>' . "\n";
}


/**
 * ============================================================
 * TRACKING CODES — Settings → Tracking Codes
 * ------------------------------------------------------------
 * Add this whole block to functions.php. Creates one settings
 * page where you paste in your GA4, GTM, Bing, and Yandex IDs —
 * nothing hardcoded in template files, so updating an ID later
 * is a wp-admin form, not a code edit.
 * ============================================================
 */

// ---------- Register the settings ----------
function itsupportbee_tracking_settings_init() {
    register_setting( 'itsupportbee_tracking', 'itsb_ga4_id' );
    register_setting( 'itsupportbee_tracking', 'itsb_gtm_id' );
    register_setting( 'itsupportbee_tracking', 'itsb_bing_verification' );
    register_setting( 'itsupportbee_tracking', 'itsb_yandex_verification' );
}
add_action( 'admin_init', 'itsupportbee_tracking_settings_init' );

// ---------- Add the settings page under Settings ----------
function itsupportbee_tracking_settings_menu() {
    add_options_page(
        'Tracking Codes',
        'Tracking Codes',
        'manage_options',
        'itsb-tracking-codes',
        'itsupportbee_tracking_settings_page'
    );
}
add_action( 'admin_menu', 'itsupportbee_tracking_settings_menu' );

function itsupportbee_tracking_settings_page() {
    ?>
    <div class="wrap">
        <h1>Tracking Codes</h1>
        <p>Paste in IDs from each service. Leave any field blank to skip it — nothing outputs unless it's filled in.</p>
        <form method="post" action="options.php">
            <?php settings_fields( 'itsupportbee_tracking' ); ?>
            <table class="form-table">
                <tr>
                    <th><label for="itsb_ga4_id">Google Analytics 4 — Measurement ID</label></th>
                    <td>
                        <input type="text" id="itsb_ga4_id" name="itsb_ga4_id" value="<?php echo esc_attr( get_option( 'itsb_ga4_id' ) ); ?>" class="regular-text" placeholder="G-XXXXXXXXXX">
                        <p class="description">Found in GA4 → Admin → Data Streams → your stream.</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="itsb_gtm_id">Google Tag Manager — Container ID</label></th>
                    <td>
                        <input type="text" id="itsb_gtm_id" name="itsb_gtm_id" value="<?php echo esc_attr( get_option( 'itsb_gtm_id' ) ); ?>" class="regular-text" placeholder="GTM-XXXXXXX">
                        <p class="description">If you use GTM, manage GA4 and other tags INSIDE Tag Manager instead of filling in the GA4 field above too — running both directly causes duplicate pageviews.</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="itsb_bing_verification">Bing Webmaster — Verification code</label></th>
                    <td>
                        <input type="text" id="itsb_bing_verification" name="itsb_bing_verification" value="<?php echo esc_attr( get_option( 'itsb_bing_verification' ) ); ?>" class="regular-text" placeholder="content value only, not the full meta tag">
                        <p class="description">From Bing Webmaster Tools → Settings → Ownership Verification → "Meta tag" option, paste just the content="" value.</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="itsb_yandex_verification">Yandex Webmaster — Verification code</label></th>
                    <td>
                        <input type="text" id="itsb_yandex_verification" name="itsb_yandex_verification" value="<?php echo esc_attr( get_option( 'itsb_yandex_verification' ) ); ?>" class="regular-text" placeholder="content value only">
                        <p class="description">From Yandex Webmaster → site → "Meta tag" verification method.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Save Tracking Codes' ); ?>
        </form>
    </div>
    <?php
}

// ---------- Output: <head> section (verification meta tags, GA4, GTM head script) ----------
function itsupportbee_tracking_head() {
    $ga4_id    = get_option( 'itsb_ga4_id' );
    $gtm_id    = get_option( 'itsb_gtm_id' );
    $bing      = get_option( 'itsb_bing_verification' );
    $yandex    = get_option( 'itsb_yandex_verification' );

    if ( $bing ) {
        echo '<meta name="msvalidate.01" content="' . esc_attr( $bing ) . '">' . "\n";
    }
    if ( $yandex ) {
        echo '<meta name="yandex-verification" content="' . esc_attr( $yandex ) . '">' . "\n";
    }

    // GTM takes priority — if both GTM and a direct GA4 ID are filled in,
    // only load GTM to avoid double-counting pageviews (GA4 should be
    // configured as a tag inside GTM instead in that case).
    if ( $gtm_id ) {
        ?>
        <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?php echo esc_js( $gtm_id ); ?>');
        </script>
        <?php
    } elseif ( $ga4_id ) {
        ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ga4_id ); ?>"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_js( $ga4_id ); ?>');
        </script>
        <?php
    }
}
add_action( 'wp_head', 'itsupportbee_tracking_head', 2 ); // after meta tags (priority 1), before schema

// ---------- Output: GTM noscript fallback, must sit right after <body> ----------
function itsupportbee_tracking_body_open() {
    $gtm_id = get_option( 'itsb_gtm_id' );
    if ( $gtm_id ) {
        ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_id ); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <?php
    }
}
add_action( 'wp_body_open', 'itsupportbee_tracking_body_open' );


/**
 * Add this to functions.php.
 * ------------------------------------------------------------
 * Registers a widget area for the blog sidebar (so you can add/
 * reorder widgets from Appearance → Widgets without touching code)
 * and overrides WordPress's default search form markup with one
 * that matches the site's design tokens.
 */
 
function itsupportbee_widgets_init() {
    register_sidebar( array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'description'   => 'Appears on the blog listing and single post pages.',
        'before_widget' => '<div class="reveal rounded-lg border border-hive p-5 mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase mb-4">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'itsupportbee_widgets_init' );
 
 
/**
 * Custom search form — WordPress calls this automatically via
 * get_search_form() once a file named searchform.php exists in
 * the theme root, but this function version can also be hooked
 * in directly if you'd rather not rely on the file being found.
 */
function itsupportbee_search_form( $form ) {
    $unique_id = 'search-' . wp_rand();
    ob_start();
    ?>
    <form role="search" method="get" class="flex items-stretch gap-2" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label for="<?php echo esc_attr( $unique_id ); ?>" class="sr-only">Search</label>
        <input
            type="search"
            id="<?php echo esc_attr( $unique_id ); ?>"
            class="flex-1 rounded-md border border-hive px-3 py-2.5 text-[13.5px] text-ink placeholder:text-slate focus-visible:outline-2 focus-visible:outline-honey"
            placeholder="Search articles…"
            value="<?php echo get_search_query(); ?>"
            name="s"
        />
        <button type="submit" class="rounded-md bg-ink text-paper px-3.5 flex items-center justify-center hover:bg-honeydark transition-colors" aria-label="Submit search">
            <svg width="15" height="15" viewBox="0 0 20 20" fill="none"><circle cx="9" cy="9" r="6.5" stroke="currentColor" stroke-width="1.6"/><path d="M18 18l-4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        </button>
    </form>
    <?php
    return ob_get_clean();
}
add_filter( 'get_search_form', 'itsupportbee_search_form' );
