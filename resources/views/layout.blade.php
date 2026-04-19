<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   <style>
        .auto-resize {
          overflow: hidden;
          resize: vertical;
          min-height: 38px;  /* для input */
        }

        textarea.auto-resize {
            min-height: 100px;  /* для textarea */
        }
        
        header {
            height: 9vh;           /* 18% от высоты экрана */
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);  /* Тень для объема */
            display: flex;
            align-items: center;
        }
        
        .container-fluid {
            width: 100%;
        }
        
        /* Увеличить ссылки */
        .nav-link, .navbar-brand {
            font-size: 1.3rem;
            padding: 10px 15px !important;
        }
        
        /* Увеличить выпадающее меню */
        .dropdown-menu {
            font-size: 1.2rem;
        }
        
        /* Увеличить форму поиска */
        .form-control, .btn {
            padding: 12px 20px;
            font-size: 1.2rem;
        }

        html, body {
            height: 100%;           /* Важно: вся высота страницы */
            margin: 0;
            padding: 0;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;      /* Минимальная высота = весь экран */
        }
        
        header {
            /* Стили для header */
        }
        
        main {
            flex: 1;                /* main занимает всё доступное пространство */
            padding: 20px 10%;
        }
        
        footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            /* Footer автоматически будет внизу */
        }
    </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/contacts">Контакты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">О нас</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/article">Статьи</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/article/create">Создать статью</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <div class="d-flex">
          @guest
            <a href="/signin" class="btn btn-outline-success mr-2">Sign In</a>
            <a href="/signout" class="btn btn-outline-success">Sign Out</a>
          @endguest
          @auth
            <a href="/logout" class="btn btn-outline-success">Log Out</a>
          @endauth
        </div>
      </div>
    </div>
    </nav>
  </header>
  <main style="padding-top: 1%;   padding-left: 5%; padding-right: 5%;">
    {{-- Вывод уведомлений --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
  </main>
  <footer>Липатов Ростислав Сергеевич, 241-132</footer>
    <script>
    document.addEventListener('input', function(e) {
    if (e.target.classList.contains('auto-resize')) {
          e.target.style.height = 'auto';
          e.target.style.height = (e.target.scrollHeight) + 'px';
        }
    });
  </script>
</body>
</html>