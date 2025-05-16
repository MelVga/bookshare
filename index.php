<?php
require_once 'config/db.php';
$query = $conn->query("SELECT * FROM books");
$books = $query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>BookShare</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="max-w-4xl mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">📚 BookShare</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php foreach ($books as $book): ?>
        <div class="bg-white shadow-lg rounded-lg p-4">
          <h2 class="text-xl font-semibold"><?= htmlspecialchars($book['title']) ?></h2>
          <p class="text-gray-600 mb-2">Autor: <?= htmlspecialchars($book['author']) ?></p>
          <div class="space-x-2">
            <a href="<?= $book['pdf_url'] ?>" target="_blank" class="text-blue-600 underline">📄 PDF</a>
            <a href="<?= $book['audio_url'] ?>" target="_blank" class="text-green-600 underline">🎧 Audiolibro</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
