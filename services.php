<?php include __DIR__ . '/includes/header.php'; ?>

<style>
  .services-hero {
    background: linear-gradient(90deg, #f8fafc 65%, #e7eaff 100%);
    border-radius: 2rem;
    padding: 2rem 1.3rem 1.5rem 1.3rem;
    margin-top: 1rem;
    box-shadow: 0 10px 40px rgba(80,110,255,0.04);
  }
  .services-section {
    margin-top: 2rem;
    margin-bottom: 2rem;
  }
  .service-card {
    background: #fff;
    border-radius: 1.5rem;
    box-shadow: 0 2px 12px rgba(80,110,255,0.07);
    padding: 2.2rem 1.5rem 1.2rem 1.5rem;
    transition: transform .15s;
    text-align: center;
    margin-bottom: 2rem;
    min-height: 370px;
    position: relative;
  }
  .service-card:hover {
    transform: translateY(-8px) scale(1.015);
    box-shadow: 0 6px 32px rgba(80,110,255,0.12);
  }
  .service-icon {
    margin-bottom: 1rem;
    height: 66px;
    width: 66px;
    object-fit: contain;
  }
  .service-title {
    font-size: 1.19rem;
    font-weight: 700;
    margin-bottom: 0.4rem;
    color: #262651;
  }
  .service-desc {
    font-size: 1.03rem;
    color: #444;
    min-height: 60px;
    margin-bottom: .5rem;
  }
  .service-meta {
    font-size: .98rem;
    color: #5f6368;
    margin-bottom: 0.2rem;
    font-style: italic;
  }
  /* Floating Button */
  .floating-contact-btn {
    position: fixed;
    right: 2rem;
    bottom: 2rem;
    z-index: 1100;
    background: #4d4dff;
    color: #fff;
    border-radius: 50px;
    padding: 14px 32px;
    font-weight: 600;
    box-shadow: 0 6px 24px rgba(80, 110, 255, 0.18);
    border: none;
    cursor: pointer;
    font-size: 1.15rem;
    transition: transform 0.1s;
    animation: popin 0.8s cubic-bezier(.6,-0.28,.74,1.24) forwards;
  }
  .floating-contact-btn:hover {
    background: #2f2f94;
    transform: scale(1.06);
  }
  @keyframes popin {
    0%   { transform: translateY(80px) scale(.85); opacity: 0; }
    80%  { transform: translateY(-10px) scale(1.04); opacity: 1; }
    100% { transform: translateY(0) scale(1); opacity: 1; }
  }
  @media (max-width: 991px) {
    .service-card { min-height: 420px; }
  }
  @media (max-width: 767px) {
    .service-card { min-height: 1px; padding: 1.3rem .8rem .8rem .8rem; }
    .services-hero { padding: 1.2rem .5rem 1.2rem .5rem; }
  }
  @media (max-width: 575px) {
    .floating-contact-btn { right: 1rem; bottom: 1rem; padding: 11px 18px; font-size: 1rem; }
  }
</style>

<section class="services-hero mb-5">
  <div class="container px-0 px-sm-3">
    <h1 class="fw-bold mb-2" style="letter-spacing:-1px;">📦 Our Services</h1>
    <p class="mb-3" style="font-size:1.12rem;">
      Grow your brand with powerful influencer marketing, content, and digital solutions.
      <br>
      At Influentra Media, we help brands scale through data-driven strategies and authentic creator collaborations. Explore our full suite of services tailored for the digital-first world.
    </p>
  </div>
</section>

<section class="services-section">
  <div class="container">
    <div class="row justify-content-center">
      <!-- Service: Pro Audio Influencers -->
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="service-card w-100">
          <img src="img/service1.png" alt="Pro Audio Influencers" class="service-icon mb-2">
          <div class="service-title">🎧 Pro Audio Influencers</div>
          <div class="service-desc">
            Partner with creators who speak your industry’s language.<br>
            We connect pro audio brands with trusted influencers in music, podcasting, sound engineering, and DJing.
          </div>
          <div class="service-meta">🔍 Target: musicians, producers, audio brands<br>📈 Result: trust, demos, engagement</div>
        </div>
      </div>
      <!-- Service: Social Campaigns -->
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="service-card w-100">
          <img src="img/service2.png" alt="Social Campaigns" class="service-icon mb-2">
          <div class="service-title">📣 Social Campaigns</div>
          <div class="service-desc">
            Create viral buzz with custom social media influencer campaigns.<br>
            We handle influencer selection, content briefing, and reporting.
          </div>
          <div class="service-meta">💡 Platforms: Instagram, TikTok, YouTube<br>🎯 Goal: reach, engagement, visibility</div>
        </div>
      </div>
      <!-- Service: Creative Content -->
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="service-card w-100">
          <img src="img/service3.png" alt="Creative Content" class="service-icon mb-2">
          <div class="service-title">✨ Creative Content</div>
          <div class="service-desc">
            Authentic, scroll-stopping content built for modern consumers.<br>
            Includes reviews, unboxings, tutorials, and lifestyle storytelling.
          </div>
          <div class="service-meta">📷 Deliverables: videos, UGC, stories<br>🔥 Uses: ads, feed, campaigns</div>
        </div>
      </div>
      <!-- Service: Brand Collabs -->
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="service-card w-100">
          <img src="img/service4.png" alt="Brand Collabs" class="service-icon mb-2">
          <div class="service-title">🤝 Brand Collaborations</div>
          <div class="service-desc">
            Build lasting partnerships that fuel brand advocacy.<br>
            We facilitate long-term influencer ambassadorships.
          </div>
          <div class="service-meta">🧠 Focus: trust, repeat visibility, results<br>🚀 Ideal: launches, seasonal, ambassadors</div>
        </div>
      </div>
      <!-- Service: Review Generation -->
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="service-card w-100">
          <img src="img/service5.png" alt="Review Generation" class="service-icon mb-2">
          <div class="service-title">🌟 Review Generation</div>
          <div class="service-desc">
            Drive purchase decisions with authentic product reviews.<br>
            Perfect for eCommerce, Amazon listings, and new product drops.
          </div>
          <div class="service-meta">⭐ Types: unboxing, testimonials<br>🛒 Goal: conversion-focused UGC</div>
        </div>
      </div>
      <!-- Service: Website Development -->
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="service-card w-100">
          <img src="img/service6.png" alt="Website Development" class="service-icon mb-2">
          <div class="service-title">💻 Website Development</div>
          <div class="service-desc">
            Custom websites that convert visitors into customers.<br>
            From landing pages to influencer portals and CMS.
          </div>
          <div class="service-meta">🛠️ Tech: HTML, CSS, PHP, Bootstrap<br>🌐 Add-ons: CMS, landing pages</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="text-center mb-5">
  <h3 class="fw-bold mb-3">🚀 Ready to Launch?</h3>
  <p style="font-size:1.09rem;">
    Let Influentra Media help you activate the right creators, deliver impactful content, and scale your brand across platforms.
    <br>
    <b>📩 Contact us today to build your first campaign or collaborate with our team.</b>
  </p>
</section>

<!-- Floating Contact Us Button -->
<button class="floating-contact-btn" id="contactBtn">
  <i class="bi bi-envelope"></i> Contact Us
</button>
<!-- Contact Popup Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="contact.php" method="get">
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalLabel">Let's Connect!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="mb-3">Want to discuss your campaign, collaborate, or join as a creator?  
            <br><b>Reach out now!</b>
          </p>
          <button class="btn btn-primary w-100 py-2" type="submit">Go to Contact Form</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Open Contact Modal on Button Click
  document.getElementById('contactBtn').addEventListener('click', function() {
    var modal = new bootstrap.Modal(document.getElementById('contactModal'));
    modal.show();
  });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
