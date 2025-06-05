<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Recomendações - IA Filmes</title>
  <link rel="stylesheet" href="styles.css">
</head>
<?php include("header.php"); ?>
<body>
  <header>
    <div class="logo">🎬 IA Filmes</div>
    <div class="header-icons">
      <span class="icon">⭐</span>
      <span class="icon">❤️</span>
      <span class="icon">📤</span>
      <span class="icon">🎁</span>
      <a href="login.html" class="profile-icon">👤</a>
    </div>
  </header>

  <main>
    <section class="recommendations">
      <h2 class="ai-message">Oi! Preparei 10 filmes que combinam com você! 💖</h2>
      <div class="movie-grid">
        <div class="movie-card">
          <img src="images/filme1.jpg" alt="Filme 1">
          <div class="movie-info">
            <h3>Filme 1</h3>
            <p class="resumo">Este é um resumo curto que aparece quando passa o mouse.</p>
          </div>
        </div>
        <!-- Outros filmes -->
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 IA Filmes.</p>
  </footer>

<?php include("footer.php"); ?>
</body>
</html>
