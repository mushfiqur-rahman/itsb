<?php get_header(); ?>

<!-- ============ BREADCRUMB ============ -->
<nav aria-label="Breadcrumb" class="w-full border-b border-hive bg-paper">
  <ol class="max-w-6xl mx-auto px-6 py-3 flex items-center gap-2 text-[13px] font-mono text-slate">
    <li class="flex items-center gap-2"><a href="/" class="hover:text-ink transition-colors">Home</a><span class="text-hive" aria-hidden="true">/</span></li>
    <li aria-current="page" class="text-ink">Contact</li>
  </ol>
</nav>

<main class="w-full">

<!-- ============ HERO ============ -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-4 md:pt-20">
  <div class="reveal max-w-2xl">
    <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">Get in touch</p>
    <h1 class="font-display font-extrabold text-[32px] md:text-[44px] leading-[1.1] tracking-tight text-ink">Let's talk about your IT needs</h1>
    <p class="mt-5 text-[16px] text-slate leading-relaxed">Whether you're migrating platforms, tightening email security, or need ongoing support, we'll respond within one business day.</p>
  </div>
</section>

<!-- ============ FORM + DIRECT CONTACT ============ -->
<section class="max-w-6xl mx-auto px-6 py-14 grid md:grid-cols-[1.2fr_0.8fr] gap-10 items-start">

  <!-- CONTACT FORM -->
<div class="reveal rounded-lg border border-hive p-7 md:p-9">
  <h2 class="font-display font-bold text-[20px] mb-6">Send a message</h2>
 
  <?php echo do_shortcode( '[contact-form-7 id="5e60b22" title="Contact form 1"]' ); ?>
 
</div>



  <!-- DIRECT CONTACT + REASSURANCE -->
  <div class="reveal space-y-8">
    <div>
      <h2 class="font-display font-bold text-[16px] mb-3">Prefer to reach out directly?</h2>
      <ul class="space-y-2.5 text-[14.5px]">
        <li class="flex items-center gap-3">
          <span class="hex w-6 h-6 bg-ink shrink-0"></span>
          <a href="mailto:hello@itsupportbee.com" class="hover:text-honeydark transition-colors">hello@itsupportbee.com</a>
        </li>
        <li class="flex items-center gap-3">
          <span class="hex w-6 h-6 bg-ink shrink-0"></span>
          <a href="#" class="hover:text-honeydark transition-colors">Schedule a free consultation</a>
        </li>
        
      </ul>
    </div>

    <div class="rounded-lg bg-cell text-paper p-6">
      <p class="font-mono text-[11px] tracking-[0.06em] text-honey uppercase mb-2">Response time</p>
      <p class="text-[14px] text-hive/80 leading-relaxed">We typically respond within 24 hours. Existing clients should use their direct support channel for urgent issues.</p>
    </div>

    <div>
      <p class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase mb-2">Where we work</p>
      <p class="text-[14px] text-slate leading-relaxed">Remote IT support for businesses across the US, UK, Australia, and Europe, wherever your team is located.</p>
    </div>
  </div>
</section>

  <!-- ============ MAP ============ -->
<!-- Insert this section into your Contact page template, after the
     form + direct-contact grid and before the FAQ section. -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <div class="reveal rounded-lg border border-hive overflow-hidden">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158828.30880249548!2d-0.22481744999454065!3d51.53720283510586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xaf628d6603d858bf%3A0x9a269c545e6eae7e!2sIT%20Support%20Bee!5e0!3m2!1sen!2sbd!4v1785921774428!5m2!1sen!2sbd"
      width="100%"
      height="360"
      style="border:0; display:block;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="strict-origin-when-cross-origin"
      title="IT Support Bee location on Google Maps">
    </iframe>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-16 md:py-20">
    <h2 class="reveal font-display font-bold text-[22px] mb-8">Common questions</h2>
    <div class="grid md:grid-cols-2 gap-x-10 gap-y-6">
      <div class="reveal">
        <h3 class="font-display font-bold text-[15px]">Do you work with businesses outside the US?</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Yes. We support clients across the US, UK, Australia, and Europe.</p>
      </div>
      <div class="reveal">
        <h3 class="font-display font-bold text-[15px]">Do you offer one-time projects or ongoing support?</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Both. We handle one-time migrations as well as ongoing administration and support contracts.</p>
      </div>
      <div class="reveal">
        <h3 class="font-display font-bold text-[15px]">How quickly can you start?</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Most engagements begin within a few days of an initial consultation.</p>
      </div>
      <div class="reveal">
        <h3 class="font-display font-bold text-[15px]">Is the consultation really free?</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Yes, no obligation. It's a 15-minute call to understand your setup and see if we're a fit.</p>
      </div>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>