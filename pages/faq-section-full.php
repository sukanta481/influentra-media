
<?php include __DIR__ . '/../includes/header.php'; ?>

<style>
  .faq-hero {
    background: linear-gradient(90deg, #f8fafc 65%, #e7eaff 100%);
    border-radius: 2rem;
    padding: 2rem 1.5rem;
    margin-top: 1rem;
    box-shadow: 0 10px 40px rgba(80,110,255,0.04);
  }
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
  }
</style>

<section class="faq-hero mb-5 text-center">
  <h1 class="fw-bold mb-2" style="letter-spacing:-1px;">❓ Frequently Asked Questions</h1>
  <p class="mb-0" style="font-size:1.1rem;">Find answers to the most common questions about Influentra Media.</p>
</section>

<section class="faq-section py-5" style="background-color: #fff;">
  <div class="container">

    <!-- General FAQs -->
    <h4 class="mb-3">🔹 General FAQs</h4>
    <div class="accordion mb-4" id="generalFaq">
      <div class="accordion-item">
        <h2 class="accordion-header" id="genOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenOne">
            What is Influentra Media?
          </button>
        </h2>
        <div id="collapseGenOne" class="accordion-collapse collapse show">
          <div class="accordion-body text-primary">
            We’re a USA-based influencer marketing agency connecting brands with top creators across all platforms.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="genTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenTwo">
            Which social platforms do you support?
          </button>
        </h2>
        <div id="collapseGenTwo" class="accordion-collapse collapse">
          <div class="accordion-body text-primary">
            Instagram, YouTube, TikTok, Twitter (X), Facebook, and more.
          </div>
        </div>
      </div>
    </div>

    <!-- For Brands -->
    <h4 class="mb-3">🔹 For Brands</h4>
    <div class="accordion mb-4" id="brandFaq">
      <div class="accordion-item">
        <h2 class="accordion-header" id="brandOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrandOne">
            How does the campaign process work?
          </button>
        </h2>
        <div id="collapseBrandOne" class="accordion-collapse collapse">
          <div class="accordion-body text-success">
            You submit a brief → we match influencers → campaign launches → you get a report.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="brandTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrandTwo">
            Can I choose influencers myself?
          </button>
        </h2>
        <div id="collapseBrandTwo" class="accordion-collapse collapse">
          <div class="accordion-body text-success">
            Yes, we offer curated suggestions, or you can request specific types of influencers.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="brandThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrandThree">
            Do you offer campaign analytics?
          </button>
        </h2>
        <div id="collapseBrandThree" class="accordion-collapse collapse">
          <div class="accordion-body text-success">
            Yes, we provide insights on reach, engagement, clicks, and conversions.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="brandFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrandFour">
            What types of influencers do you work with?
          </button>
        </h2>
        <div id="collapseBrandFour" class="accordion-collapse collapse">
          <div class="accordion-body text-success">
            Micro, macro, and niche creators in beauty, fitness, tech, fashion, music, and more.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="brandFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrandFive">
            Is there a minimum budget?
          </button>
        </h2>
        <div id="collapseBrandFive" class="accordion-collapse collapse">
          <div class="accordion-body text-success">
            We tailor campaigns from $500 up to enterprise-level partnerships.
          </div>
        </div>
      </div>
    </div>

    <!-- For Influencers -->
    <h4 class="mb-3">🔹 For Influencers</h4>
    <div class="accordion mb-4" id="influencerFaq">
      <div class="accordion-item">
        <h2 class="accordion-header" id="infOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfOne">
            How can I join Influentra Media?
          </button>
        </h2>
        <div id="collapseInfOne" class="accordion-collapse collapse">
          <div class="accordion-body text-info">
            Fill out the influencer form — we’ll review and onboard you if it’s a good fit.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="infTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfTwo">
            Do I need a minimum follower count?
          </button>
        </h2>
        <div id="collapseInfTwo" class="accordion-collapse collapse">
          <div class="accordion-body text-info">
            Not necessarily. Engagement rate and niche relevance are more important.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="infThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfThree">
            Will I get paid for collaborations?
          </button>
        </h2>
        <div id="collapseInfThree" class="accordion-collapse collapse">
          <div class="accordion-body text-info">
            Yes. All approved campaigns include compensation details upfront.
          </div>
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
      <form action="../contact.php" method="get">
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
  document.getElementById('contactBtn').addEventListener('click', function() {
    var modal = new bootstrap.Modal(document.getElementById('contactModal'));
    modal.show();
  });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
