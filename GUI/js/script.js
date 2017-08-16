function main() {
  //$('#pessoa-telefone').hide();
  $('#pessoa-especialidade').hide();
  //$('#item-garantia').hide();
  $('#item-fornecedor').hide();
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
