<?php
require_once('../partial/connection.php'); 

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) { 
    header("Location: adminlogin.php?error=You must log in first.");
    exit();
}

// oresident votes
$presidentVoteCounts = [];
$query = "SELECT candidate_id, COUNT(*) as vote_count FROM president_votes GROUP BY candidate_id";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
    $presidentVoteCounts[$row['candidate_id']] = $row['vote_count'];
}

// vice President votes
$vicePresidentVoteCounts = [];
$query = "SELECT candidate_id, COUNT(*) as vote_count FROM vice_president_votes GROUP BY candidate_id";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
    $vicePresidentVoteCounts[$row['candidate_id']] = $row['vote_count'];
}

// president candidates
$query = "SELECT id, full_name, course, image FROM president_candidates ORDER BY id";
$presidentCandidates = mysqli_query($conn, $query);

// vice President candidates
$query = "SELECT id, full_name, course, image FROM vice_president_candidates ORDER BY id";
$vicePresidentCandidates = mysqli_query($conn, $query);
?>

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
    <link rel="stylesheet" href="../assets/bootstrap/bootswatch/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">Admin</div>
                <ul class="menu list-unstyled">
                    <div class="menu-label">Information</div>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="#">Candidates</a></li>            
                    <div class="menu-label">Account</div>
                    <li><a href="createcandidates.php">Create Student Council</a></li>
                    <li><a href="createstelcom.php">Create Stelcom</a></li>
                    <li><a href="createadmin.php">Create Admin</a></li>


                    <div class="menu-label">Configuration</div>
                    <li><a href="timer.php">Start/End</a></li>
                </ul>
            
                <div class="footer">
                    <a href="../back-end/adminlogout.php" class="text-decoration-none">Logout</a>
                </div>
            </div>
        <div class="hamburger" onclick="toggleSidebar()">
            &#9776;
    </div>


        <!-- Hamburger Icon -->
        <div class="hamburger" onclick="toggleSidebar()">
            &#9776;
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- President Section -->
            <h2 class="section-title">PRESIDENT VOTES</h2>
            <div class="candidate-container">
                <?php while($candidate = mysqli_fetch_assoc($presidentCandidates)): ?>
                <div class="candidate" id="candidate<?php echo $candidate['id']; ?>">
                    <img src="../user/private/uploads/<?php echo htmlspecialchars($candidate['image']); ?>" 
                         alt="<?php echo htmlspecialchars($candidate['full_name']); ?>" 
                         class="candidate-image"
                         onerror="this.onerror=null; this.src='../user/private/uploads/';">
                    <div class="candidate-info">
                        <p class="candidate-name"><?php echo htmlspecialchars($candidate['full_name']); ?></p>
                        <p class="candidate-course"><?php echo htmlspecialchars($candidate['course']); ?></p>
                        <p class="vote-count" id="vote-count<?php echo $candidate['id']; ?>">
                            Votes: <?php echo isset($presidentVoteCounts[$candidate['id']]) ? $presidentVoteCounts[$candidate['id']] : 0; ?>
                        </p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Vice President Section -->
            <h2 class="section-title mt-5">VICE PRESIDENT VOTES</h2>
            <div class="candidate-container">
                <?php while($candidate = mysqli_fetch_assoc($vicePresidentCandidates)): ?>
                <div class="candidate" id="vp-candidate<?php echo $candidate['id']; ?>">
                    <img src="../user/private/uploads/<?php echo htmlspecialchars($candidate['image']); ?>" 
                         alt="<?php echo htmlspecialchars($candidate['full_name']); ?>" 
                         class="candidate-image"
                         onerror="this.onerror=null; this.src='../user/private/uploads/';">
                    <div class="candidate-info">
                        <p class="candidate-name"><?php echo htmlspecialchars($candidate['full_name']); ?></p>
                        <p class="candidate-course"><?php echo htmlspecialchars($candidate['course']); ?></p>
                        <p class="vote-count" id="vp-vote-count<?php echo $candidate['id']; ?>">
                            Votes: <?php echo isset($vicePresidentVoteCounts[$candidate['id']]) ? $vicePresidentVoteCounts[$candidate['id']] : 0; ?>
                        </p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>

</html>