import { apiRequest } from "./apiService.js";
import { togglePassword, getEmpresaPorCNPJ } from "./utils.js";

togglePassword('.toggle-senha');

$(document).ready(function () {
  // Avançar para etapa da empresa
  $('#btn-avancar').on('click', function () {
    $('#etapa-pessoal').addClass('hidden');
    $('#etapa-empresa').removeClass('hidden');
  });

  // Voltar para etapa do cliente
  $('#btn-voltar').on('click', function () {
    $('#etapa-empresa').addClass('hidden');
    $('#etapa-pessoal').removeClass('hidden');
  });

  // Requisição de cadastro
  $("#formRegistro").on("submit", async function (e) {
    e.preventDefault();

    const btn = $("#btn-cadastrar");
    const btnText = btn.find(".text-btn");
    const loader = btn.find(".loader");

    const cadastro = $("#cadastro");
    const spinnerCadastro = $("#spinnerCadastro")

    // Mostrar o loader
    btn.attr("disabled", true);
    btnText.addClass("hidden");
    loader.removeClass("hidden");

    const nome = $("#nome").val();
    const email = $("#email").val();
    const senha = $("#senha").val();

    const cnpj = $("#cnpj").val();
    const razaoSocial = $("#razao").val();

    if (senha.length < 6) {
      toastr.warning("Sua senha deve ter no mínimo 6 caracteres.");
      btn.attr("disabled", false);
      btnText.removeClass("hidden");
      loader.addClass("hidden");
      return;
    }

    const objetoAjax = {
      url: 'cadastro',
      method: 'POST',
      data: {
        nome,
        email,
        senha,
        cnpj,
        razaoSocial
      },
      loding: spinnerCadastro,
      setLoding: cadastro,
    }

    try {
      apiRequest(objetoAjax)
    } catch (err) {
      console.error("Erro ao cadastrar usuario ou empresa:", err.message || err);
    } finally {
      // Oculta o loader e volta ao normal
      btn.attr("disabled", false);
      btnText.removeClass("hidden");
      loader.addClass("hidden");
    }
  });

  // Consultar CNPJ
  $('#cnpj').on('input', async function () {
    const cnpj = $(this).val();

    if (cnpj.length >= 18) {
      try {
        const res = await getEmpresaPorCNPJ(cnpj)
        const razaoSocial = res?.data?.nome ?? '';
        $('#razao').val(razaoSocial);
      } catch (err) {
        console.error("Erro ao buscar empresa:", err.message || err);
      }

    }
  })
});
