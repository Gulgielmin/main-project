$(function($){
   $("#data").mask("99/99/9999");
   $("#datepicker").mask("99/99/9999");
   $("#telefone").mask("(99)9999-9999?");
   $("#dinheiro").mask("???.???.???.??9,99");
});

$(function() {
	    $( "#datepicker" ).datepicker({
	      showOn: "button",
	      buttonImage: "../config/image/calendar-icon.png",
	      buttonImageOnly: true
	    });
	  });

  $(function ($) {
	    $.datepicker.regional['pt'] = {
	        closeText: 'Fechar',
	        prevText: '<Anterior',
	        nextText: 'Seguinte',
	        currentText: 'Hoje',
	        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
	        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
	        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
	        'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
	        dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'S&aacute;bado'],
	        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S&aacute;b'],
	        dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S&aacute;b'],
	        weekHeader: 'Sem',
	        dateFormat: 'dd/mm/yy',
	        firstDay: 0,
	        isRTL: false,
	        showMonthAfterYear: false,
	        yearSuffix: ''
	    };
	    $.datepicker.setDefaults($.datepicker.regional['pt']);
	});