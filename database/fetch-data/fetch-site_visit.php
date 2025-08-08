<?php 

include('../../connections.php');
$stmt = $conn->prepare("SELECT * FROM site_visit ORDER BY date ASC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchALL();