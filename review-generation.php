<?php include 'includes/header.php'; ?>
<div class="container py-5 simple-page">
  <img src="img/service-placeholder.jpg" class="img-fluid mb-4 service-cover" alt="Service Cover">
  <h1 class="text-center">Review Generation</h1>
  <p class="lead text-center">Details about our Review Generation service will be placed here.</p>
</div>

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

<?php include 'includes/footer.php'; ?>
