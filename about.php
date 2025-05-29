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
  @media (max-width: 575px) {
    .floating-contact-btn { right: 1rem; bottom: 1rem; padding: 11px 18px; font-size: 1rem; }
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
