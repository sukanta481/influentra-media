<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/toast.css" />
<div class="container py-5">
  <h2 class="text-center fw-bold mb-2">Become an Influencer Partner</h2>
  <p class="text-center text-muted mb-4">Fill in your details to join our influencer network.</p>
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow-sm border-0">
        <div class="card-body p-4">
          <form id="influencerForm" autocomplete="off">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Instagram Handle</label>
                <input type="text" name="instagram_handle" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">YouTube Channel</label>
                <input type="text" name="youtube_channel" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">TikTok Handle</label>
                <input type="text" name="tiktok_handle" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Niche</label>
                <input type="text" name="niche" class="form-control" placeholder="e.g. Fashion, Tech, Music" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Phone Code</label>
                <input type="text" name="phone_code" class="form-control" value="+1">
              </div>
              <div class="col-md-8 mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Followers Count</label>
              <input type="text" name="followers_count" class="form-control" placeholder="e.g. 10,000">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="message" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
        </div>
      </div>
      <div id="toast" class="toast position-fixed top-0 start-50 translate-middle-x mt-4" style="z-index:1055; min-width:250px;"></div>
    </div>
  </div>
</div>
<script>
document.getElementById("influencerForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);

  fetch("ajax/influencer-handler.php", {
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
    toast.textContent = "Failed to send. Try again.";
    toast.className = "toast show bg-danger text-white";
    setTimeout(() => { toast.className = "toast"; toast.textContent = ""; }, 3000);
  });
});
</script>
<?php include 'includes/footer.php'; ?>
