<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit();
}

include 'includes/db.php';
$blogs = [];
$result = $conn->query("SELECT id, title, author, published_at FROM blogs ORDER BY published_at DESC");
while ($row = $result->fetch_assoc()) {
  $blogs[] = $row;
}
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="d-flex flex-column min-vh-100" style="margin-left:220px;">
  <main class="admin-main flex-grow-1 px-2 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Blog Post</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">+ Add Blog</button>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle bg-white rounded shadow-sm overflow-hidden">
        <thead class="table-light">
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
<?php foreach ($blogs as $blog): ?>
  <tr>
    <td><?= htmlspecialchars($blog['title']) ?></td>
    <td><?= htmlspecialchars($blog['author']) ?></td>
    <td><?= date('M d, Y', strtotime($blog['published_at'])) ?></td>
    <td>
      <button class='btn btn-sm btn-primary btn-edit' data-id='<?= $blog['id'] ?>'>Edit</button>
      <button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal' data-id='<?= $blog['id'] ?>'>Delete</button>
    </td>
  </tr>
<?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
</div>

<!-- Add Blog Modal -->
<div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="addBlogForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="addBlogLabel">Add Blog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label>Featured Image</label>
            <input type="file" name="thumbnail" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label>Category</label>
            <select name="category" class="form-select">
              <option value="marketing">Marketing</option>
              <option value="social">Social Media</option>
              <option value="content">Content</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label>Content</label>
            <textarea name="content" id="content" class="form-control" rows="5"></textarea>
          </div>
          <div class="form-group mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control"></textarea>
          </div>
          <div class="form-group mb-3">
            <label>Status</label><br>
            <input type="radio" name="status" value="published" checked> Published
            <input type="radio" name="status" value="draft"> Draft
          </div>
          <div class="form-group mb-3">
            <label>Publish Date</label>
            <input type="date" name="published_at" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Blog Modal -->
<div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editBlogForm" enctype="multipart/form-data">
        <input type="hidden" name="id" id="edit-id">
        <div class="modal-header">
          <h5 class="modal-title" id="editBlogLabel">Edit Blog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Add fields for editing, matching your Add Blog Modal, but with unique IDs -->
          <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" id="edit-title" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label>Slug</label>
            <input type="text" name="slug" id="edit-slug" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label>Author</label>
            <input type="text" name="author" id="edit-author" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label>Featured Image (leave empty to keep existing)</label>
            <input type="file" name="thumbnail" class="form-control">
            <div id="edit-thumbnail-preview" style="margin-top:10px;"></div>
          </div>
          <div class="form-group mb-3">
            <label>Category</label>
            <select name="category" id="edit-category" class="form-select">
              <option value="marketing">Marketing</option>
              <option value="social">Social Media</option>
              <option value="content">Content</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label>Content</label>
            <textarea name="content" id="edit-content" class="form-control" rows="5"></textarea>
          </div>
          <div class="form-group mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" id="edit-meta-title" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" id="edit-meta-description" class="form-control"></textarea>
          </div>
          <div class="form-group mb-3">
            <label>Status</label><br>
            <input type="radio" name="status" id="edit-status-published" value="published"> Published
            <input type="radio" name="status" id="edit-status-draft" value="draft"> Draft
          </div>
          <div class="form-group mb-3">
            <label>Publish Date</label>
            <input type="date" name="published_at" id="edit-published-at" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this blog post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/c6dnzoialg8zo3sb0ymi2pq3fwr09mpe8pqy4vtef212k4gf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  tinymce.init({
    selector: 'textarea[name="content"]',
    height: 300
  });

  document.querySelectorAll("[data-bs-target='#confirmDeleteModal']").forEach(button => {
    button.addEventListener("click", function () {
      const blogId = this.getAttribute("data-id");
      document.getElementById("confirmDeleteBtn").setAttribute("data-id", blogId);
    });
  });

  document.getElementById("confirmDeleteBtn").addEventListener("click", function () {
    const blogId = this.getAttribute("data-id");
    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("id", blogId);
    fetch("ajax/blog_handler.php", {
      method: "POST",
      body: formData
    }).then(res => res.json()).then(data => {
      alert(data.message);
      if (data.success) location.reload();
    });
  });

  document.getElementById("addBlogForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    formData.set("content", tinymce.get("content").getContent());
    formData.set("action", "add");

    fetch("ajax/blog_handler.php", {
      method: "POST",
      body: formData
    }).then(res => res.json())
      .then(data => {
        alert(data.message);
        if (data.success) location.reload();
      });
  });
});
document.querySelectorAll(".btn-edit").forEach(button => {
  button.addEventListener("click", function () {
    const blogId = this.getAttribute("data-id");
    fetch("ajax/get_blog.php?id=" + blogId)
      .then(res => res.json())
      .then(data => {
        // Fill form fields
        document.getElementById("edit-id").value = data.id;
        document.getElementById("edit-title").value = data.title;
        document.getElementById("edit-slug").value = data.slug;
        document.getElementById("edit-author").value = data.author;
        document.getElementById("edit-category").value = data.category;
        document.getElementById("edit-meta-title").value = data.meta_title || '';
        document.getElementById("edit-meta-description").value = data.meta_description || '';
        document.getElementById("edit-published-at").value = data.published_at ? data.published_at.substr(0,10) : '';
        if (window.tinymce && tinymce.get("edit-content")) {
          tinymce.get("edit-content").setContent(data.content || "");
        } else {
          document.getElementById("edit-content").value = data.content || "";
        }

        // Status radio
        document.getElementById("edit-status-published").checked = data.status === "published";
        document.getElementById("edit-status-draft").checked = data.status === "draft";
        // Image preview
        document.getElementById("edit-thumbnail-preview").innerHTML = data.thumbnail
          ? `<img src="admin/${data.thumbnail}" style="max-width:120px;max-height:60px;border-radius:6px">`
          : '';
        // Open modal
        var editModal = new bootstrap.Modal(document.getElementById('editBlogModal'));
        editModal.show();
      });
  });
});

// Handle Edit form submission (AJAX)
document.getElementById("editBlogForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);
  formData.set("action", "edit");
  fetch("ajax/blog_handler.php", {
    method: "POST",
    body: formData
  }).then(res => res.json())
    .then(data => {
      alert(data.message);
      if (data.success) location.reload();
    });
});

</script>
