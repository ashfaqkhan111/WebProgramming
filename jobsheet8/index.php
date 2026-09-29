<?php 
session_start();

require __DIR__ . '/includes/connection.php';

$totalBook = $pdo->query ("select count(*) from books")->fetchColumn();

$totalMember = $pdo -> query("select count(*) from member") -> fetchColumn();


require __DIR__  . '/includes/header.php';



?>
<h1>Dahboard</h1>
<div class="stats">
    <div class="stat-card">
        <h2>Total Books</h2>
        <p><?= htmlspecialchars($totalBook) ?></p>

    </div>
    <div class="stat-card">
    <h2>Total Member</h2>
    <p><?= htmlspecialchars($totalMember) ?></p>
    </div>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
