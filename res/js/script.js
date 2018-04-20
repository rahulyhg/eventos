((function ( w, d) {
	'use strict';
	var $form = d.querySelector("[data-js='form']");
	var $input = d.querySelectorAll("[data-js='input']");

	if ($input[0]) {
		$input[0].focus();
	}

	var status = (w.location.href).charAt((w.location.href).length-1);

	if (status == 1) {
		$('#modal-success').modal('show');
	} else if (status == 0) {
		$('#modal-erro').modal('show');
	} else if (status == 2) {
		$('#modal-warning').modal('show');
	}

	if ($form) {
		$form.addEventListener( 'submit', function (s) {
			for (var i = 0; i <= $input.length; i++) {
				if (!$input[i].value) {
					s.preventDefault();
					if ($input[i].placeholder == undefined) {
						w.alert("Informe " + $input[i].id);
					} else {
						w.alert("Informe " + $input[i].placeholder);
					}
					$input[i].focus();
					break;
				}
				if ($input[2]['name'] === 'senha' && $input[3]['name'] === 'repetir-senha') {
					if ($input[2].value && $input[3].value) {
						if ($input[2].value != $input[3].value) {
							s.preventDefault();
							w.alert("Informe duas senhas iguais!");
							break;
						}			
					}				
				}			
			}
		}, false);		
	}

})( window, document));