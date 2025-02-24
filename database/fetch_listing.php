<?php 

include('connections.php');
$stmt = $conn->prepare("SELECT * FROM listings ORDER BY listing_date DESC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchALL();