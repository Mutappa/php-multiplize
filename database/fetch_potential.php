<?php 

include('connections.php');
$stmt = $conn->prepare("SELECT * FROM potentiallisting ORDER BY date ASC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchALL();