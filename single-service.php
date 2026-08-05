<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>
<!-- ============ BREADCRUMB ============ -->
<nav aria-label="Breadcrumb" class="w-full border-b border-hive bg-paper">
  <ol class="max-w-6xl mx-auto px-6 py-3 flex items-center gap-2 text-[13px] font-mono text-slate">
    <li class="flex items-center gap-2"><a href="/" class="hover:text-ink transition-colors">Home</a><span class="text-hive" aria-hidden="true">/</span></li>
    <li class="flex items-center gap-2"><a href="/services" class="hover:text-ink transition-colors">Services</a><span class="text-hive" aria-hidden="true">/</span></li>
    <li aria-current="page" class="text-ink">Microsoft 365 Administration</li>
  </ol>
</nav>

<main class="w-full">

<!-- ============ HERO ============ -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-14 md:pt-20 grid md:grid-cols-[auto_1fr] gap-8 items-start">
  <span class="reveal hex w-16 h-16 bg-cell flex items-center justify-center shrink-0"><span class="font-mono text-[11px] text-honey">M365</span></span>
  <div class="reveal">
    <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-3">Service</p>
    <h1 class="font-display font-extrabold text-[30px] md:text-[40px] leading-[1.1] tracking-tight text-ink">Microsoft 365 Administration</h1>
    <p class="mt-4 text-[15.5px] text-slate leading-relaxed max-w-xl">Full setup, configuration, and ongoing administration of your Microsoft 365 environment, so your team stays productive and secure without an in-house admin.</p>
    <div class="mt-7 flex flex-wrap items-center gap-5">
      <a href="/contact" class="inline-flex items-center rounded-md bg-honey text-ink text-[14px] font-semibold px-6 py-3.5 hover:bg-honeydark hover:text-paper transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ink">Book a free consultation</a>
      <a href="/services" class="text-[14px] font-medium text-ink underline decoration-hive underline-offset-4 hover:decoration-ink transition-colors">← All services</a>
    </div>
  </div>
</section>

<!-- ============ WHAT'S INCLUDED ============ -->
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-20 md:py-24">
    <div class="reveal max-w-lg mb-12">
      <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">What's included</p>
      <h2 class="font-display font-extrabold text-[26px] md:text-[32px] tracking-tight">Everything your admin console needs</h2>
    </div>
    <div class="grid md:grid-cols-2 gap-x-10 gap-y-6">
      <div class="reveal flex gap-4">
        <span class="hex w-8 h-8 bg-ink shrink-0 mt-0.5"></span>
        <div>
          <h3 class="font-display font-bold text-[15px]">User provisioning &amp; offboarding</h3>
          <p class="text-[13.5px] text-slate mt-1.5 leading-relaxed">New hires set up and departing employees fully deprovisioned, mailbox, licensing, and app access.</p>
        </div>
      </div>
      <div class="reveal flex gap-4">
        <span class="hex w-8 h-8 bg-ink shrink-0 mt-0.5"></span>
        <div>
          <h3 class="font-display font-bold text-[15px]">Licensing optimization</h3>
          <p class="text-[13.5px] text-slate mt-1.5 leading-relaxed">Regular review of assigned licenses to catch unused seats and mismatched plans before renewal.</p>
        </div>
      </div>
      <div class="reveal flex gap-4">
        <span class="hex w-8 h-8 bg-ink shrink-0 mt-0.5"></span>
        <div>
          <h3 class="font-display font-bold text-[15px]">Security policy configuration</h3>
          <p class="text-[13.5px] text-slate mt-1.5 leading-relaxed">Conditional Access, MFA enforcement, and data-loss prevention set up and maintained.</p>
        </div>
      </div>
      <div class="reveal flex gap-4">
        <span class="hex w-8 h-8 bg-ink shrink-0 mt-0.5"></span>
        <div>
          <h3 class="font-display font-bold text-[15px]">Exchange Online administration</h3>
          <p class="text-[13.5px] text-slate mt-1.5 leading-relaxed">Mailbox rules, shared mailboxes, distribution lists, and mail flow issues handled directly.</p>
        </div>
      </div>
      <div class="reveal flex gap-4">
        <span class="hex w-8 h-8 bg-ink shrink-0 mt-0.5"></span>
        <div>
          <h3 class="font-display font-bold text-[15px]">Teams &amp; SharePoint support</h3>
          <p class="text-[13.5px] text-slate mt-1.5 leading-relaxed">Site structure, permissions, and Teams policies configured to match how your team actually works.</p>
        </div>
      </div>
      <div class="reveal flex gap-4">
        <span class="hex w-8 h-8 bg-ink shrink-0 mt-0.5"></span>
        <div>
          <h3 class="font-display font-bold text-[15px]">Monthly health reports</h3>
          <p class="text-[13.5px] text-slate mt-1.5 leading-relaxed">A plain-language summary of licensing, security posture, and anything that needs your attention.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ WHO IT'S FOR ============ -->
<section class="max-w-6xl mx-auto px-6 py-20 md:py-24 grid md:grid-cols-[1fr_1.3fr] gap-10 items-center">
  <div class="reveal">
    <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">Who it's for</p>
    <h2 class="font-display font-extrabold text-[26px] md:text-[32px] tracking-tight">Running Microsoft 365 without a dedicated admin</h2>
  </div>
  <p class="reveal text-[15px] text-slate leading-relaxed">Built for businesses that rely on Microsoft 365 daily but don't have the headcount for a full-time Microsoft admin, whether you're at 10 employees or 200.</p>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-20 md:py-24">
    <div class="reveal max-w-lg mb-14">
      <p class="font-mono text-[12px] tracking-[0.08em] text-honeydark uppercase mb-4">How it works</p>
      <h2 class="font-display font-extrabold text-[26px] md:text-[32px] tracking-tight">From audit to ongoing admin</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-8 relative">
      <div class="hidden md:block absolute top-4.5 left-[16%] right-[16%] h-px bg-hive"></div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">1</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Environment audit</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We review your current tenant, licensing, and security settings.</p>
      </div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">2</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Cleanup &amp; hardening</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We fix misconfigurations and apply security policy baselines.</p>
      </div>
      <div class="reveal relative">
        <span class="hex w-9 h-9 bg-honey flex items-center justify-center relative z-10"><span class="font-mono text-[12px] text-ink font-medium">3</span></span>
        <h3 class="font-display font-bold text-[15px] mt-4">Ongoing administration</h3>
        <p class="text-[13.5px] text-slate mt-2 leading-relaxed">We handle day-to-day admin and monthly reporting going forward.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="max-w-3xl mx-auto px-6 py-20 md:py-24">
  <h2 class="reveal font-display font-bold text-[22px] mb-8">Frequently asked questions</h2>
  <div class="reveal divide-y divide-hive border-t border-b border-hive">
    <details class="group py-4">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <span class="font-display font-bold text-[15px]">Do you manage our Microsoft 365 licensing costs?</span>
        <svg class="chev w-4 h-4 shrink-0 transition-transform" viewBox="0 0 20 20" fill="none"><path d="M5 7l5 5 5-5" stroke="#565C6B" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </summary>
      <p class="text-[13.5px] text-slate mt-3 leading-relaxed">Yes. We review your license assignments regularly and flag unused or mismatched licenses so you're not overpaying.</p>
    </details>
    <details class="group py-4">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <span class="font-display font-bold text-[15px]">Can you set up new employee accounts for us?</span>
        <svg class="chev w-4 h-4 shrink-0 transition-transform" viewBox="0 0 20 20" fill="none"><path d="M5 7l5 5 5-5" stroke="#565C6B" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </summary>
      <p class="text-[13.5px] text-slate mt-3 leading-relaxed">Yes. Onboarding and offboarding, including mailbox, licensing, and app access, is handled as part of ongoing administration.</p>
    </details>
    <details class="group py-4">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <span class="font-display font-bold text-[15px]">Do you handle security incidents?</span>
        <svg class="chev w-4 h-4 shrink-0 transition-transform" viewBox="0 0 20 20" fill="none"><path d="M5 7l5 5 5-5" stroke="#565C6B" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </summary>
      <p class="text-[13.5px] text-slate mt-3 leading-relaxed">Yes. We configure Conditional Access and MFA policies proactively, and respond directly if a compromised account or phishing incident occurs.</p>
    </details>
  </div>
</section>

<!-- ============ RELATED SERVICES ============ -->
<section class="bg-white border-y border-hive">
  <div class="max-w-6xl mx-auto px-6 py-20 md:py-24">
    <h2 class="reveal font-display font-bold text-[20px] mb-8">Related services</h2>
    <div class="grid md:grid-cols-4 gap-5">
      <a href="/services/google-workspace-administration" class="reveal rounded-lg border border-hive p-5 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
        <span class="hex w-8 h-8 bg-ink flex items-center justify-center"><span class="font-mono text-[8px] text-paper">GWS</span></span>
        <h3 class="font-display font-bold text-[14px] mt-3">Google Workspace Administration</h3>
      </a>
      <a href="/services/cloud-email-migration" class="reveal rounded-lg border border-hive p-5 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
        <span class="hex w-8 h-8 bg-ink flex items-center justify-center"><span class="font-mono text-[8px] text-paper">MIG</span></span>
        <h3 class="font-display font-bold text-[14px] mt-3">Cloud &amp; Email Migration</h3>
      </a>
      <a href="/services/email-deliverability" class="reveal rounded-lg border border-hive p-5 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
        <span class="hex w-8 h-8 bg-ink flex items-center justify-center"><span class="font-mono text-[8px] text-paper">SPF</span></span>
        <h3 class="font-display font-bold text-[14px] mt-3">Email Deliverability</h3>
      </a>
      <a href="/services/remote-it-support" class="reveal rounded-lg border border-hive p-5 hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300 block">
        <span class="hex w-8 h-8 bg-ink flex items-center justify-center"><span class="font-mono text-[8px] text-paper">RIT</span></span>
        <h3 class="font-display font-bold text-[14px] mt-3">Remote IT Support</h3>
      </a>
    </div>
  </div>
</section>

<!-- ============ CLOSING CTA ============ -->
<section class="bg-cell text-paper w-full">
  <div class="max-w-6xl mx-auto px-6 py-24 md:py-28 text-center">
    <h2 class="reveal font-display font-extrabold text-[28px] md:text-[36px] tracking-tight max-w-lg mx-auto">Ready to hand off your Microsoft 365 admin?</h2>
    <p class="reveal mt-4 text-[15px] text-hive/70 max-w-md mx-auto">Free 15-minute consultation. We'll review your current setup and show you exactly what we'd change.</p>
    <a href="/contact" class="reveal inline-flex items-center rounded-md bg-honey text-ink text-[14px] font-semibold px-7 py-3.5 mt-8 hover:bg-paper transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey">Book a free consultation</a>
  </div>
</section>

</main>

<?php endwhile; ?>

<?php get_footer(); ?>