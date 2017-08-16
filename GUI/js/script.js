function main() {
  $('#pessoa-telefone').hide();
  $('#pessoa-especialidade').hide();
  $('.botao').next().hide();
  $('.botao').on('click', function () {
    $(this).next().slideToggle();
  })
  if ($('#pessoa-tipo').options[$('#pessoa-tipo').selectedIndex].text == 'Mecânico'){
    $('#pessoa-especialidade').show();
    $('#pessoa-telefone').hide();
  } else {
    $('#pessoa-especialidade').hide();
    $('#pessoa-telefone').show();
  }
}

$(document).ready(main);
