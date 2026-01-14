import { apiRequest } from "./apiService.js";
import { togglePassword } from "./utils.js";

togglePassword('.toggle-senha-login');

$(document).ready(function () {
  $("#formLogin").on("submit", function (e) {
    e.preventDefault();

    const entrar = $("#entrar");
    const spinnerLogin = $("#spinnerLogin")

    const email = $("#email").val();
    const senha = $("#senha").val();
    const lembrar = $("#lembrar").is(":checked");

    if (senha.length < 6) {
      toastr.warning("Sua senha deve ter no mínimo 6 caracteres.");
      return;
    }

    const objetoAjax = {
      url: 'login',
      method: 'POST',
      data: {
        email,
        senha,
        lembrar
      },
      loding: spinnerLogin,
      setLoding: entrar,
    }

    apiRequest(objetoAjax);

  });
});