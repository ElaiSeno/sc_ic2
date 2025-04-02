<?php
session_start();

// Check status
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $vote_button = '<button class="btn btn-primary ms-md-2" type="button" style="font-family: Poppins, sans-serif;background: rgba(56,57,59,0);border-radius: 6px;border: 2.05263px solid #fbf9e4;" onclick="window.location.href=\'vote.php\';">VOTE NOW</button>';
} else {
    $vote_button = '<button class="btn btn-primary ms-md-2" type="button" style="font-family: Poppins, sans-serif;background: rgba(56,57,59,0);border-radius: 6px;border: 2.05263px solid #fbf9e4;" onclick="window.location.href=\'prompt.php\';">VOTE NOW</button>';
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PTCI Website</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="../../assets/css/swiper-icons.css">
    <link rel="stylesheet" href="../../assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="../../assets/css/responsiv_index.css">
    <link rel="stylesheet" href="../../assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="../../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="website icon" type="png" sizes="32x32" href="../../img/logo/PTCI-logo.png">
</head>

<body style="background: #efefef;border-radius: 22px;">
    <nav class="navbar navbar-expand-md fixed-top py-3" style="width: 100vw;background: #122c4f;box-shadow: 0px 0px 13px;" data-bs-theme="dark">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span style="font-family: Poppins, sans-serif;">PTCI Student Council Election</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5" style="font-family: Poppins, sans-serif;"><span class="visually-hidden" style="font-family: Poppins, sans-serif;">Toggle navigation</span><span class="navbar-toggler-icon" style="font-family: Poppins, sans-serif;"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5" style="transform-origin: 0px;font-family: Poppins, sans-serif;">
                <ul class="navbar-nav ms-auto" style="font-family: Poppins, sans-serif;">
                    <li class="nav-item" style="font-family: Poppins, sans-serif;"><a class="nav-link active" href="#" style="font-family: Poppins, sans-serif;">Home</a></li>
                    <li class="nav-item" style="font-family: Poppins, sans-serif;"><a class="nav-link" href="#" style="font-family: Poppins, sans-serif;">Candidates</a></li>
                    <li class="nav-item" style="font-family: Poppins, sans-serif;"></li>
                </ul><button class="btn btn-primary ms-md-2" id="voteButton" type="button" style="font-family: Poppins, sans-serif;background: rgba(56,57,59,0);border-radius: 6px;border: 2.05263px solid #fbf9e4;" onclick="navigateToVote()">VOTE NOW</button>
                <p id="votingMessage" style="display:none;"></p>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="votingClosedModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Voting Closed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Voting is now closed. You can no longer access the voting page.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:141px;">
        <div class="row justify-content-around">
            <div class="col-md-6 col-xxl-8">
                <div id="slider" class="slider" style="padding:25px;background:#ffffff;">
                    <div class="simple-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" style="background: url(&quot;../../assets/img/crocodile-farm.png&quot;) center center / cover no-repeat;"></div>
                                <div class="swiper-slide" style="background: url(&quot;../../assets/img/undergroundriver2.png&quot;) center center / cover no-repeat;"></div>
                                <div class="swiper-slide" style="background: url(&quot;../../assets/img/undergroundriver.png&quot;) center center / cover no-repeat;"></div>
                            </div>
                            <div class="visually-hidden visible swiper-pagination"></div>
                            <div class="swiper-button-prev" style="color:rgb(255,255,255);text-shadow:0px 0px 6px rgba(0,0,0,0.76);"></div>
                            <div class="swiper-button-next" style="color:rgb(255,255,255);text-shadow:0px 0px 6px rgba(0,0,0,0.76);"></div>
                        </div>
                    </div>
                </div>
                <div id="partylists-candidates" style="margin-top:17px;background:#ffffff;padding-top:10px;padding-left:20px;padding-right:20px;">
                    <div id="heading-partylists" class="heading-partylists" style="border-bottom:1px solid rgba(33,37,41,0.23);">
                        <h1 class="text-uppercase" style="font-size:15px;font-family:Poppins, sans-serif;font-weight:bold;">Party lists</h1>
                        <div style="width:86.02px;border-bottom:4px solid #5b88b2;"></div>
                    </div>
                    <div class="d-flex partylists-card" id="partylists-card" style="padding-top:20px;padding-bottom:20px;"><img id="partylist-img" class="partylist-img" src="../../assets/img/Yellow%20and%20Red%20Landscape%20Campaign%20Posters.png" style="width:307px;">
                        <div class="d-xxl-flex flex-column partylist-details" id="partylist-details" style="width:auto;margin-left:38px;">
                            <h1 id="partlyst-name" class="partlyst-name" style="font-family:Poppins, sans-serif;font-weight:bold;color:rgb(75,90,105);font-size:22px;">Party list #1</h1>
                            <h1 id="partylist-dept" class="partylist-dept" style="font-family:'Open Sans', sans-serif;color:rgb(75,90,105);font-size:18px;margin-top:-3px;">Department</h1>
                            <p style="text-align:justify;"><span style="color:rgb(18, 44, 79);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada nisl in arcu bibendum congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper nisl ac tempus fringilla.</span></p>
                            <div class="d-xxl-flex justify-content-xxl-start" id="button-wrapper"><button class="btn btn-primary ms-md-2" type="button" style="font-family:Poppins, sans-serif;background:rgba(56,57,59,0);border-radius:6px;border:2.05263px solid #122c4f;color:rgb(79,74,74);">READ MORE</button></div>
                        </div>
                    </div>
                    <div class="d-flex partylists-card" id="partylists-card-1" style="padding-top:20px;padding-bottom:20px;"><img id="partylist-img-1" class="partylist-img" src="../../assets/img/Yellow%20and%20Red%20Landscape%20Campaign%20Posters.png" style="width:307px;">
                        <div class="d-xxl-flex flex-column partylist-details" id="partylist-details-1" style="width:auto;margin-left:38px;">
                            <h1 id="partlyst-name-1" class="partlyst-name" style="font-family:Poppins, sans-serif;font-weight:bold;color:rgb(75,90,105);font-size:22px;">Party list #2</h1>
                            <h1 id="partylist-dept-1" class="partylist-dept" style="font-family:'Open Sans', sans-serif;color:rgb(75,90,105);font-size:18px;margin-top:-3px;">Department</h1>
                            <p style="text-align:justify;"><span style="color:rgb(18, 44, 79);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada nisl in arcu bibendum congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper nisl ac tempus fringilla.</span></p>
                            <div class="d-xxl-flex justify-content-xxl-start" id="button-wrapper-1"><button class="btn btn-primary ms-md-2" type="button" style="font-family:Poppins, sans-serif;background:rgba(56,57,59,0);border-radius:6px;border:2.05263px solid #122c4f;color:rgb(79,74,74);">READ MORE</button></div>
                        </div>
                    </div>
                    <div class="d-flex partylists-card" id="partylists-card-2" style="padding-top:20px;padding-bottom:20px;"><img id="partylist-img-2" class="partylist-img" src="../../assets/img/Yellow%20and%20Red%20Landscape%20Campaign%20Posters.png" style="width:307px;">
                        <div class="d-xxl-flex flex-column partylist-details" id="partylist-details-2" style="width:auto;margin-left:38px;">
                            <h1 id="partlyst-name-2" class="partlyst-name" style="font-family:Poppins, sans-serif;font-weight:bold;color:rgb(75,90,105);font-size:22px;">Party list #2</h1>
                            <h1 id="partylist-dept-2" class="partylist-dept" style="font-family:'Open Sans', sans-serif;color:rgb(75,90,105);font-size:18px;margin-top:-3px;">Department</h1>
                            <p style="text-align:justify;"><span style="color:rgb(18, 44, 79);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada nisl in arcu bibendum congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper nisl ac tempus fringilla.</span></p>
                            <div class="d-xxl-flex justify-content-xxl-start" id="button-wrapper-2"><button class="btn btn-primary ms-md-2" type="button" style="font-family:Poppins, sans-serif;background:rgba(56,57,59,0);border-radius:6px;border:2.05263px solid #122c4f;color:rgb(79,74,74);">READ MORE</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-3" id="school-wrapper" style="padding:0px;background:#ffffff;height:474px;position:relative;margin-top:30px;">
                <div class="d-flex flex-column align-items-center"><img width="100" height="80" src="../../assets/img/LOGO.png" style="width:238px;height:203px;margin-top:35px;">
                    <h1 style="font-family:'Open Sans', sans-serif;font-size:18px;color:rgb(66,64,64);font-weight:bold;margin-bottom:4px;text-align:center;margin-top:22px;padding-right:50px;padding-left:50px;">Palawan Technological College Inc.</h1>
                </div>
                <div class="d-flex flex-column align-items-center" style="padding-top:14px;">
                    <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=100063733196484" style="color:rgb(227,177,4);font-family:Poppins, sans-serif;border-color:rgb(227,177,4);text-decoration:none;">PTCI Official Page</a></li>
                        <li><a href="#" style="color:rgb(227,177,4);font-family:Poppins, sans-serif;border-color:rgb(227,177,4);text-decoration:none;">PTCI Student Council Page</a></li>
                    </ul>
                    <div id="heading-partylists-1" class="heading-partylists" style="border-bottom:1px solid rgba(33,37,41,0.23);"></div>
                </div>
            </div>
            <!--Timer-->
            <div
                style="position: fixed; bottom: 50px; right: 50px; text-align: right; width: auto; padding: 5px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);border-radius:10px; font-size: 30px; font-weight: Bold; font-family: 'Arial', sans-serif; margin-top:50px;">
                <div class="timer" id="timer">
                    <div class="timer-display">00:00:00</div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        function calculateRemainingTime() {
                            const isTimerRunning = localStorage.getItem('isTimerRunning') === 'true';
                            const storedStartTime = parseInt(localStorage.getItem('startTime')) || 0;
                            const totalDuration = 10 * 60 * 60; // 10 hours in seconds

                            if (isTimerRunning && storedStartTime) {
                                let elapsedTime = Math.floor((Date.now() - storedStartTime) / 1000);
                                return Math.max(totalDuration - elapsedTime, 0);
                            }
                            return 0;
                        }

                        function updateTimer() {
                            const timeInSeconds = calculateRemainingTime();
                            const hours = Math.floor(timeInSeconds / 3600);
                            const minutes = Math.floor((timeInSeconds % 3600) / 60);
                            const seconds = timeInSeconds % 60;

                            const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                            document.querySelector("#timer .timer-display").textContent = formattedTime;

                            if (timeInSeconds === 0) {
                                updateVoteButton(false);
                                clearInterval(timerInterval);
                            }
                        }

                        function checkTimerStatus() {
                            const isTimerRunning = localStorage.getItem('isTimerRunning') === 'true';
                            updateVoteButton(isTimerRunning);
                            updateTimer();
                            if (isTimerRunning) {
                                timerInterval = setInterval(updateTimer, 1000);
                            }
                        }

                        function updateVoteButton(isTimerActive) {
                            document.getElementById("voteButton").style.display = isTimerActive ? "inline" : "none";
                            document.getElementById("votingMessage").style.display = isTimerActive ? "none" : "block";
                        }

                        let timerInterval;
                        checkTimerStatus();
                    });

                    function navigateToVote() {
                        if (localStorage.getItem('isTimerRunning') !== 'true') {
                            var myModal = new bootstrap.Modal(document.getElementById('votingClosedModal'));
                            myModal.show();
                            return false;
                        } else {
                            window.location.href = '../private/vote.php';
                        }
                    }
                </script>
            </div>
        </div>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/js/Simple-Slider-swiper-bundle.min.js"></script>
        <script src="../../assets/js/Simple-Slider.js"></script>
        <script src="../../assets/js/untitled.js"></script>
    </div>
    <footer class="text-center py-4" style="margin-bottom: -589px;">
        <footer class="text-white bg-dark" style="margin-bottom: -36px;">
            <div class="container py-4 py-lg-5" style="margin-bottom: -39px;">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column align-items-xxl-center item"><img src="../../assets/img/294834923_451650346969401_7788761739934683317_n__1_-removebg-preview.png" style="width: 176.02px;margin-bottom: 13px;">
                        <p style="margin-left: 27px;margin-top: 7px;">Palawan Technological College Inc.</p>
                    </div>
                    <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="padding-left: 51px;">
                        <h3 class="fs-6 text-white" style="margin-top: 29px;">Contacts</h3>
                        <ul class="list-unstyled">
                            <li class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 3px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook" style="width: 14.9868px;margin-right: 15px;margin-left: 16px;margin-bottom: 3px;">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                                </svg><a class="link-light" href="https://www.facebook.com/profile.php?id=100063733196484" style="margin-bottom: 3px; text-decoration:none;">Official Page PTCI</a></li>
                            <li class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 3px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook" style="width: 14.9868px;margin-right: 15px;margin-left: 16px;margin-bottom: 3px;">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                                </svg><a class="link-light" href="https://www.facebook.com/profile.php?id=100064562656878" style="margin-bottom: 3px; text-decoration:none;">PTCI&nbsp;Student Council</a></li>
                            <li class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 3px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook" style="width: 14.9868px;margin-right: 15px;margin-left: 16px;">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                                </svg><a class="link-light" href="https://www.facebook.com/profile.php?id=61566114403265" style=" text-decoration:none;">IC2&nbsp;</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social" style="padding-left: 51px;">
                        <h3 class="fs-6 text-white" style="margin-top: 29px;">Directory</h3><a class="link-light" href="index.html" style="margin-bottom: 3px; text-decoration:none;">Home</a><a class="link-light" href="candidates.html" style="margin-bottom: 3px; text-decoration:none;">Candidates</a>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center pt-3">
                    <p class="mb-0">Copyright © 2025 Palawan Technological College Inc. All rights reserved.</p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">Powered by&nbsp;</li>
                        <li class="list-inline-item"><img src="../../assets/img/461514192_122108110472537146_3222580666165080691_n-removebg-preview.png" style="width: 69px;"></li>
                    </ul>
                </div>
            </div>
        </footer>
    </footer>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="../../assets/js/Simple-Slider.js"></script>
    <script src="../../assets/js/untitled.js"></script>
    <script src="../../assets/js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>