<?php 

include('../../connections.php');
$stmt = $conn->prepare("SELECT * FROM sellers ORDER BY date ASC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchALL();