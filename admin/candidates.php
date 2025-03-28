<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="website icon" type="png" sizes="32x32" href="/img/logo/PTCI-logo.png">
    <title>Admin Page - Candidates</title>
    <link rel="stylesheet" href="../assets/css/candidates.css" />
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">Admin</div>
            <ul class="menu list-unstyled">
                <div class="menu-label">Home</div>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="#">Candidates</a></li>
                <li><a href="timer.php">Start/End</a></li>

                <div class="menu-label">Account</div>
                <li><a href="#">Create</a></li>
                <li><a href="#">View</a></li>
            </ul>

            <div class="footer">
                <a href="/logout" class="text-decoration-none">Logout</a>
            </div>
        </div>
    </div>


    <!-- Hamburger Icon -->
    <div class="hamburger" onclick="toggleSidebar()">
        &#9776;
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="candidate-container">
            <!-- Candidate 1 -->
            <div class="candidate" id="candidate1">
                <img src="/img/candidatesImg/try-img.png" alt="Candidate 1" class="candidate-image">
                <div class="candidate-info">
                    <p class="candidate-name">Candidate 1</p>
                    <p class="vote-count" id="vote-count1">Votes: 0</p>
                </div>
            </div>

            <!-- Candidate 2 -->
            <div class="candidate" id="candidate2">
                <img src="/img/candidatesImg/try-img.png" alt="Candidate 2" class="candidate-image">
                <div class="candidate-info">
                    <p class="candidate-name">Candidate 2</p>
                    <p class="vote-count" id="vote-count2">Votes: 0</p>
                </div>
            </div>

            <!-- Candidate 3 -->
            <div class="candidate" id="candidate3">
                <img src="/img/candidatesImg/try-img.png" alt="Candidate 3" class="candidate-image">
                <div class="candidate-info">
                    <p class="candidate-name">Candidate 3</p>
                    <p class="vote-count" id="vote-count3">Votes: 0</p>
                </div>
            </div>

            <!-- Candidate 4 -->
            <div class="candidate" id="candidate4">
                <img src="/img/candidatesImg/try-img.png" alt="Candidate 4" class="candidate-image">
                <div class="candidate-info">
                    <p class="candidate-name">Candidate 4</p>
                    <p class="vote-count" id="vote-count4">Votes: 0</p>
                </div>
            </div>

            <!-- Candidate 5 -->
            <div class="candidate" id="candidate5">
                <img src="/img/candidatesImg/try-img.png" alt="Candidate 5" class="candidate-image">
                <div class="candidate-info">
                    <p class="candidate-name">Candidate 5</p>
                    <p class="vote-count" id="vote-count5">Votes: 0</p>
                </div>
            </div>

            <!-- Candidate 6 -->
            <div class="candidate" id="candidate6">
                <img src="/img/candidatesImg/try-img.png" alt="Candidate 6" class="candidate-image">
                <div class="candidate-info">
                    <p class="candidate-name">Candidate 6</p>
                    <p class="vote-count" id="vote-count6">Votes: 0</p>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hamburger Display
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>

</html>