$(document).ready(function () {
  // Máscara de CPF
  $('.cpf').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value.length > 11) value = value.substring(0, 11);

    if (value.length <= 3) {
      value = value.replace(/^(\d{3})/, '$1');
    } else if (value.length <= 6) {
      value = value.replace(/^(\d{3})(\d{0,3})/, '$1.$2');
    } else if (value.length <= 9) {
      value = value.replace(/^(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
    } else {
      value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
    }

    $(this).val(value);
  });

  // Máscara de CNPJ
  $('.cnpj').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value.length > 14) value = value.substring(0, 14);

    if (value.length <= 3) {
      value = value.replace(/^(\d{2})/, '$1');
    } else if (value.length <= 6) {
      value = value.replace(/^(\d{2})(\d{0,3})/, '$1.$2');
    } else if (value.length <= 9) {
      value = value.replace(/^(\d{2})(\d{3})(\d{0,3})/, '$1.$2.$3');
    } else if (value.length <= 9) {
      value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{0,4})/, '$1.$2.$3/$4');
    } else {
      value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{0,2})/, '$1.$2.$3/$4-$5');
    }

    $(this).val(value);
  });

  // Máscara de WhatsApp
  $('.whatsapp').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value.length > 16) value = value.substring(0, 16);

    if (value.length <= 2) {
      value = value.replace(/^(\d{2})/, '($1');
    } else if (value.length <= 5) {
      value = value.replace(/^(\d{2})(\d{0,1})/, '($1) $2');
    } else if (value.length <= 10) {
      value = value.replace(/^(\d{2})(\d{1})(\d{0,4})/, '($1) $2 $3');
    } else {
      value = value.replace(/^(\d{2})(\d{1})(\d{4})(\d{0,4})/, '($1) $2 $3-$4');
    }

    $(this).val(value);
  });

  // Máscara de Telefone
  $('.fone').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value.length > 16) value = value.substring(0, 16);

    if (value.length <= 2) {
      value = value.replace(/^(\d{2})/, '($1');
    } else if (value.length <= 5) {
      value = value.replace(/^(\d{2})(\d{0,1})/, '($1) $2');
    } else if (value.length <= 10) {
      value = value.replace(/^(\d{2})(\d{1})(\d{0,4})/, '($1) $2 $3');
    } else {
      value = value.replace(/^(\d{2})(\d{1})(\d{4})(\d{0,4})/, '($1) $2 $3-$4');
    }

    $(this).val(value);
  });

  // Máscara de CEP
  $('.cep').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value.length > 8) value = value.substring(0, 8);

    value = value.replace(/^(\d{5})(\d{0,3})/, '$1-$2');

    $(this).val(value);
  });

  // Máscara de Data
  $('.data').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value.length > 8) value = value.substring(0, 8);

    if (value.length <= 2) {
      value = value.replace(/(\d{2})/, '$1');
    } else if (value.length <= 4) {
      value = value.replace(/(\d{2})(\d{2})/, '$1/$2');
    } else {
      value = value.replace(/(\d{2})(\d{2})(\d{0,4})/, '$1/$2/$3');
    }

    $(this).val(value);
  });

  // Máscara de Moeda (R$)
  $('.moeda').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');

    if (value === '') {
      $(this).val('');
      return;
    }

    const numberValue = parseFloat(value) / 100;

    $(this).val(numberValue.toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    }));
  });
});
