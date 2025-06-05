<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - IA Filmes</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<?php include("header.php"); ?>
<body>
  <header>
    <div class="container">
      <h1>IA Filmes</h1>
      <button class="profile-btn" onclick="location.href='index.html'" title="Sair"></button>
    </div>
  </header>

  <main class="dashboard-main container">
    <h2>Olá, Emanuel! 👋</h2>
    <p>Quer ver sugestões de filmes personalizadas?</p>
    <button onclick="location.href='recommendations.html'">Quero sugestões!</button>
  </main>

  <footer>
    <p>© 2025 IA Filmes. Todos os direitos reservados.</p>
  </footer>

<?php include("footer.php"); ?>
</body>
</html>
