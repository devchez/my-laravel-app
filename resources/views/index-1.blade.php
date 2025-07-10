<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>

  <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">YourBrand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Main -->
  <main class="container my-5">
    <h1>Welcome to Your Website</h1>
    <p>This is the main content area. Replace this with your actual content.</p>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-1">&copy; 2025 YourBrand. All rights reserved.</p>
      <small>Follow us:
        <a href="#" class="text-white ms-2">Facebook</a> |
        <a href="#" class="text-white ms-2">Twitter</a> |
        <a href="#" class="text-white ms-2">Instagram</a>
      </small>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>