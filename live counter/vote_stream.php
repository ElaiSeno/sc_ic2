<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');
header('Access-Control-Allow-Origin: *');

require_once('../connection.php');

function getVoteData($conn) {
    $total_possible_voters = 0;
    $sql_valid_accounts = "SELECT COUNT(*) as total FROM valid_account";
    $result = $conn->query($sql_valid_accounts);
    if ($result) {
        $row = $result->fetch_assoc();
        $total_possible_voters = $row['total'];
    }

    $president_votes = array();
    $sql_president = "SELECT candidate_id, COUNT(*) as vote_count 
                     FROM president_votes 
                     GROUP BY candidate_id 
                     ORDER BY COUNT(*) DESC";
    $result = $conn->query($sql_president);
    if ($result) {
        while($row = $result->fetch_assoc()) {
            $president_votes[] = array(
                'id' => $row['candidate_id'],
                'votes' => (int)$row['vote_count']
            );
        }
    }

    $vp_votes = array();
    $sql_vp = "SELECT candidate_id, COUNT(*) as vote_count 
               FROM vice_president_votes 
               GROUP BY candidate_id 
               ORDER BY COUNT(*) DESC";
    $result = $conn->query($sql_vp);
    if ($result) {
        while($row = $result->fetch_assoc()) {
            $vp_votes[] = array(
                'id' => $row['candidate_id'],
                'votes' => (int)$row['vote_count']
            );
        }
    }

    return array(
        'total_voters' => $total_possible_voters,
        'president' => $president_votes,
        'vp' => $vp_votes
    );
}

while (true) {
    $data = getVoteData($conn);
    echo "data: " . json_encode($data) . "\n\n";
    ob_flush();
    flush();
    sleep(1);
}
?>
