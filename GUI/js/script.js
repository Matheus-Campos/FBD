function main() {
  $('#pessoa-telefone').hide();
  $('#pessoa-especialidade').hide();
  $('.botao').next().hide();
  $('.botao').on('click', function () {
    $(this).next().slideToggle();
  })
}

$(document).ready(main);
