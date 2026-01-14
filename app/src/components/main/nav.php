<!-- Menu principal responsivo -->
<header id="mainNav" class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-200 font-sans">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-between py-4 px-5">
    <!-- Logo -->
    <logo>
      <p class="uppercase tracking-widest text-sm font-semibold"><?= APP_NAME ?></p>
    </logo>

    <div class="flex flex-row items-center space-x-4">
      <!-- Menu Desktop -->
      <nav class="hidden md:flex items-center justify-between space-x-8 text-sm text-gray-800 font-medium">
        <a href="./" class="hover:text-black transition">Início</a>
        <a href="./doc" class="hover:text-black transition">Documentação</a>
        <a href="./recursos" class="hover:text-black transition">Recursos</a>
      </nav>

      <!-- Botão Mobile -->
      <button id="menuToggle" class="md:hidden text-2xl text-[#1A1A1A] focus:outline-none">
        <i class="ph ph-list"></i>
      </button>
    </div>
  </div>

  <!-- Menu Mobile-->
  <div id="mobileMenu" class="hidden flex flex-col gap-2 text-gray-800 text-sm font-medium">
    <nav
      class="flex flex-col items-start justify-between text-start text-sm text-gray-800 font-medium bg-[#ffff] w-full">
      <a href="./"
        class="py-2 px-1 w-full border-t border-[#eee] hover:text-black transition duration-200 flex justify-between">
        <span>Início</span>
        <i class="ph ph-caret-right"></i>
      </a>
      <a href="./doc"
        class="py-2 px-1 w-full border-t border-[#eee] hover:text-black transition duration-200 flex justify-between">
        <span>Documentação</span>
        <i class="ph ph-caret-right"></i>
      </a>
      <a href="./recursos"
        class="py-2 px-1 w-full border-t border-[#eee] hover:text-black transition duration-200 flex justify-between">
        <span>Recursos</span>
        <i class="ph ph-caret-right"></i>
      </a>
    </nav>
  </div>
</header>