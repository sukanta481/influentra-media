<?php include 'includes/header.php'; ?>
<style>
  .contact-section {
    background: linear-gradient(135deg, #ffffff, #f7f9ff);
    padding: 60px 0;
  }
  .contact-form {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
  }
  .contact-right {
    text-align: center;
  }
  .contact-img {
    max-width: 300px;
    border-radius: 50%;
  }
  .contact-info {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 15px;
    margin-top: 30px;
  }
</style>

<section class="contact-section">
  <div class="container">
    <h2 class="text-center fw-bold mb-3">Contact Us</h2>
    <p class="text-center mb-5">Got a question? Fill up this form and get in touch with us quickly!</p>
    <div class="row align-items-center">
      <div class="col-lg-6">
        <form action="#" method="post" class="contact-form row g-3">
          <div class="col-12">
            <label class="form-label">Choose topic</label>
            <select class="form-select">
              <option selected disabled>Choose topic</option>
              <option>General Inquiry</option>
              <option>Support</option>
              <option>Partnership</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Name*</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email*</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Country</label>
            <select class="form-select">
              <option>United States of America</option>
              <option>India</option>
              <option>Other</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Select City</label>
            <select class="form-select">
              <option>Kolkata</option>
              <option>Delhi</option>
              <option>Mumbai</option>
            </select>
          </div>
          <div class="col-12 d-flex">
            <select class="form-select" style="max-width: 80px;">
              <option>+1</option>
              <option>+91</option>
            </select>
            <input type="text" class="form-control ms-2" placeholder="Phone Number">
          </div>
          <div class="col-12">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="4"></textarea>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" required>
              <label class="form-check-label">I’m not a robot</label>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100 fw-bold">Submit</button>
          </div>
        </form>
      </div>
      <div class="col-lg-6 contact-right mt-5 mt-lg-0">
        <img src="img/contact-img.png" class="contact-img mb-4" alt="Contact Image">
        <div class="contact-info">
          <h5 class="fw-bold">📍 Address</h5>
          <p>Softz Solutions & Co Pvt Ltd.<br>796, Purbachal Main Road, Second St, Gitanjali Park, Kolkata – 700078, West Bengal, India</p>
          <h5 class="fw-bold mt-3">📧 Connect with us</h5>
          <p>General Enquiry: <a href="mailto:contact@influglue.com">contact@influglue.com</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
