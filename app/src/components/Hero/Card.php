<main class="flex flex-col justify-center h-[80vh]">
  <div class="bg-white rounded-xl shadow-xl p-10 max-w-2xl w-full space-y-8 transition-all duration-300 ">

    <div class="text-center space-y-3">
      <h1 class="text-3xl font-extrabold text-[#1A1A1A]">
        👋 Bem-vindo ao <span class="text-indigo-600">Framework PS MVC</span>
      </h1>
      <p class="text-base text-gray-600 leading-relaxed">
        Uma base moderna, minimalista e extensível para desenvolvimento em PHP com arquitetura MVC.
      </p>
      <p class="text-sm text-gray-500">
        Versão do PHP: <span class="font-mono text-[#1A1A1A]"><?= phpversion() ?></span>
      </p>
    </div>

    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="https://github.com/PauloTIgit/Nexus"
        class="w-full sm:w-auto bg-[#1A1A1A] text-white px-6 py-3 rounded-lg hover:bg-[#333] transition">
        Github
      </a>
      <a href="./doc"
        class="w-full sm:w-auto border border-[#1A1A1A] text-[#1A1A1A] px-6 py-3 rounded-lg hover:bg-gray-100 transition">
        Ver Documentação
      </a>
    </div>

  </div>
</main>