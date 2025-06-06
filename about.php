<?php include __DIR__ . '/includes/header.php'; ?>

<style>
  .about-hero {
    background: linear-gradient(90deg, #f8fafc 70%, #e7eaff 100%);
    border-radius: 2rem;
    padding: 2.5rem 1.5rem 2rem 1.5rem;
    margin-top: 1rem;
    box-shadow: 0 10px 40px rgba(80, 110, 255, 0.04);
  }
  .about-icon {
    font-size: 1.6rem;
    margin-right: .75rem;
    color: #4d4dff;
    vertical-align: middle;
  }
  .about-section h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #3b3b3b;
    margin-bottom: 1.25rem;
  }
  .about-section .list-group-item {
    border: none;
    font-size: 1.1rem;
    padding-left: 0;
    background: transparent;
  }
  @media (max-width: 575px) {
    .about-hero { padding: 1.2rem .6rem 1rem .6rem; }
  }
</style>

<section class="about-hero about-section mb-5">
  <div class="container px-0 px-sm-3">
    <div class="row">
      <div class="col-12 col-lg-10 mx-auto">
        <h1 class="fw-bold mb-2" style="letter-spacing:-1px;">📝 About Us – Influentra Media</h1>
        <h2 class="mb-2" style="font-size:1.35rem;font-weight:500;">Powering Brands Through Authentic Influence</h2>
        <p class="mb-4" style="font-size:1.13rem;">
          Welcome to Influentra Media, your trusted influencer marketing partner in the USA. We specialize in connecting forward-thinking brands with high-impact content creators across Instagram, YouTube, TikTok, and more — helping you drive visibility, trust, and conversions through powerful influencer collaborations.
        </p>

        <div class="mb-4">
          <span class="about-icon">🚀</span>
          <span style="font-size:1.2rem;font-weight:600;">Who We Are</span>
          <p class="mt-2 mb-2" style="font-size:1.08rem;">
            Influentra Media is a results-driven influencer marketing agency built for the modern digital world. We understand that today’s consumers value authenticity over ads. That’s why we help brands grow using real voices and real stories.
            <br>From micro-influencers to niche industry leaders, we curate partnerships that feel natural — not scripted.
          </p>
        </div>

        <div class="mb-4">
          <span class="about-icon">🎯</span>
          <span style="font-size:1.2rem;font-weight:600;">What We Do</span>
          <ul class="list-group list-group-flush ms-2 mb-2">
            <li class="list-group-item">✅ Discover and vet the right influencers</li>
            <li class="list-group-item">✅ Launch targeted influencer campaigns</li>
            <li class="list-group-item">✅ Generate high-quality UGC (User-Generated Content)</li>
            <li class="list-group-item">✅ Monitor campaign performance & analytics</li>
            <li class="list-group-item">✅ Scale with data-driven strategies</li>
          </ul>
          <p style="font-size:1.08rem;">
            Whether you're a start-up, eCommerce brand, or enterprise, our campaigns are tailored to fit your audience, goals, and industry.
          </p>
        </div>

        <div class="mb-4">
          <span class="about-icon">💡</span>
          <span style="font-size:1.2rem;font-weight:600;">Why Choose Influentra Media?</span>
          <ul class="list-group list-group-flush ms-2 mb-2">
            <li class="list-group-item">🔍 Data-backed Influencer Matching</li>
            <li class="list-group-item">🤝 Strong Creator Relationships</li>
            <li class="list-group-item">🧠 Creative Strategy & Content Support</li>
            <li class="list-group-item">📈 Transparent ROI Reporting</li>
            <li class="list-group-item">🌍 Multiplatform Campaign Management</li>
          </ul>
          <p style="font-size:1.08rem;">
            We’ve built a reputation for running ethical, authentic, and scalable influencer campaigns that deliver real business results.
          </p>
        </div>

        <div class="mb-4">
          <span class="about-icon">👥</span>
          <span style="font-size:1.2rem;font-weight:600;">Who We Work With</span>
          <div class="ms-2 mb-2" style="font-size:1.07rem;">
            Pro Audio Brands <span style="color:#4d4dff;">•</span>
            Beauty & Skincare <span style="color:#4d4dff;">•</span>
            Fashion & Lifestyle <span style="color:#4d4dff;">•</span>
            Fitness & Health <span style="color:#4d4dff;">•</span>
            Tech & Consumer Goods
          </div>
          <p style="font-size:1.08rem;">
            Whether you’re looking to build brand awareness, drive product reviews, or spark viral engagement — Influentra Media delivers.
          </p>
        </div>

        <div class="mb-2">
          <span class="about-icon">🤝</span>
          <span style="font-size:1.2rem;font-weight:600;">Ready to Grow Your Brand?</span>
          <p style="font-size:1.09rem;">
            We believe influence is more than numbers — it's about connection, creativity, and community. Let us help you reach the right people with the right message.
            <br><b>📩 Contact us today to start your influencer campaign or join as a creator.</b>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/contact-modal.php'; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
