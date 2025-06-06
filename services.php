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
  @media (max-width: 991px) {
    .service-card { min-height: 420px; }
  }
  @media (max-width: 767px) {
    .service-card { min-height: 1px; padding: 1.3rem .8rem .8rem .8rem; }
    .services-hero { padding: 1.2rem .5rem 1.2rem .5rem; }
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
        <a href="pro-audio-influencers.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service1.png" alt="Pro Audio Influencers" class="service-icon mb-2">
          <div class="service-title">🎧 Pro Audio Influencers</div>
          <div class="service-desc">
            Partner with creators who speak your industry’s language.<br>
            We connect pro audio brands with trusted influencers in music, podcasting, sound engineering, and DJing.
          </div>
          <div class="service-meta">🔍 Target: musicians, producers, audio brands<br>📈 Result: trust, demos, engagement</div>
        </div>
        </a>
      </div>
      <!-- Service: Social Campaigns -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="social-campaigns.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service2.png" alt="Social Campaigns" class="service-icon mb-2">
          <div class="service-title">📣 Social Campaigns</div>
          <div class="service-desc">
            Create viral buzz with custom social media influencer campaigns.<br>
            We handle influencer selection, content briefing, and reporting.
          </div>
          <div class="service-meta">💡 Platforms: Instagram, TikTok, YouTube<br>🎯 Goal: reach, engagement, visibility</div>
        </div>
        </a>
      </div>
      <!-- Service: Creative Content -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="creative-content.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service3.png" alt="Creative Content" class="service-icon mb-2">
          <div class="service-title">✨ Creative Content</div>
          <div class="service-desc">
            Authentic, scroll-stopping content built for modern consumers.<br>
            Includes reviews, unboxings, tutorials, and lifestyle storytelling.
          </div>
          <div class="service-meta">📷 Deliverables: videos, UGC, stories<br>🔥 Uses: ads, feed, campaigns</div>
        </div>
        </a>
      </div>
      <!-- Service: Brand Collabs -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="brand-collaborations.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service4.png" alt="Brand Collabs" class="service-icon mb-2">
          <div class="service-title">🤝 Brand Collaborations</div>
          <div class="service-desc">
            Build lasting partnerships that fuel brand advocacy.<br>
            We facilitate long-term influencer ambassadorships.
          </div>
          <div class="service-meta">🧠 Focus: trust, repeat visibility, results<br>🚀 Ideal: launches, seasonal, ambassadors</div>
        </div>
        </a>
      </div>
      <!-- Service: Review Generation -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="review-generation.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service5.png" alt="Review Generation" class="service-icon mb-2">
          <div class="service-title">🌟 Review Generation</div>
          <div class="service-desc">
            Drive purchase decisions with authentic product reviews.<br>
            Perfect for eCommerce, Amazon listings, and new product drops.
          </div>
          <div class="service-meta">⭐ Types: unboxing, testimonials<br>🛒 Goal: conversion-focused UGC</div>
        </div>
        </a>
      </div>
      <!-- Service: Website Development -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="website-development.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service6.png" alt="Website Development" class="service-icon mb-2">
          <div class="service-title">💻 Website Development</div>
          <div class="service-desc">
            Custom websites that convert visitors into customers.<br>
            From landing pages to influencer portals and CMS.
          </div>
          <div class="service-meta">🛠️ Tech: HTML, CSS, PHP, Bootstrap<br>🌐 Add-ons: CMS, landing pages</div>
        </div>
        </a>
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

<?php include 'includes/contact-modal.php'; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
