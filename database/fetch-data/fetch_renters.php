<?php 

include('../../connections.php');
$stmt = $conn->prepare("SELECT * FROM renters ORDER BY date ASC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchALL();