<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/toast.css" />
<div class="container py-5">
  <h2 class="text-center fw-bold mb-2">Contact Us</h2>
  <p class="text-center text-muted mb-4">Have a question or need our services? Fill out this quick form and our team will get back to you promptly.</p>
  <div class="row mt-3 justify-content-center g-5">
    <!-- Form -->
    <div class="col-lg-6 col-md-7">
      <div class="card shadow-sm border-0">
        <div class="card-body p-4">
          <form id="contactForm" autocomplete="off">
            <div class="mb-3">
              <label class="form-label">Choose Topic</label>
              <select class="form-select" name="topic" required>
                <option value="">Choose Topic</option>
                <option value="General Inquiry">General Inquiry</option>
                <option value="Support">Support</option>
                <option value="Sales">Sales</option>
                <option value="Partnership">Partnership</option>
                <option value="Services">Services</option>
                <option value="Careers">Careers</option>
                <option value="Collaboration">Collaboration</option>
                <option value="Feedback">Feedback</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Country</label>
                <select class="form-select" id="country" name="country" required>
                  <option value="United States" data-code="+1" selected>United States</option>
                  <option value="India" data-code="+91">India</option>
                  <option value="United Kingdom" data-code="+44">United Kingdom</option>
                  <option value="Australia" data-code="+61">Australia</option>
                  <option value="Japan" data-code="+81">Japan</option>
                  <option value="UAE" data-code="+971">UAE</option>
                  <option value="Germany" data-code="+49">Germany</option>
                  <option value="France" data-code="+33">France</option>
                  <option value="Italy" data-code="+39">Italy</option>
                  <option value="Russia" data-code="+7">Russia</option>
                  <!-- Add more if needed -->
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">City</label>
                <input type="text" class="form-control" name="city" required>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="form-label">Code</label>
                  <select class="form-select" id="phone_code" name="phone_code" required>
                    <option value="+1" selected>🇺🇸 +1 (USA)</option>
                    <option value="+91">🇮🇳 +91 (India)</option>
                    <option value="+44">🇬🇧 +44 (UK)</option>
                    <option value="+61">🇦🇺 +61 (Australia)</option>
                    <option value="+81">🇯🇵 +81 (Japan)</option>
                    <option value="+971">🇦🇪 +971 (UAE)</option>
                    <option value="+49">🇩🇪 +49 (Germany)</option>
                    <option value="+33">🇫🇷 +33 (France)</option>
                    <option value="+39">🇮🇹 +39 (Italy)</option>
                    <option value="+7">🇷🇺 +7 (Russia)</option>
                  </select>
                </div>
              <div class="col-md-8 mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
        </div>
      </div>
      <div id="toast" class="toast position-fixed top-0 start-50 translate-middle-x mt-4" style="z-index: 1055; min-width:250px;"></div>
    </div>
    <!-- Contact Info -->
    <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center">
      <img src="img/contact-img.png" alt="Contact" class="img-fluid mb-3" style="max-height: 280px;">
      <div class="text-center px-2">
        <h5 class="fw-bold mb-2"><i class="bi bi-geo-alt-fill me-1"></i> Address</h5>
        <p class="mb-1 small">
          Softz Solutions & Co Pvt Ltd.<br>
          796, Purbachal Main Road, Second St,<br>
          Gitanjali Park, Kolkata – 700078, India
        </p>
        <h6 class="fw-bold mt-3 mb-1"><i class="bi bi-envelope-at-fill me-1"></i> Connect with us</h6>
        <p class="mb-0">hello.influentra@gmail.com</p>
        <p class="mb-0">hello@influentra.media</p>
      </div>
    </div>
  </div>
</div>

<script>
// Country-code sync logic
document.addEventListener('DOMContentLoaded', function() {
  var countrySelect = document.getElementById('country');
  var codeSelect = document.getElementById('phone_code');
  function syncCodeWithCountry() {
    var selectedOption = countrySelect.options[countrySelect.selectedIndex];
    var countryCode = selectedOption.getAttribute('data-code');
    if (countryCode) {
      for (let i = 0; i < codeSelect.options.length; i++) {
        if (codeSelect.options[i].value === countryCode) {
          codeSelect.selectedIndex = i;
          break;
        }
      }
    }
  }
  countrySelect.addEventListener('change', syncCodeWithCountry);
  syncCodeWithCountry();
});

// Form submit and toast
document.getElementById("contactForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);

  fetch("ajax/contact-handler.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    const toast = document.getElementById("toast");
    toast.textContent = data.message;
    toast.className = "toast show " + (data.success ? "bg-success text-white" : "bg-danger text-white");
    if (data.success) form.reset();
    setTimeout(() => {
      toast.className = "toast";
      toast.textContent = "";
    }, 3000);
  })
  .catch(() => {
    const toast = document.getElementById("toast");
    toast.textContent = "Failed to send message. Please try again.";
    toast.className = "toast show bg-danger text-white";
    setTimeout(() => {
      toast.className = "toast";
      toast.textContent = "";
    }, 3000);
  });
});
</script>
<?php include 'includes/footer.php'; ?>
