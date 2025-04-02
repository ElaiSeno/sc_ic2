<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log-In</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootswatch/bootstrap.min.css" />
    <link rel="website icon" type="png" sizes="32x32" href="../../img/logo/PTCI-logo.png">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h1 class="text-center mb-4">Log In</h1>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>

                <form action="../../back-end/validation/login_process.php" method="POST">
                    <div class="mb-3">
                        <label for="SchoolID" class="form-label">School ID</label>
                        <input type="text" name="SchoolID" class="form-control" id="SchoolID" placeholder="School ID" required />
                    </div>

                    <div class="mb-3">
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" name="LastName" class="form-control" id="LastName" placeholder="Last Name" required />
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                    <hr />
                    <a href="../public/home.php" class="btn btn-link w-100">Go Back</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>