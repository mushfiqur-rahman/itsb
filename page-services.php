<?php get_header(); ?>

<main class="w-full">

<!-- ============ BREADCRUMB ============ -->
<nav aria-label="Breadcrumb" class="w-full border-b border-hive bg-paper">
  <ol class="max-w-6xl mx-auto px-6 py-3 flex items-center gap-2 text-[13px] font-mono text-slate">
    <li class="flex items-center gap-2"><a href="/" class="hover:text-ink transition-colors">Home</a><span class="text-hive" aria-hidden="true">/</span></li>
    <li aria-current="page" class="text-ink">Services</li>
  </ol>
</nav>

<!-- ============ HERO ============ -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-14 md:pt-20 grid md:grid-cols-[1.2fr_0.8fr] gap-10 items-center">
  <div class="reveal">
    <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">Services</p>
    <h1 class="font-display font-extrabold text-[32px] md:text-[44px] leading-[1.1] tracking-tight text-ink">IT support built around Microsoft 365 and Google Workspace</h1>
    <p class="mt-5 text-[16px] text-slate leading-relaxed max-w-lg">From setup and migration to ongoing support, we help businesses across the US, UK, Australia, and Europe run secure, reliable cloud environments.</p>
    <a href="#contact-cta" class="mt-7 inline-flex items-center rounded-md bg-honey text-ink text-[14px] font-semibold px-6 py-3.5 hover:bg-honeydark hover:text-paper transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ink">Book a free consultation</a>
  </div>
  <div class="reveal hidden md:flex items-center justify-center">
    <div class="relative w-56 h-56">
      <div class="hex absolute inset-0 bg-cell"></div>
      <div class="absolute inset-0 flex flex-col items-center justify-center px-8 text-center gap-1">
        <span class="font-mono text-[11px] tracking-widest text-honey uppercase">Focused, not general</span>
        <p class="font-mono text-[12px] text-paper/90 mt-1">5 specialties<br>0 generalist guesswork</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ SERVICES OVERVIEW — HONEYCOMB ============ -->
<section class="max-w-6xl mx-auto px-6 pb-24">
  <p class="reveal font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-6">Jump to a service</p>
  <div class="grid grid-cols-6 gap-4 md:gap-5">
    <a href="#m365" class="reveal col-span-6 md:col-span-2 rounded-lg border border-hive p-6 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
      <span class="hex w-9 h-9 bg-ink flex items-center justify-center"><span class="font-mono text-[9px] text-paper">M365</span></span>
      <h2 class="font-display font-bold text-[16px] mt-4">Microsoft 365 Administration</h2>
      <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Setup, licensing, and day-to-day admin.</p>
    </a>
    <a href="#gws" class="reveal col-span-6 md:col-span-2 rounded-lg border border-hive p-6 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
      <span class="hex w-9 h-9 bg-ink flex items-center justify-center"><span class="font-mono text-[9px] text-paper">GWS</span></span>
      <h2 class="font-display font-bold text-[16px] mt-4">Google Workspace Administration</h2>
      <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Full admin support for Gmail and Drive.</p>
    </a>
    <a href="#migration" class="reveal col-span-6 md:col-span-2 rounded-lg border border-hive p-6 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
      <span class="hex w-9 h-9 bg-ink flex items-center justify-center"><span class="font-mono text-[9px] text-paper">MIG</span></span>
      <h2 class="font-display font-bold text-[16px] mt-4">Cloud & Email Migration</h2>
      <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Zero data loss, minimal downtime.</p>
    </a>
    <a href="#deliverability" class="reveal col-span-6 md:col-start-2 md:col-span-2 rounded-lg border border-hive p-6 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
      <span class="hex w-9 h-9 bg-ink flex items-center justify-center"><span class="font-mono text-[9px] text-paper">SPF</span></span>
      <h2 class="font-display font-bold text-[16px] mt-4">Email Deliverability</h2>
      <p class="text-[13.5px] text-slate mt-2 leading-relaxed">SPF, DKIM, DMARC, and DNS.</p>
    </a>
    <a href="#remote-support" class="reveal col-span-6 md:col-start-4 md:col-span-2 rounded-lg border border-hive p-6 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
      <span class="hex w-9 h-9 bg-ink flex items-center justify-center"><span class="font-mono text-[9px] text-paper">RIT</span></span>
      <h2 class="font-display font-bold text-[16px] mt-4">Remote IT Support</h2>
      <p class="text-[13.5px] text-slate mt-2 leading-relaxed">Windows, macOS, and Linux, remote.</p>
    </a>
  </div>
</section>

<!-- ============ DETAILED BREAKDOWN ============ -->
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-24 md:py-28 space-y-20">

    <article id="m365" class="reveal grid md:grid-cols-[auto_1fr] gap-6 items-start scroll-mt-24">
      <span class="hex w-12 h-12 bg-ink flex items-center justify-center shrink-0"><span class="font-mono text-[10px] text-paper">M365</span></span>
      <div>
        <h3 class="font-display font-bold text-[20px]">Microsoft 365 Administration</h3>
        <p class="mt-2.5 text-[14.5px] text-slate leading-relaxed max-w-2xl">Full setup, configuration, and ongoing administration of your Microsoft 365 environment: user provisioning, licensing management, security policy configuration, Exchange Online administration, and Teams/SharePoint support.</p>
      </div>
    </article>

    <article id="gws" class="reveal grid md:grid-cols-[auto_1fr] gap-6 items-start scroll-mt-24">
      <span class="hex w-12 h-12 bg-ink flex items-center justify-center shrink-0"><span class="font-mono text-[10px] text-paper">GWS</span></span>
      <div>
        <h3 class="font-display font-bold text-[20px]">Google Workspace Administration</h3>
        <p class="mt-2.5 text-[14.5px] text-slate leading-relaxed max-w-2xl">End-to-end administrative support for Gmail, Drive, Calendar, and Workspace security settings: user management, group policies, security configuration, and day-to-day admin support.</p>
      </div>
    </article>

    <article id="migration" class="reveal grid md:grid-cols-[auto_1fr] gap-6 items-start scroll-mt-24">
      <span class="hex w-12 h-12 bg-ink flex items-center justify-center shrink-0"><span class="font-mono text-[10px] text-paper">MIG</span></span>
      <div>
        <h3 class="font-display font-bold text-[20px]">Cloud and Email Migration</h3>
        <p class="mt-2.5 text-[14.5px] text-slate leading-relaxed max-w-2xl">Seamless migration to Microsoft 365 or Google Workspace from GoDaddy, on-premise servers, or other platforms. We handle data transfer, DNS updates, and testing to ensure zero downtime and zero data loss.</p>
      </div>
    </article>

    <article id="deliverability" class="reveal grid md:grid-cols-[auto_1fr] gap-6 items-start scroll-mt-24">
      <span class="hex w-12 h-12 bg-ink flex items-center justify-center shrink-0"><span class="font-mono text-[10px] text-paper">SPF</span></span>
      <div>
        <h3 class="font-display font-bold text-[20px]">Email Deliverability</h3>
        <p class="mt-2.5 text-[14.5px] text-slate leading-relaxed max-w-2xl">Configuration of SPF, DKIM, DMARC, and DNS records to protect your domain reputation, prevent spoofing, and keep your emails out of spam folders.</p>
      </div>
    </article>

    <article id="remote-support" class="reveal grid md:grid-cols-[auto_1fr] gap-6 items-start scroll-mt-24">
      <span class="hex w-12 h-12 bg-ink flex items-center justify-center shrink-0"><span class="font-mono text-[10px] text-paper">RIT</span></span>
      <div>
        <h3 class="font-display font-bold text-[20px]">Remote IT Support</h3>
        <p class="mt-2.5 text-[14.5px] text-slate leading-relaxed max-w-2xl">On-demand troubleshooting for Windows, macOS, and Linux systems. Fast response times for day-to-day technical issues, wherever your team is located.</p>
      </div>
    </article>

  </div>
</section>

<!-- ============ WHO THIS IS FOR ============ -->
<section class="max-w-6xl mx-auto px-6 py-24 md:py-28">
  <div class="reveal grid md:grid-cols-[1fr_1.3fr] gap-10 items-center">
    <div>
      <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">Who this is for</p>
      <h2 class="font-display font-extrabold text-[28px] md:text-[34px] tracking-tight">Built for growing businesses</h2>
    </div>
    <p class="text-[15px] text-slate leading-relaxed">Small and medium businesses that need dependable IT support and cloud administration, but don't need, or can't yet justify, a full-time in-house IT team.</p>
  </div>
</section>

<!-- ============ PROCESS ============ -->
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-24 md:py-28">
    <div class="reveal max-w-lg mb-14">
      <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">How we work together</p>
      <h2 class="font-display font-extrabold text-[30px] md:text-[36px] tracking-tight">Four steps, start to finish</h2>
    </div>
    <div class="grid md:grid-cols-4 gap-8 relative">
      <div class="hidden md:block absolute top-4.5 left-[12%] right-[12%] h-px bg-hive"></div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">1</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Free consultation</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We discuss your setup, pain points, and goals.</p>
      </div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">2</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Assessment and proposal</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We review your environment and recommend a plan.</p>
      </div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">3</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Implementation</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We execute with minimal disruption to your team.</p>
      </div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">4</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Ongoing support</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We stay available for continued admin and support.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ WHY CHOOSE US ============ -->
<section class="max-w-6xl mx-auto px-6 py-24 md:py-28">
  <div class="reveal max-w-lg mb-14">
    <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">Why choose us</p>
    <h2 class="font-display font-extrabold text-[30px] md:text-[36px] tracking-tight">A partner, not a ticket queue</h2>
  </div>
  <div class="grid md:grid-cols-4 gap-8">
    <div class="reveal">
      <p class="font-display font-bold text-[24px]">MS-102</p>
      <p class="text-[13px] text-slate mt-1">Certified Microsoft 365 Administrator</p>
    </div>
    <div class="reveal">
      <p class="font-display font-bold text-[24px]">100+</p>
      <p class="text-[13px] text-slate mt-1">Clients served across 4 countries</p>
    </div>
    <div class="reveal">
      <p class="font-display font-bold text-[24px]">100%</p>
      <p class="text-[13px] text-slate mt-1">Job Success Score on Upwork</p>
    </div>
    <div class="reveal">
      <p class="font-display font-bold text-[24px]">3+ yrs</p>
      <p class="text-[13px] text-slate mt-1">Hands-on IT experience</p>
    </div>
  </div>
</section>

<!-- ============ FINAL CTA ============ -->
<section id="contact-cta" class="bg-cell text-paper w-full">
  <div class="max-w-6xl mx-auto px-6 py-24 md:py-28 text-center">
    <h2 class="reveal font-display font-extrabold text-[30px] md:text-[40px] tracking-tight max-w-xl mx-auto">Not sure which service you need?</h2>
    <p class="reveal mt-4 text-[15px] text-hive/70 max-w-md mx-auto">Book a free consultation and we'll help you find the right starting point for your business.</p>
    <a href="/contact" class="reveal inline-flex items-center rounded-md bg-honey text-ink text-[14px] font-semibold px-7 py-3.5 mt-8 hover:bg-paper transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey">Schedule your free consultation</a>
  </div>
</section>

</main>

<?php get_footer(); ?>