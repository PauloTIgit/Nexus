// utils.js
import { apiRequest } from "./apiService.js";

export function offlineStatus() {
  // Cria o elemento do ícone
  const offlineIcon = document.createElement('div');
  offlineIcon.id = 'offline-icon';
  offlineIcon.textContent = '⚠️ Sem conexão';
  Object.assign(offlineIcon.style, {
    position: 'fixed',
    bottom: '20px',
    right: '20px',
    backgroundColor: '#ff5555',
    color: 'white',
    padding: '10px 15px',
    borderRadius: '8px',
    fontWeight: 'bold',
    boxShadow: '0 0 10px rgba(0,0,0,0.3)',
    zIndex: '9999',
    transition: 'all 0.3s ease',
    opacity: '0',
    pointerEvents: 'none',
  });

  // Adiciona ao body
  document.body.appendChild(offlineIcon);

  // Função para mostrar/ocultar o ícone
  function updateConnectionStatus() {
    if (navigator.onLine) {
      offlineIcon.style.opacity = '0';
      offlineIcon.style.pointerEvents = 'none';
    } else {
      offlineIcon.style.opacity = '1';
      offlineIcon.style.pointerEvents = 'auto';
    }
  }

  // Verifica ao carregar
  window.addEventListener('load', updateConnectionStatus);

  // Escuta mudanças de status de rede
  window.addEventListener('online', updateConnectionStatus);
  window.addEventListener('offline', updateConnectionStatus);
}

export function smoothScrollToTop(duration = 600) {
  const start = window.scrollY;
  const startTime = performance.now();

  function step(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeOut = 1 - Math.pow(1 - progress, 3);

    window.scrollTo(0, start * (1 - easeOut));

    if (progress < 1) requestAnimationFrame(step);
  }

  requestAnimationFrame(step);
}

export function togglePassword(type) {
  $(document).ready(function () {
    $(type).on("click", function () {
      const inputId = $(this).data("target");
      const input = $("#" + inputId);
      const icon = $(this).find("i");

      const tipoAtual = input.attr("type");
      if (tipoAtual === "password") {
        input.attr("type", "text");
        icon.removeClass("ph-eye").addClass("ph-eye-slash");
      } else {
        input.attr("type", "password");
        icon.removeClass("ph-eye-slash").addClass("ph-eye");
      }
    });
  });

}

export function navAdmin(secionId, linkId) {
  document.addEventListener('DOMContentLoaded', function () {
    const secionAdmin = document.getElementById(secionId);
    const adminLink = document.getElementById(linkId);
    if (secionAdmin && secionAdmin.offsetParent !== null && adminLink) {
      adminLink.classList.add('text-blue-600');
      adminLink.classList.add('font-medium');
    }
  });
}

export function slideTestimonials(containerCLass, prevBtnId, nextBtnId) {
  const container = document.getElementById(containerCLass);
  const prevBtn = document.getElementById(prevBtnId);
  const nextBtn = document.getElementById(nextBtnId);

  if (!container || !prevBtn || !nextBtn) return;

  const slides = container.children;
  const totalSlides = slides.length;
  let currentIndex = 0;

  function updateSlide() {
    container.style.transform = `translateX(-${currentIndex * 50}%)`;
  }

  prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
    updateSlide();
  });

  nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlide();
  });

  // Define a largura do container dinamicamente
  container.style.width = `${100 * totalSlides}%`;
  for (const slide of slides) {
    slide.style.width = `${100 / totalSlides}%`;
  }
}

export async function getEmpresaPorCNPJ(cnpj) {
  const cnpjLimpo = cnpj.replace(/[^\d]+/g, '');

  if (cnpjLimpo.length !== 14) {
    throw new Error("CNPJ inválido");
  }

  return apiRequest({
    url: `cnpj/${cnpjLimpo}`,
    method: 'GET',
    showLogs: false
  })
}
