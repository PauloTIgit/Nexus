<!-- Componente de fundo líquido neon -->
<style>
  .neon-liquid {
    position: fixed;
    top: 0;
    left: 0;
    z-index: -10;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #98ffe5ff, #dcb2fcff, #a7c5ffff, #b8ffbeff, #ffe6c0ff, #ffc7c7ff);
    background-size: 300% 300%;
    animation: moveNeon 10s ease infinite;
    filter: brightness(1.2) saturate(1.5);
    pointer-events: none;
    box-shadow: none;
  }

  @keyframes moveNeon {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }
</style>

<div class="neon-liquid"></div>