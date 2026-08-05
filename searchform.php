<?php
/**
 * searchform.php — theme root.
 * WordPress automatically uses this file when get_search_form()
 * is called, no registration needed, it's found by filename alone.
 * (The itsupportbee_search_form() filter version in functions.php
 * does the same thing — you only need one of the two; this file
 * is the more conventional WP approach and is what the rest of
 * this answer assumes is in place.)
 */
$unique_id = 'search-' . wp_rand();
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