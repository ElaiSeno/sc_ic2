<?php
include ('../../partial/connection.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php?error=You must log in first.");
    exit();
}

// president
$sql = "SELECT `id`, `full_name`, `course`, `slogan`, `image`, `created_at` FROM `president_candidates` WHERE 1";
$presidentResult = $conn->query($sql);

if ($presidentResult->num_rows > 0) {
    $candidates = []; 
    // Loop through each president 
    while ($president = $presidentResult->fetch_assoc()) {
        $candidates[] = $president;
    }
} else {
    $candidates = [];
}

// vice president
$vicePresidentSql = "SELECT `id`, `full_name`, `course`, `slogan`, `image`, `created_at` FROM `vice_president_candidates` WHERE 1";
$vicePresidentResult = $conn->query($vicePresidentSql);

if ($vicePresidentResult->num_rows > 0) {
    $viceCandidates = [];
    // Loop through each vice president 
    while ($vicePresident = $vicePresidentResult->fetch_assoc()) {
        $viceCandidates[] = $vicePresident;
    }
} else {
    $viceCandidates = [];
}

echo '<div id="alert-container" style="
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
    display: none;
"></div>';

// pop up
if (isset($_GET['error']) || isset($_GET['success'])) {
    $alertClass = isset($_GET['error']) ? 'alert-danger' : 'alert-success';
    $message = isset($_GET['error']) ? $_GET['error'] : $_GET['success'];
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            showAlert("' . htmlspecialchars($message) . '", "' . $alertClass . '");
        });
    </script>';
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>PTCI Website</title>
    <link
      rel="stylesheet"
      href="../../assets/bootstrap/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap"
    />
    <link rel="stylesheet" href="../../assets/css/swiper-icons.css" />
    <link
      rel="stylesheet"
      href="../../assets/css/Navbar-Right-Links-Dark-icons.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/css/Simple-Slider-swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../../assets/css/Simple-Slider.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
    <link rel="stylesheet" href="../../assets/css/untitled.css" />
    <link rel="stylesheet" href="../../img/logo/PTCI-logo.png">
  </head>

  <body style="background: #fbf9e4; margin-top: 124px; margin-bottom: 46px">
    <nav
      class="navbar navbar-expand-md fixed-top py-3"
      style="padding: 0px; width: 100vw; background: #122c4f"
      data-bs-theme="dark"
    >
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#"
          ><span style="font-family: Poppins, sans-serif"
            >PTCI Student Council Election</span
          ></a
        ><button
          data-bs-toggle="collapse"
          class="navbar-toggler"
          data-bs-target="#navcol-5"
          style="font-family: Poppins, sans-serif"
        >
          <span class="visually-hidden" style="font-family: Poppins, sans-serif"
            >Toggle navigation</span
          ><span
            class="navbar-toggler-icon"
            style="font-family: Poppins, sans-serif"
          ></span>
        </button>
        <div
          class="collapse navbar-collapse"
          id="navcol-5"
          style="transform-origin: 0px; font-family: Poppins, sans-serif"
        >
          <ul
            class="navbar-nav ms-auto"
            style="font-family: Poppins, sans-serif"
          >
            <li class="nav-item" style="font-family: Poppins, sans-serif">
              <a
                class="nav-link active"
                href="../public/home.php"
                style="
                  font-family: Poppins, sans-serif;
                  color: rgba(255, 255, 255, 0.55);
                "
                >Home</a
              >
            </li>
            <li class="nav-item" style="font-family: Poppins, sans-serif">
              <a
                class="nav-link"
                href="#"
                style="font-family: Poppins, sans-serif"
                >Candidates</a
              >
            </li>
            <li class="nav-item" style="font-family: Poppins, sans-serif"></li>
          </ul>
          <button
            class="btn btn-primary ms-md-2"
            type="button"
            style="
              font-family: Poppins, sans-serif;
              background: rgb(251, 249, 228);
              border-radius: 6px;
              border: 2.05263px solid #fbf9e4;
              color: #122c4f;
              font-weight: bold;
            "
            onclick="window.location.href='../../back-end/logout.php';"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1em"
              height="1em"
              viewBox="0 0 24 24"
              fill="none"
              style="width: 23.9868px; height: 22.9868px; margin-right: 8px"
            >
              <path
                d="M8.51428 20H4.51428C3.40971 20 2.51428 19.1046 2.51428 18V6C2.51428 4.89543 3.40971 4 4.51428 4H8.51428V6H4.51428V18H8.51428V20Z"
                fill="currentColor"
              ></path>
              <path
                d="M13.8418 17.385L15.262 15.9768L11.3428 12.0242L20.4857 12.0242C21.038 12.0242 21.4857 11.5765 21.4857 11.0242C21.4857 10.4719 21.038 10.0242 20.4857 10.0242L11.3236 10.0242L15.304 6.0774L13.8958 4.6572L7.5049 10.9941L13.8418 17.385Z"
                fill="currentColor"
              ></path>
            </svg>
            LOGOUT
          </button>
        </div>
      </div>
    </nav>
    <div class="container" style="margin-top: 35px">
      <div
        id="voting-wrapper"
        style="
          background: #ffffff;
          padding: 25px;
          margin-right: 20px;
          margin-left: 20px;
          margin-top: 12px;
          border-top: 5px solid rgb(85, 145, 204);
          box-shadow: 0px 0px 19px rgba(33, 37, 41, 0.17);
          border-radius: 6px;
        "
      >
        <div id="voting-heading-wrap">
          <h1
            style="
              font-family: Poppins, sans-serif;
              font-weight: bold;
              font-size: 27px;
              color: rgb(75, 90, 105);
            "
          >
            Cast your vote
          </h1>
          <div id="instructions-wrapper">
            <p style="font-weight: bold; margin-bottom: 9px">Instructions</p>
            <p style="margin-bottom: 2px; margin-left: 27px">
              •&nbsp; Select your preferred candidates for each position and
              click 'Submit Vote' to finalize your choices.
            </p>
            <p style="margin-left: 27px; margin-top: 7px">
              •&nbsp; Ensure that you have reviewed your selections carefully
              before submitting, as changes cannot be made after submission.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-row" id="candidates" style="margin-top: 37px">
      <!-- President Candidates -->
      <div
        class="container flex-row justify-content-center justify-content-md-start"
        id="pres-wrapper"
        style="margin-top: 24px; padding-top: 65px; background: #86a2bc"
      >
        <div
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <h1
            style="
              font-family: Poppins, sans-serif;
              font-size: 33px;
              color: rgb(255, 255, 255);
              font-weight: bold;
              margin-bottom: 4px;
            "
          >
            Candidates for President
          </h1>
          <div style="width: 148px; background: #fbf9e4; height: 3px"></div>
        </div>

        <div
          class="d-flex flex-column justify-content-center align-items-center"
          id="candidates-wrapper-flex"
          style="overflow: visible; color: #122c4f; margin-top: 41px"
        >
          <?php foreach ($candidates as $president) : ?>
          <div
            class="d-flex align-items-lg-center radio-pres_candidate"
            id="president_<?= $president['id'] ?>"
            style="
              background: #ffffff;
              border-radius: 16px;
              padding: 21px;
              margin-bottom: 34px;
              border: 2px solid rgba(0, 0, 0, 0.15);
            "
            onclick="selectCandidate('president_<?= $president['id'] ?>')"
          >
            <!-- Uploads root -->
            <img
              class="candidate-pic"
              src="uploads/<?= $president['image'] ?>"
              onerror="this.onerror=null; this.src='uploads/default.jpg';"
            />

            <div class="flex-row" style="margin-left: 33px; margin-top: 17px">
              <h1
                class="candidate-name"
                style="
                  font-family: Poppins, sans-serif;
                  font-weight: bold;
                  color: rgb(75, 90, 105);
                "
              >
                <?= htmlspecialchars($president['full_name']) ?>
              </h1>
              <h1
                class="candidate-dept"
                style="
                  font-family: Poppins, sans-serif;
                  font-weight: bold;
                  color: rgb(75, 90, 105);
                  margin-top: -7px;
                "
              >
                <?= htmlspecialchars($president['course']) ?>
              </h1>
              <p
                class="candidate-desc"
                style="margin-top: 7px; text-align: justify"
              >
                <?= htmlspecialchars($president['slogan']) ?>
              </p>
            </div>
            <input type="radio" class="d-none" />
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Vice President Candidates -->
      <div
        class="container flex-row justify-content-center justify-content-md-start"
        id="vpres-wrapper"
        style="margin-top: 24px; padding-top: 65px"
      >
        <div
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <h1
            style="
              font-family: Poppins, sans-serif;
              font-size: 33px;
              color: rgb(75, 90, 105);
              font-weight: bold;
              margin-bottom: 4px;
            "
          >
            Candidates for Vice President
          </h1>
          <div style="width: 148px; background: #5b88b2; height: 3px"></div>
        </div>

        <div
          class="d-flex flex-column justify-content-center align-items-center"
          id="candidates-wrapper-flex-1"
          style="
            overflow: visible;
            margin-left: -23px;
            color: #122c4f;
            margin-top: 41px;
          "
        >
          <?php foreach ($viceCandidates as $vicePresident) : ?>
          <div
            class="d-flex align-items-lg-center radio-pres_candidate"
            id="vpresident_<?= $vicePresident['id'] ?>"
            style="
              background: #ffffff;
              border-radius: 10px;
              margin-bottom: 34px;
              border: 2px solid rgba(0, 0, 0, 0.15);
              padding: 21px;
            "
            onclick="selectCandidate('vpresident_<?= $vicePresident['id'] ?>')"
          >
            <img
              class="candidate-pic"
              src="uploads/<?= $vicePresident['image'] ?>"
              onerror="this.onerror=null; this.src='uploads/default.jpg';"
            />
            <div class="flex-row" style="margin-left: 33px; margin-top: 17px">
              <h1
                class="candidate-name"
                style="
                  font-family: Poppins, sans-serif;
                  font-weight: bold;
                  color: rgb(75, 90, 105);
                "
              >
                <?= htmlspecialchars($vicePresident['full_name']) ?>
              </h1>
              <h1
                class="candidate-dept"
                style="
                  font-family: Poppins, sans-serif;
                  font-weight: bold;
                  color: rgb(75, 90, 105);
                  margin-top: -7px;
                "
              >
                <?= htmlspecialchars($vicePresident['course']) ?>
              </h1>
              <p
                class="candidate-desc"
                style="margin-top: 7px; text-align: justify"
              >
                <?= htmlspecialchars($vicePresident['slogan']) ?>
              </p>
            </div>
            <input type="radio" class="d-none" />
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <?php
mysqli_close($conn);
?>

    <div id="vicepres-wrapper"></div>
    <div
      class="container d-xxl-flex justify-content-xxl-center align-items-xxl-start"
      style="margin-top: 35px"
    >
      <div
        id="voting-wrapper-1"
        style="
          background: #ffffff;
          padding: 25px;
          margin-right: 20px;
          margin-left: 20px;
          margin-top: 12px;
          border-top: 5px solid rgb(85, 145, 204);
          box-shadow: 0px 0px 19px rgba(33, 37, 41, 0.17);
          border-radius: 6px;
          width: 974.02px;
        "
      >
        <div id="voting-heading-wrap-1">
          <div id="instructions-wrapper-1">
            <p style="font-weight: bold; margin-bottom: 9px">Instructions</p>
            <p style="margin-bottom: 2px; margin-left: 27px">
              •&nbsp; Select your preferred candidates for each position and
              click 'Submit Vote' to finalize your choices.
            </p
            <p style="margin-left: 27px; margin-top: 7px">
              •&nbsp; Ensure that you have reviewed your selections carefully
              before submitting, as changes cannot be made after submission.
            </p>
          </div>
        </div>
        <form method="POST" action="../../back-end/submitvote.php">
            <input type="hidden" name="president_id" id="president_input" value="">
            <input type="hidden" name="vice_president_id" id="vice_president_input" value="">
            
            <!-- submit button -->
            <div class="text-end" style="margin-top: 28px">
                <button
                    class="btn btn-primary ms-md-2"
                    type="submit"
                    name="submit_vote"
                    style="
                        font-family: Poppins, sans-serif;
                        background: rgb(41, 231, 143);
                        border-radius: 6px;
                        border: 2.05263px solid #fbf9e4;
                        color: #040404;
                        font-size: 20px;
                    "
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="width: 23.9868px; height: 22.9868px; margin-right: 8px">
                        <path d="M10.5858 13.4142L7.75735 10.5858L6.34314 12L10.5858 16.2427L17.6568 9.1716L16.2426 7.75739L10.5858 13.4142Z" fill="currentColor"></path>
                    </svg>SUBMIT
                </button>
            </div>
        </form>
      </div>
    </div>
    <footer class="text-center py-4" style="margin-bottom: -589px">
      <footer class="text-white bg-dark" style="margin-bottom: -36px">
        <div class="container py-4 py-lg-5" style="margin-bottom: -39px">
          <div class="row justify-content-center">
            <div
              class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column align-items-xxl-center item"
            >
              <img
                src="../../assets/img/294834923_451650346969401_7788761739934683317_n__1_-removebg-preview.png"
                style="width: 176.02px; margin-bottom: 13px"
              />
              <p style="margin-left: 27px; margin-top: 7px">
                Palawan Technological College Inc.
              </p>
            </div>
            <div
              class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item"
              style="padding-left: 51px"
            >
              <h3 class="fs-6 text-white" style="margin-top: 29px">Contacts</h3>
              <ul class="list-unstyled">
                <li
                  class="d-xxl-flex align-items-xxl-center"
                  style="margin-bottom: 3px"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1em"
                    height="1em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    class="bi bi-facebook"
                    style="
                      width: 14.9868px;
                      margin-right: 15px;
                      margin-left: 16px;
                      margin-bottom: 3px;
                    "
                  >
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"
                    ></path></svg
                  ><a
                    class="link-light"
                    href="https://www.facebook.com/profile.php?id=100063733196484"
                    style="margin-bottom: 3px"
                    >Official Page PTCI</a
                  >
                </li>
                <li
                  class="d-xxl-flex align-items-xxl-center"
                  style="margin-bottom: 3px"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1em"
                    height="1em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    class="bi bi-facebook"
                    style="
                      width: 14.9868px;
                      margin-right: 15px;
                      margin-left: 16px;
                      margin-bottom: 3px;
                    "
                  >
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"
                    ></path></svg
                  ><a
                    class="link-light"
                    href="https://www.facebook.com/profile.php?id=100064562656878"
                    style="margin-bottom: 3px"
                    >PTCI&nbsp;Student Council</a
                  >
                </li>
                <li
                  class="d-xxl-flex align-items-xxl-center"
                  style="margin-bottom: 3px"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1em"
                    height="1em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    class="bi bi-facebook"
                    style="
                      width: 14.9868px;
                      margin-right: 15px;
                      margin-left: 16px;
                    "
                  >
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"
                    ></path></svg
                  ><a
                    class="link-light"
                    href="https://www.facebook.com/profile.php?id=61566114403265"
                    >IC2&nbsp;</a
                  >
                </li>
              </ul>
            </div>
            <div
              class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social"
              style="padding-left: 51px"
            >
              <h3 class="fs-6 text-white" style="margin-top: 29px">
                Directory
              </h3>
              <a class="link-light" href="index.html" style="margin-bottom: 3px"
                >Home</a
              ><a
                class="link-light"
                href="candidates.html"
                style="margin-bottom: 3px"
                >Candidates</a
              >
            </div>
          </div>
          <hr />
          <div class="d-flex justify-content-between align-items-center pt-3">
            <p class="mb-0">
              Copyright © 2025 Palawan Technological College Inc. All rights
              reserved.
            </p>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">Powered by&nbsp;</li>
              <li class="list-inline-item">
                <img
                  src="../../assets/img/461514192_122108110472537146_3222580666165080691_n-removebg-preview.png"
                  style="width: 69px"
                />
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/untitled.js"></script>
    <script>
      function selectCandidate(candidateId) {
        const clickedElement = document.getElementById(candidateId);
        const isPresident = candidateId.startsWith('president_');

        const candidates = isPresident
            ? document.querySelectorAll("#pres-wrapper .radio-pres_candidate")
            : document.querySelectorAll("#vpres-wrapper .radio-pres_candidate");

        candidates.forEach((candidate) => {
            candidate.style.border = "2px solid rgba(0, 0, 0, 0.15)";
        });

        clickedElement.style.border = isPresident 
            ? "4px solid #00FFD1"
            : "4px solid #05B0D6";

        // Update the hidden inputs - extract just the ID number
        const candidateValue = candidateId.split('_')[1];
        if (isPresident) {
            document.getElementById('president_input').value = candidateValue;
        } else {
            document.getElementById('vice_president_input').value = candidateValue;
        }
      }

      function showAlert(message, alertClass) {
        const alertContainer = document.getElementById('alert-container');
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert ${alertClass} alert-dismissible fade show`;
        alertDiv.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        alertContainer.style.display = 'block';
        alertContainer.appendChild(alertDiv);

        // pop up dom, fade-out
        setTimeout(() => {
            alertDiv.classList.remove('show');
            setTimeout(() => {
                alertDiv.remove();
                if (alertContainer.children.length === 0) {
                    alertContainer.style.display = 'none';
                }
            }, 150);
        }, 3000);
    }
    </script>
  </body>
</html>
