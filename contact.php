<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/toast.css" />
<div class="container py-5">
  <h2 class="text-center fw-bold">Contact Us</h2>
  <p class="text-center text-muted">Got a question? Fill up this form and get in touch with us quickly!</p>
  <div class="row mt-4 justify-content-center">
    <div class="col-md-6">
      <form id="contactForm">
        <div class="mb-3">
          <label class="form-label">Choose Topic</label>
          <select class="form-select" name="topic" required>
            <option value="">Choose topic</option>
            <option value="Support">Support</option>
            <option value="Sales">Sales</option>
            <option value="Partnership">Partnership</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Name*</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Email*</label>
            <input type="email" class="form-control" name="email" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Country</label>
            <select class="form-select" id="country" name="country" required></select>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Select City</label>
            <select class="form-select" id="city" name="city" required></select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Code</label>
            <input type="text" class="form-control" id="phone_code" name="phone_code" readonly>
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
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
      <img src="img/contact-graphic.png" alt="Contact" class="img-fluid mb-3" style="max-height: 300px;">
      <div class="text-center">
        <h5 class="fw-bold"><i class="bi bi-geo-alt-fill me-1"></i> Address</h5>
        <p>Softz Solutions & Co Pvt Ltd.<br>796, Purbachal Main Road, Second St,<br>Gitanjali Park, Kolkata – 700078, India</p>
        <h6 class="fw-bold mt-3"><i class="bi bi-envelope-at-fill me-1"></i> Connect with us</h6>
        <p>contact@influentra.media</p>
      </div>
    </div>
  </div>
</div>

<div id="toast" class="toast">Message sent successfully!</div>

<!-- Scripts -->
<script src="https://www.google.com/recaptcha/api.js?render=6LcSATQrAAAAAOhpBkallS2dklXwqe-nXlvFk-l2"></script>
<script src="js/country-city-handler.js"></script>
<script>
grecaptcha.ready(function () {
  grecaptcha.execute('6LcSATQrAAAAAOhpBkallS2dklXwqe-nXlvFk-l2', {action: 'submit'}).then(function (token) {
    document.getElementById('g-recaptcha-response').value = token;
  });
});

document.getElementById("contactForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);

  fetch("contact-handler.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'success') {
      document.getElementById("toast").classList.add("show");
      form.reset();
      setTimeout(() => {
        document.getElementById("toast").classList.remove("show");
      }, 3000);
    } else {
      alert("reCAPTCHA failed or server error.");
    }
  })
  .catch(() => alert("Failed to send message. Please try again."));
});
</script>
<?php include 'includes/footer.php'; ?>
