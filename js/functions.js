$('document').ready(function(){

	$("#btn-login").click(function(){
		var data = $("#login-form").serialize();

		$.ajax({
			type : 'POST',
			url  : 'login.php',
			data : data,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#btn-login").html('Validando ...');
			},
			success :  function(response){						
				if(response.codigo == "200"){	
					$("#btn-login").html('Entrar');
					window.location.href = "dashboard.php";
				}
				else{			
                    $("#btn-login").html('Entrar');
                    alert(response.mensagem);
				}
		    }
		});
	});

});




$(document).ready(function(){
	
	$("#cep-client").blur(function(){
		var cep = $("#cep-client").val().replace(/\D/g, '');

		if (cep != "") {

			var validacep = /^[0-9]{8}$/;

			if(validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				$("#client-address").val("...");
				$("#client-address-city").val("...");
				$("#client-address-nieghborhood").val("...");
				$("#client-address-uf").val("...");

				//Consulta o webservice viacep.com.br/
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
					console.log(dados);
					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#client-address").val(dados.logradouro);
						$("#client-address-neighborhood").val(dados.bairro);
						$("#client-address-city").val(dados.localidade);
						$("#client-address-uf").val(dados.uf);
					} //end if.
					else {
						//CEP pesquisado não foi encontrado.
						limpa_formulário_cep();
						alert("CEP não encontrado.");
					}
				});
			}
		}
	});

});

$(document).ready(function(){
	
	$("#cep-provider").blur(function(){
		var cep = $("#cep-provider").val().replace(/\D/g, '');

		if (cep != "") {

			var validacep = /^[0-9]{8}$/;

			if(validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				$("#provider-address").val("...");
				$("#provider-address-city").val("...");
				$("#provider-address-nieghborhood").val("...");
				$("#provider-address-uf").val("...");

				//Consulta o webservice viacep.com.br/
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
					console.log(dados);
					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#provider-address").val(dados.logradouro);
						$("#provider-address-neighborhood").val(dados.bairro);
						$("#provider-address-city").val(dados.localidade);
						$("#provider-address-uf").val(dados.uf);
					} //end if.
					else {
						//CEP pesquisado não foi encontrado.
						limpa_formulário_cep();
						alert("CEP não encontrado.");
					}
				});
			}
		}
	});

});

$('document').ready(function(){

	$("#btn-save-client").click(function(){

		var cpf = $("#cpf").val();

		var validacpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

		if(validacpf.test(cpf)) {
			var data = $("#new-client-form").serialize();

			$.ajax({
				type : 'POST',
				url  : 'add-clients.php',
				data : data,
				dataType: 'json',
				beforeSend: function()
				{	
					$("#btn-save-client").html('Validando ...');
				},
				success :  function(response){						
					
					if(response.codigo == "200"){	
						$("#btn-save-client").html('Salvar');
						window.location.href = "clients.php";
					}
					else{			
			            $("#btn-save-client").html('Salvar');
			            alert(response.mensagem);
					}
			    }
			});
		} else {
			alert("CPF Inválido");
		}
	});

});

$('document').ready(function(){

	$("#btn-save-provider").click(function(){

		var cnpj = $("#cnpj").val();

		var validacnpj = /^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/;

		if(validacnpj.test(cnpj)) {
			var data = $("#new-provider-form").serialize();

			alert(data);

			$.ajax({
				type : 'POST',
				url  : 'add-providers.php',
				data : data,
				dataType: 'json',
				beforeSend: function()
				{	
					$("#btn-save-provider").html('Validando ...');
				},
				success :  function(response){						
					
					if(response.codigo == "200"){	
						$("#btn-save-provider").html('Salvar');
						window.location.href = "providers.php";
					}
					else{			
			            $("#btn-save-provider").html('Salvar');
			            alert(response.mensagem);
					}
			    }
			});
		} else {
			alert("CPF Inválido");
		}
	});

});

$('document').ready(function(){

	$("#btn-save-item").click(function(){

		var data = $("#new-item-form").serialize();

		$.ajax({
			type : 'POST',
			url  : 'add-items.php',
			data : data,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#btn-save-item").html('Validando ...');
			},
			success :  function(response){						
				
				if(response.codigo == "200"){	
					$("#btn-save-item").html('Salvar');
					window.location.href = "items.php";
				}
				else{			
					$("#btn-save-item").html('Salvar');
					alert(response.mensagem);
				}
			}
		});
	});

});