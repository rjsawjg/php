<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр изображения — {{ $id }}</title>
    <link href="https://cdn.jsdelivr.net" rel="stylesheet">
    <style>
        body {
    /* Настройки шрифта и размера */
    font-family: 'Segoe UI', Roboto, -apple-system, sans-serif;
    font-size: 200%; /* Увеличиваем в 2 раза */
    line-height: 1.5;
    
    /* Центрирование через Flexbox */
    display: flex;
    justify-content: center; /* Центр по горизонтали */
    align-items: center;     /* Центр по вертикали */
    min-height: 100vh;       /* Высота на весь экран */
    margin: 0;
    background-color: #f4f7f6;
    color: #333;
}

.main-container {
    text-align: center;      /* Центрируем текст внутри блока */
    max-width: 90%;          /* Чтобы контент не прилипал к краям */
    padding: 40px;
}

img {
    display: block;
    margin: 40px auto;       /* Центрируем саму картинку */
    max-width: 100%;          /* Чтобы картинка не была слишком огромной */
    height: auto;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.btn-back {
    display: inline-block;
    margin-top: 40px;
    padding: 20px 50px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 15px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.btn-back:hover {
    background-color: #0056b3;
}

.btn-download {
    margin-left: 300px; /* Увеличь число, если нужно отодвинуть дальше */
    background-color: #28a745; /* Сделаем её зеленой для отличия */
    color: white;
    padding: 20px 40px;
    text-decoration: none;
    border-radius: 15px;
}
    </style>
</head>
<body>

<div class="main-container">
    <h1>Файл: <span class="text-primary">{{ $id }}</span></h1>
    
    <!-- Картинка -->
    <img src="{{ asset('additions/' . $id) }}" class="full-img" id="main-image" alt="Изображение">

    <!-- Контейнер для кнопок -->
    <div class="controls-wrapper">
        <a href="/" class="btn-back">← Назад</a>
        <a href="{{ asset('additions/' . $id) }}" download class="btn-download">Скачать оригинал</a>
    </div>
</div>


</body>
</html>