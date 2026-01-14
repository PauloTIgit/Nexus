<!DOCTYPE html>
<html lang="pt-br" class="bg-black text-[#FAFAFA]">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./app/src/images/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="./app/src/images/favicon/apple-touch-icon.png">
  <link rel="icon" sizes="32x32" href="./app/src/images/favicon/favicon-32x32.png" type="image/png">
  <link rel="icon" sizes="16x16" href="./app/src/images/favicon/favicon-16x16.png" type="image/png">
  <link rel="manifest" href="./site.webmanifest">

  <!-- FONT -->
  <link
    href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Playfair+Display:wght@600&family=Inter:wght@400;500&family=Lora:wght@400;500&display=swap"
    rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- phosphor ICONS -->
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link rel="stylesheet" href="https://unpkg.com/phosphor-icons@1.4.1/dist/phosphor.min.css" />

  <link rel="stylesheet" href="./app/src/css/styles.css" />

  <script type="module" src="./app/src/js/main.js"></script>
  <!-- jQuery  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Toastr.js  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
  toastr.options = {
    "positionClass": "toast-bottom-right", // Define a posição
    "timeOut": "5000", // Tempo em milissegundos
    "closeButton": false, // Botão de fechar opcional
    "progressBar": true // Exibe uma barra de progresso
  };
  </script>
  <title><?= APP_NAME ?></title>

</head>

<body class=" min-h-screen text-gray-800 font-sans relative">