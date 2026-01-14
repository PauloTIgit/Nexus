import { apiRequest } from "./apiService.js";

$(document).ready(function () {

  $("#validarBtn").on('click', function () {
    const spinner = $("#spinner");
    const btn = $("#btn");


    const objetoAjax = {
      url: 'valid',
      method: 'GET',
      data: {},
      loding: spinner,
      setLoding: btn,
    }
    apiRequest(objetoAjax)
  });
});