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
  <div class="reveal rounded-lg border border-hive p-7 md:p-9 bg-white">
    <h2 class="font-display font-bold text-[20px] mb-6">Send a message</h2>

    <!--
      ============================================================
      WP NOTE — Replace the static <form> block below with:
        [contact-form-7 id="123" title="Contact Form"]
      Then paste this exact template into the CF7 admin editor so
      field names match the styling hooks above one-for-one:
      ============================================================

      <p><label>Name*<br>[text* your-name]</label></p>
      <p><label>Email*<br>[email* your-email]</label></p>
      <p><label>Company Name<br>[text your-company]</label></p>
      <p><label>Service Interested In*<br>
        [select* your-service "Microsoft 365 Administration"
          "Google Workspace Administration" "Cloud/Email Migration"
          "Email Deliverability" "Remote IT Support" "Not Sure / Other"]
      </label></p>
      <p><label>Message*<br>[textarea* your-message]</label></p>
      <p>[submit "Send Message"]</p>

      Mail tab: set "To" as your inbox, and add {your-name} / {your-service}
      into the Subject line so leads are pre-sorted by service.
    -->
    <form class="wpcf7-form space-y-1" action="#" method="post">
      <p>
        <label for="your-name">Name*</label>
        <input type="text" id="your-name" name="your-name" required class="wpcf7-form-control">
      </p>
      <p>
        <label for="your-email">Email*</label>
        <input type="email" id="your-email" name="your-email" required class="wpcf7-form-control">
      </p>
      <p>
        <label for="your-company">Company name</label>
        <input type="text" id="your-company" name="your-company" class="wpcf7-form-control">
      </p>
      <p>
        <label for="your-service">Service interested in*</label>
        <select id="your-service" name="your-service" required class="wpcf7-select wpcf7-form-control">
          <option value="">Select one</option>
          <option>Microsoft 365 Administration</option>
          <option>Google Workspace Administration</option>
          <option>Cloud/Email Migration</option>
          <option>Email Deliverability</option>
          <option>Remote IT Support</option>
          <option>Not Sure / Other</option>
        </select>
      </p>
      <p>
        <label for="your-message">Message*</label>
        <textarea id="your-message" name="your-message" required class="wpcf7-form-control"></textarea>
      </p>
      <p>
        <input type="submit" value="Send Message" class="wpcf7-submit">
      </p>
    </form>
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
        <li class="flex items-center gap-3">
          <span class="hex w-6 h-6 bg-ink shrink-0"></span>
          <a href="#" class="hover:text-honeydark transition-colors">View our Upwork profile</a>
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