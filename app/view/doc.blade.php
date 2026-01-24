<section class="bg-gray-50 text-gray-900 font-sans leading-relaxed">

  <header class="bg-gray-700 text-white py-6 shadow-md">
    <div class="container mx-auto px-4 max-w-5xl">
      <h1 class="text-3xl font-bold">📚 Documentação de Uso - <?= APP_NAME ?></h1>
      <p class="mt-1 text-indigo-200 max-w-xl">Guia rápido para criação de rotas e consumo da API REST.</p>
    </div>
  </header>

  <main class="container mx-auto max-w-5xl px-4 py-10 space-y-12">

    <!-- Seção 1 -->
    <section>
      <h2 class="text-2xl font-semibold text-indigo-700 mb-4">1. Criando Rotas para FRONT</h2>
      <p class="mb-4 text-gray-700">
        As rotas WEB ficam no arquivo <code class="bg-gray-200 px-1 rounded">/app/app/route/web.php</code>.
        A classe <code class="bg-gray-200 px-1 rounded">Route</code> carrega rotas, controllers e componentes.
      </p>

      <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="font-semibold mb-2 text-gray-800">Exemplo básico de rota:</h3>
        <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-indigo-900">
<code>
  rota('/', function () {
    view('home');  // renderiza a view home.php
  });

  rota('/sobre', function () {
    view('sobre'); // renderiza a view sobre.php
  });
</code>
        </pre>
      </div>

      <p class="mb-2 text-gray-700">
        A função <code class="bg-gray-200 px-1 rounded">rota()</code> recebe a URL e uma function callback para
        executar!
      </p>
      <p class="mb-2 text-gray-700">
        Para renderizar a view correspondente, use a função <code class="bg-gray-200 px-1 rounded">view()</code>
        para os componentes comuns são incluídos via função <code class="bg-gray-200 px-1 rounded">component()</code>
      </p>

      <p class="mt-6 text-gray-700 font-semibold">
        Resumo do fluxo WEB:
      </p>
      <ul class="list-disc list-inside text-gray-700 space-y-1">
        <li>Criar rota no <code class="bg-gray-200 px-1 rounded">/app/route/web.php</code></li>
        <li>Criar view correspondente em <code class="bg-gray-200 px-1 rounded">/app/view/</code></li>
        <li>Criar componentes opcionais em <code class="bg-gray-200 px-1 rounded">/app/src/components/</code></li>
        <li>Acessar rota via navegador</li>
      </ul>
    </section>

    <!-- Seção 2 -->
    <section>
      <h2 class="text-2xl font-semibold text-indigo-700 mb-4">2. Consumindo a API via AJAX no Frontend</h2>

      <p class="mb-4 text-gray-700">
        Usando o serviço JavaScript em <code class="bg-gray-200 px-1 rounded">/app/src/js/apiService.js</code>.
      </p>

      <p class="mb-4 text-gray-700">
        Para usar, defina a variável global <code class="bg-gray-200 px-1 rounded">window.serverApi</code> com a URL
        base da API
        (exemplo: <code class="bg-gray-200 px-1 rounded">http://localhost:4545/</code>).
      </p>

      <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
        <h3 class="font-semibold mb-2 text-gray-800">Exemplo de uso no frontend:</h3>
        <pre class="text-sm text-indigo-900">
          <code>import { apiRequest } from './web/src/service/apiService.js';

          async function loadUsers() {
            try {
              const response = await apiRequest({ url: 'users', method: 'GET' });
              console.log(response.data);
            } catch (err) {
              console.error('Erro ao carregar usuários', err);
            }
          }</code>
        </pre>
      </div>
    </section>

    <!-- Seção 3 -->
    <section>
      <h2 class="text-2xl font-semibold text-indigo-700 mb-4">3. Usando a CLI do <?= APP_NAME ?></h2>

      <p class="mb-4 text-gray-700">
        O <?= APP_NAME ?> possui uma interface de linha de comando (CLI) própria,
        utilizada para tarefas de desenvolvimento como subir o servidor local,
        executar migrations, seeds e manutenção do banco de dados.
      </p>

      <p class="mb-4 text-gray-700">
        Todos os comandos são executados a partir da raiz do projeto usando:
        <code class="bg-gray-200 px-1 rounded">php nexus</code>
      </p>

      <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="font-semibold mb-2 text-gray-800">Comando base</h3>
        <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-indigo-900">
          <code>php nexus</code>
        </pre>
        <p class="mt-2 text-gray-700">
          Exibe a lista de comandos disponíveis.
        </p>
      </div>

      <!-- Start -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="font-semibold mb-2 text-gray-800">Iniciar servidor local</h3>
        <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-indigo-900">
          <code>php nexus start
          php nexus start 8080</code>
        </pre>
        <p class="mt-2 text-gray-700">
          Inicia o servidor embutido do PHP apontando para o diretório
          <code class="bg-gray-200 px-1 rounded">./</code>.
          A porta padrão é <strong>8000</strong>.
        </p>
      </div>

      <!-- Migrate -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="font-semibold mb-2 text-gray-800">Executar migrations</h3>
        <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-indigo-900">
          <code>php nexus migrate</code>
        </pre>
        <p class="mt-2 text-gray-700">
          Executa todos os arquivos <code class="bg-gray-200 px-1 rounded">.sql</code>
          localizados no diretório <code class="bg-gray-200 px-1 rounded">/migration</code>.
          Caso o banco não exista, ele será criado automaticamente.
        </p>
      </div>

      <!-- Seed -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="font-semibold mb-2 text-gray-800">Executar seeds</h3>
        <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-indigo-900">
          <code>php nexus db:seed</code>
        </pre>
        <p class="mt-2 text-gray-700">
          Popula o banco de dados com dados iniciais (roles, usuário admin, etc),
          utilizando os arquivos <code class="bg-gray-200 px-1 rounded">.sql</code>
          localizados em <code class="bg-gray-200 px-1 rounded">/seeds</code>.
        </p>
      </div>

      <!-- Fresh -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="font-semibold mb-2 text-gray-800">Recriar banco do zero</h3>
        <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-indigo-900">
          <code>php nexus migrate:fresh</code>
         </pre>
        <p class="mt-2 text-gray-700">
          Remove completamente o banco de dados, recria a estrutura e executa
          novamente todas as migrations.
          Ideal para ambientes de desenvolvimento.
        </p>
      </div>

      <p class="mt-6 text-gray-700 font-semibold">
        Resumo do fluxo com CLI:
      </p>
      <ul class="list-disc list-inside text-gray-700 space-y-1">
        <li>Rodar <code class="bg-gray-200 px-1 rounded">php nexus start</code> para iniciar o servidor</li>
        <li>Executar <code class="bg-gray-200 px-1 rounded">php nexus migrate</code> para criar o banco</li>
        <li>Executar <code class="bg-gray-200 px-1 rounded">php nexus db:seed</code> para popular dados</li>
        <li>Desenvolver normalmente usando rotas WEB e API</li>
      </ul>
    </section>


    <!-- Resumo -->
    <section class="bg-indigo-100 rounded-lg p-6">
      <h2 class="text-2xl font-semibold text-indigo-700 mb-4">Resumo dos Passos</h2>
      <ul class="list-disc list-inside space-y-2 text-gray-800">
        <li>
          <strong>Criar rota WEB:</strong> editar <code class="bg-gray-200 px-1 rounded">/app/route/web.php</code>
        </li>
        <li>
          <strong>Criar view:</strong> criar arquivo em <code class="bg-gray-200 px-1 rounded">/app/view/</code>
        </li>
        <li>
          <strong>Criar componentes:</strong> em <code class="bg-gray-200 px-1 rounded">/app/src/components/</code>
        </li>
        <li>
          <strong>Consumir API via AJAX:</strong> usar função <code class="bg-gray-200 px-1 rounded">apiRequest()</code>
          em <code class="bg-gray-200 px-1 rounded">/app/src/js/apiService.js</code>
        </li>
      </ul>
    </section>

  </main>
</section>