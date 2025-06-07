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
      <!-- Service: Influencer Campaign Management -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="influencer-campaign-management.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service1.png" alt="Influencer Campaign Management" class="service-icon mb-2">
          <div class="service-title">📣 Influencer Campaign Management</div>
          <div class="service-desc">
            Start-to-end setup, coordination and tracking for your influencer campaigns.
          </div>
          <div class="service-meta">🗂 Plan, execute & track campaigns</div>
        </div>
        </a>
      </div>
      <!-- Service: Influencer Discovery -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="influencer-discovery.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service2.png" alt="Influencer Discovery" class="service-icon mb-2">
          <div class="service-title">🔍 Influencer Discovery & Shortlisting</div>
          <div class="service-desc">
            Receive researched influencer lists tailored to your brand goals.
          </div>
          <div class="service-meta">📑 Curated influencer options</div>
        </div>
        </a>
      </div>
      <!-- Service: UGC Content Creation -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="ugc-content-creation.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service3.png" alt="UGC Content Creation" class="service-icon mb-2">
          <div class="service-title">🎬 UGC Content Creation Service</div>
          <div class="service-desc">
            Help brands get real creator videos and photos for marketing.
          </div>
          <div class="service-meta">📷 Authentic creator content</div>
        </div>
        </a>
      </div>
      <!-- Service: Micro-Influencer Collaboration -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="micro-influencer-collaboration.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service4.png" alt="Micro-Influencer Collaboration" class="service-icon mb-2">
          <div class="service-title">🤝 Micro-Influencer Collaboration</div>
          <div class="service-desc">
            Low-budget outreach programs designed for small business brands.
          </div>
          <div class="service-meta">💡 Budget-friendly campaigns</div>
        </div>
        </a>
      </div>
      <!-- Service: Influencer Performance Reporting -->
      <div class="col-md-6 col-lg-4 d-flex">
        <a href="influencer-performance-reporting.php" class="text-decoration-none text-dark w-100">
        <div class="service-card w-100">
          <img src="img/service5.png" alt="Influencer Performance Reporting" class="service-icon mb-2">
          <div class="service-title">📊 Influencer Performance Reporting</div>
          <div class="service-desc">
            Analyze and report on influencer campaign results to measure ROI.
          </div>
          <div class="service-meta">📈 Detailed analytics</div>
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
