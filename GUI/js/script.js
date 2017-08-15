function main() {
  $('#pessoa-telefone').hide();
  $('#pessoa-especialidade').hide();
  getElementsByName('pessoa-tipo').on('click', function () {
    $('#pessoa-especialidade').show();
  })
}

$(document).ready(main);
