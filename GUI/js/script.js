function main() {
  $('#pessoa-telefone').hide();
  //$('#pessoa-especialidade').hide();
  //$('#item-garantia').hide();
  $('#item-fornecedor').hide();
  $('.botao').next().hide();
  $('.collapsable').next().hide();
  $('.botao').on('click', slideNext);
  $('.collapsable').on('click', slideNext);
  if ($('#pessoa-tipo').options[$('#pessoa-tipo').selectedIndex].text == 'Mecânico'){
    $('#pessoa-especialidade').show();
    $('#pessoa-telefone').hide();
  } else {
    $('#pessoa-especialidade').hide();
    $('#pessoa-telefone').show();
  }
}

function slideNext() {
  $(this).next().slideToggle();
}

$(document).ready(main);
