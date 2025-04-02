<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootswatch/bootstrap.min.css" />
    <link rel="website icon" type="png" sizes="32x32" href="../../img/logo/PTCI-logo.png">
  </head>
  <body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="card" style="width: 100%; max-width: 500px;">
      <div class="card-body">
        <div class="text-center">
          <h1 class="mb-4">Register</h1>
        </div>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
          <div class="alert alert-success" role="alert">
            Registration successful! You can now <a href="login.php" class="alert-link">log in</a>.
          </div>
        <?php endif; ?>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'exists'): ?>
          <div class="alert alert-danger" role="alert">
            This School ID is already registered. Please use a different ID or <a href="login.php" class="alert-link">log in</a> if this is your account.
          </div>
        <?php endif; ?>
        <form action="../../back-end/registerquery.php" method="POST" id="register">
          <div class="mb-3">
            <label for="schoolID" class="form-label">School ID</label>
            <input type="text" name="SchoolID" id="schoolID" class="form-control" placeholder="Enter School ID" required />
          </div>

          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" name="AccountName" id="firstName" class="form-control" placeholder="Enter First Name" required />
          </div>

          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" name="LastName" id="lastName" class="form-control" placeholder="Enter Last Name" required />
          </div>

          <!-- department selection -->
          <div style="margin-bottom: 20px;">
            <label for="exampleSelect1" class="form-label mt-4">Department</label>
            <select class="form-select" id="exampleSelect1" name="Department">
              <option value="">Select Department</option>
              <option value="Senior Highschool">Senior Highschool</option>
              <option value="Associate in Computer Technology">Associate in Computer Technology</option>
              <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
              <option value="Bachelor of Science in Information Communication Technology">Bachelor of Science in Information Communication Technology</option>
              <option value="Bachelor of Science in Information Systems">Bachelor of Science in Information Systems</option>
              <option value="Bachelor of Science in Office Administration">Bachelor of Science in Office Administration</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <hr class="my-4" />
        <p class="text-center">
          Already have an account? <a href="login.php" class="btn btn-link">Log In</a>
        </p>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
