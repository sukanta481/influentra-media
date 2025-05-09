<?php include 'includes/header.php'; ?>
<style>
  .contact-section {
    background: linear-gradient(to bottom right, #f9fbff, #ffffff);
    padding: 60px 0;
  }
  .contact-form-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 0 30px rgba(0,0,0,0.05);
  }
  .contact-img {
    max-width: 260px;
    border-radius: 12px;
  }
  .contact-info {
    background-color: #f9f9f9;
    border-radius: 15px;
    padding: 25px;
    font-size: 15px;
    box-shadow: 0 0 10px rgba(0,0,0,0.03);
  }
</style>

<section class="contact-section">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Contact Us</h2>
      <p class="text-muted">Got a question? Fill up this form and get in touch with us quickly!</p>
    </div>
    <div class="row align-items-start">
      <div class="col-lg-6">
        <div class="contact-form-card">
          <form id="contactForm" method="POST">
            <div class="mb-3">
              <label class="form-label">Choose Topic</label>
              <select class="form-select" name="topic" required>
                <option value="">Choose topic</option>
                <option value="Support">Support</option>
                <option value="Partnership">Partnership</option>
                <option value="General">General</option>
              </select>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Name*</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email*</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Country</label>
                <input type="text" class="form-control" name="country" value="United States of America">
              </div>
              <div class="col-md-6">
                <label class="form-label">Select City</label>
                <select class="form-select" name="city">
                  <option value="Kolkata">Kolkata</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Delhi">Delhi</option>
                </select>
              </div>
              <div class="col-md-3">
                <label class="form-label">Code</label>
                <input type="text" class="form-control" name="phone_code" value="+1">
              </div>
              <div class="col-md-9">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number">
              </div>
              <div class="col-12">
                <label class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="4" required></textarea>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 mt-2 fw-bold">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6 mt-5 mt-lg-0 text-center">
        <img src="img/contact-img.png" class="contact-img mb-4" alt="Contact Visual">
        <div class="contact-info text-start">
          <h5>📍 Address</h5>
          <p><strong>Softz Solutions & Co Pvt Ltd.</strong><br>796, Purbachal Main Road, Second St, Gitanjali Park, Kolkata – 700078, West Bengal, India</p>
          <h5 class="mt-4">📧 Connect with us</h5>
          <p>General Enquiry: <a href="mailto:contact@influglue.com">contact@influglue.com</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
  <div id="contactToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">Message sent successfully!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<!-- AJAX Script -->
<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);

  const response = await fetch('contact-handler.php', {
    method: 'POST',
    body: formData
  });

  const result = await response.json();
  if (result.success) {
    form.reset();
    const toast = new bootstrap.Toast(document.getElementById('contactToast'));
    toast.show();
  } else {
    alert(result.message || 'Something went wrong.');
  }
});
</script>

<?php include 'includes/footer.php'; ?>
