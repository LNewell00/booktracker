<?php
require_once 'db.php';

$pdo = getDB();

// Get all tables in the public schema
$tables = $pdo->query("
    SELECT table_name 
    FROM information_schema.tables 
    WHERE table_schema = 'public'
    ORDER BY table_name
")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    echo "<h2>$table</h2>";

    $rows = $pdo->query("SELECT * FROM \"$table\"")->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows)) {
        echo "<p><em>No rows yet.</em></p>";
        continue;
    }

    echo "<table border='1' cellpadding='6' cellspacing='0'>";

    // Header row
    echo "<tr>";
    foreach (array_keys($rows[0]) as $col) {
        echo "<th>$col</th>";
    }
    echo "</tr>";

    // Data rows
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($row as $val) {
            echo "<td>" . htmlspecialchars($val ?? 'NULL') . "</td>";
        }
        echo "</tr>";
    }

    echo "</table><br>";
}
?>