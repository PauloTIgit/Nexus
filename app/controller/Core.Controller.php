<?php

/**
 * WEB
 */

/**
 * Inclui um componente reutilizável da aplicação
 * @param string $component Nome do componente sem extensão .php
 */
function component($component)
{
  if (file_exists(__DIR__ . "/../src/components/$component.php")) {
    include_once __DIR__ . "/../src/components/$component.php";
  } else {
    echo "<p>Erro no componente <span style='color:red'> $component </span> <p>";
  }
}

/**
 * Redireciona o usuário para uma URL específica
 * @param string $url URL de destino
 */
function locationUrl($url)
{
  header("Location: $url");
  exit;
}

/**
 * Renderiza uma view com header, navegação e footer
 * @param string $view Nome da view sem extensão .php
 * @param bool $isMenu Se true, não renderiza nav e footer
 */
function view($view, $isMenu = false)
{
  if (file_exists(__DIR__ . "/../view/$view.blade.php")) {
    component('main/header');
    if (!$isMenu):
      component('main/nav');
    endif;
    include_once __DIR__ . "/../view/$view.blade.php";
    if (!$isMenu):
      component('main/footer');
    endif;
  } else {
    view('404');
  }
}

/**
 * Inclui um arquivo de rota específico
 * @param string $router Nome do arquivo de rota sem extensão .router.php
 */
function router($router)
{
  if (file_exists(__DIR__ . "/../route/$router.router.php")) {
    include __DIR__ . "/../route/$router.router.php";
  }
}

/**
 * Define uma rota com padrão e callback
 * @param string $padrao Padrão da rota ex: /cnpj/{cnpj}
 * @param callable $callback Função a executar quando a rota corresponder
 */
function rota(string $padrao, callable $callback)
{
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
  if ($basePath !== '' && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
  }

  // Normalização consistente
  $uri = '/' . trim($uri, '/');
  $padrao = '/' . trim($padrao, '/');

  if ($uri === '//') $uri = '/';
  if ($padrao === '//') $padrao = '/';

  // Captura parâmetros
  preg_match_all('#\{([a-zA-Z0-9_]+)\}#', $padrao, $parametros);

  $regex = preg_replace('#\{[a-zA-Z0-9_]+\}#', '([^/]+)', $padrao);
  $regex = '#^' . $regex . '$#';

  if (preg_match($regex, $uri, $matches)) {
    array_shift($matches);

    $args = [];
    foreach ($parametros[1] as $i => $nome) {
      $args[$nome] = $matches[$i];
    }

    call_user_func_array($callback, $args);
    exit;
  }
}

/**
 * Valida autenticação e autorização do usuário
 * @param string $rota Rota a validar (/client, /admin, /login)
 */
function Auth($rota)
{
  if ($rota == '/client') {
    if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['usuario_status']) && $_SESSION['usuario']['usuario_status'] === 0) {
      header("Location: ./validar");
    }

    if (!isset($_SESSION['usuario'])) {
      view('negado');
      exit;
    }
    if ($_SESSION['usuario']['painel'] == 'client') {
      view('painel/client/index');
    }
  }

  if ($rota == '/admin') {
    if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['usuario_status']) && $_SESSION['usuario']['usuario_status'] === 0) {
      header("Location: ./validar");
    }

    if (!isset($_SESSION['usuario'])) {
      view('negado');
      exit;
    }
    if ($_SESSION['usuario']['painel'] == 'client') {
      view('painel/client/index');
    }
  }

  if ($rota == '/login') {
    if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['usuario_status']) && $_SESSION['usuario']['usuario_status'] === 0) {
      header("Location: ./validar");
    }

    if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['lembrar']) && $_SESSION['usuario']['lembrar']) {
      header("Location: ./" . $_SESSION['usuario']['painel']);
    }
  }
}

/**
 * Renderiza uma view de fallback (geralmente erro)
 * @param string $rouback Nome da view de fallback padrão é '404'
 */
function rouback($rouback = '404')
{
  view($rouback);
  return;
}

/**
 * API
 */

/**
 * Inclui um controller específico da aplicação
 * @param string $controller Nome do controller sem extensão .Controller.php
 */
function controller($controller)
{
  if (file_exists(__DIR__ . "/../controller/$controller.Controller.php")) {
    include_once __DIR__ . "/../controller/$controller.Controller.php";
  }
  exit();
}

/**
 * Processa requisições HTTP com handlers por método
 * @param array $handlers Associativo com métodos HTTP como chave e callbacks como valor
 * @param bool $fallback405 Se true, retorna erro 405 para métodos não permitidos
 */
function request_api(array $handlers, $fallback405 = true)
{
  header('Content-Type: application/json');

  $method = $_SERVER['REQUEST_METHOD'];

  if (isset($handlers[$method]) && is_callable($handlers[$method])) {
    $handlers[$method](); // executa a função associada ao método
    exit;
  }

  if ($fallback405) {
    res([405, false, "Metodo '$method' nao permitido para esta rota"]);
  }
}

/**
 * Retorna uma resposta JSON padronizada e encerra a execução
 * @param array $data Associativo com chaves: code, success, msg e opcionalmente data
 */
function res(array $data)
{
  http_response_code($data['code']);
  print_r(json_encode([
    "success" => $data['success'],
    "msg" => $data['msg'],
    "data" => isset($data['data']) ? $data['data'] : []
  ], JSON_UNESCAPED_UNICODE));
  die();
}


function migration_start(): bool
{
  $migration = new Migration();
  $con = $migration->Migration();

  // Se já conectou, não roda migrations
  if ($con instanceof PDO) {
    return true;
  }

  return $migration->runMigrations();
}