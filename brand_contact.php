<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/toast.css" />
<style>
  .spinner-border { width: 1.5rem; height: 1.5rem; border-width: .2em; }
  .success-checkmark {
    display: flex; justify-content: center; align-items: center; margin: 30px 0;
    height: 60px; width: 60px; border-radius: 50%; background: #1abc9c;
    animation: popin 0.5s cubic-bezier(.6,-0.28,.74,1.24);
  }
  .success-checkmark i {
    font-size: 2.2rem; color: #fff;
    animation: checkin 0.7s cubic-bezier(.6,-0.28,.74,1.24);
  }
  @keyframes checkin { 0%{ opacity:0; transform:scale(0.4);} 100%{ opacity:1; transform:scale(1);} }
</style>
<div class="container py-5">
  <h2 class="text-center fw-bold mb-3">Contact Us for Brand Collaboration</h2>
  <p class="text-center text-muted mb-4">Let's grow your brand together. Fill out the form and our team will reach you!</p>
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow-sm border-0">
        <div class="card-body p-4">
          <form id="brandForm" autocomplete="off" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Brand Name*</label>
                <input type="text" class="form-control" name="brand_name" required>
                <div class="invalid-feedback">Brand name is required.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Contact Person*</label>
                <input type="text" class="form-control" name="contact_person" required>
                <div class="invalid-feedback">Contact person is required.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Email*</label>
                <input type="email" class="form-control" name="email" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Phone*</label>
                <div class="input-group">
                  <select class="form-select" id="phone_code" name="phone_code" style="max-width:90px;">
                    <option value="+1" selected>+1 (USA)</option>
                    <option value="+91">+91 (India)</option>
                    <option value="+44">+44 (UK)</option>
                    <option value="+61">+61 (Australia)</option>
                  </select>
                  <input type="tel" class="form-control" name="phone_number" pattern="^[0-9\-+()\s]{7,15}$" required>
                  <div class="invalid-feedback">Valid phone is required.</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Country*</label>
                <select class="form-select" id="country" name="country" required>
                  <option value="United States" data-code="+1" selected>United States</option>
                  <option value="India" data-code="+91">India</option>
                  <option value="United Kingdom" data-code="+44">United Kingdom</option>
                  <option value="Australia" data-code="+61">Australia</option>
                </select>
                <div class="invalid-feedback">Country is required.</div>
              </div>
              <div class="col-md-6 mb-3 position-relative">
                <label class="form-label">City*</label>
                <input type="text" class="form-control" id="city" name="city" list="city-list" required autocomplete="off">
                <datalist id="city-list"></datalist>
                <div class="invalid-feedback">City is required.</div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Website</label>
              <input type="url" class="form-control" name="website" placeholder="https://">
            </div>
            <div class="mb-3">
              <label class="form-label">What are you looking for?*</label>
              <select class="form-select" name="interest" required>
                <option value="">Select...</option>
                <option>Influencer Marketing</option>
                <option>Product Review Campaign</option>
                <option>Social Media Campaign</option>
                <option>Brand Awareness</option>
                <option>UGC Content</option>
                <option>Other</option>
              </select>
              <div class="invalid-feedback">Please select an option.</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Describe Your Brand / Project*</label>
              <textarea class="form-control" name="message" rows="4" required></textarea>
              <div class="invalid-feedback">Please tell us about your project.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100" id="submitBtn">
              <span id="btnText">Submit</span>
              <span id="spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
            </button>
          </form>
          <div id="brandSuccess" class="text-center d-none">
            <div class="success-checkmark mx-auto mb-2"><i class="bi bi-check2"></i></div>
            <h5 class="fw-bold">Thank you!<br>Your message has been sent.</h5>
            <div class="mt-3"><a href="index.php" class="btn btn-outline-primary">Back to Home</a></div>
          </div>
        </div>
      </div>
      <div id="toast" class="toast position-fixed top-0 start-50 translate-middle-x mt-4" style="z-index: 1055; min-width:250px;"></div>
    </div>
  </div>
</div>
<script>
const cityOptions = {
  "United States": ["New York", "Los Angeles", "Chicago", "Houston", "Miami"],
  "India": ["Mumbai", "Delhi", "Bangalore", "Kolkata", "Chennai"],
  "United Kingdom": ["London", "Manchester", "Birmingham", "Liverpool"],
  "Australia": ["Sydney", "Melbourne", "Brisbane", "Perth"]
};
document.getElementById('country').addEventListener('change', function() {
  // Country code sync
  const code = this.selectedOptions[0].dataset.code;
  if (code) document.getElementById('phone_code').value = code;
  // City autocomplete
  const country = this.value, cityList = document.getElementById('city-list');
  cityList.innerHTML = "";
  (cityOptions[country] || []).forEach(function(city) {
    const opt = document.createElement('option'); opt.value = city; cityList.appendChild(opt);
  });
});
document.querySelectorAll('#brandForm input, #brandForm textarea, #brandForm select').forEach(function(field) {
  field.addEventListener('input', function() {
    if (field.checkValidity()) field.classList.remove('is-invalid');
  });
});
document.getElementById("brandForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = e.target; let valid = true;
  form.querySelectorAll('input, select, textarea').forEach(function(field) {
    if (!field.checkValidity()) { field.classList.add('is-invalid'); valid = false; }
  });
  if (!valid) return;
  document.getElementById('btnText').textContent = 'Submitting...';
  document.getElementById('spinner').classList.remove('d-none');
  document.getElementById('submitBtn').disabled = true;
  const formData = new FormData(form);
  fetch("ajax/brand-handler.php", { method: "POST", body: formData })
  .then(res => res.json())
  .then(data => {
    document.getElementById('btnText').textContent = 'Submit';
    document.getElementById('spinner').classList.add('d-none');
    document.getElementById('submitBtn').disabled = false;
    if (data.success) {
      form.classList.add('d-none');
      document.getElementById('brandSuccess').classList.remove('d-none');
    } else {
      showToast(data.message || "Failed to send. Try again.", "error");
    }
  })
  .catch(() => {
    document.getElementById('btnText').textContent = 'Submit';
    document.getElementById('spinner').classList.add('d-none');
    document.getElementById('submitBtn').disabled = false;
    showToast("Failed to send. Try again.", "error");
  });
});
function showToast(message, type = "success") {
  const toast = document.getElementById("toast");
  toast.textContent = message;
  toast.className = "toast show " + (type === "success" ? "bg-success text-white" : "bg-danger text-white");
  setTimeout(() => { toast.className = "toast"; toast.textContent = ""; }, 3000);
}
</script>
<?php include 'includes/footer.php'; ?>
