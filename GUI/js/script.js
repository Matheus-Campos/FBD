function main() {
  $('#pessoa-telefone').hide();
  $('#pessoa-especialidade').hide();
  $('#item-garantia').hide();
  $('#item-fornecedor').hide();
  $('.botao').next().hide();
  $('.collapsable').next().hide();
  $('.botao').on('click', slideNext);
  $('.collapsable').on('click', slideNext);
  $('#pessoa-tipo').on('change', function () {
    if ($(this).val() == 'M') {
      $('#pessoa-especialidade').show();
      $('#pessoa-telefone').hide();
    } else {
      $('#pessoa-especialidade').hide();
      $('#pessoa-telefone').show();
    }
  });
}

// Por algum motivo, o código comentado abaixo buga o programa.
/*function ocultarMostrarCond(var $ocultar, var $mostrar, var cond) {
  alert($(this).val());
  if ($(this).val() == cond) {
    $mostrar.show();
    $ocultar.hide();
  } else {
    $mostrar.hide();
    $ocultar.show();
  }
}*/

function slideNext() {
  $(this).next().slideToggle();
}

$(document).ready(main);
