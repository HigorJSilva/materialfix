$( document ).ready(function() {

	camposOpcionais();

	jQuery.validator.addMethod("exactlength", function(value, element, param) {
		return this.optional(element) || value.length == param;
	   }, $.validator.format("Informe {0} dígitos."));
		
	   $('#formSubmit').validate({
		onkeyup: false,
		onclick: false,
		onfocusout:false,
		rules : {
			nome:{
					required:true,
			},
			CNPJ:{
					required:true,
					exactlength: 18,
					remote: {
						url: "consultacnpj.php?cnpj="+ $('input[name="CNPJ"]').val(),
						type: "get",
						data: {
							cnpj: function () {
								return $('input[name="CNPJ"]').val();
							}
						},
						complete: function(data){
							console.log('data :>> ', data);

							if( data.responseText == "true") {

								return true;
							  }else{

								return false;
							  }
						 }
					},
			},
			razaoSocial:{
					required:true
			},
			telefone:{
					required:true,
					 exactlength: 15
			},
			CNAE:{
					required:true,
					 exactlength: 9
			},
			logradouro:{
					required:true
			},
			numero:{
					required:true,
					maxlength: 5
			},
			bairro:{
					required:true,
			},
			CEP:{
					required:true,
					 exactlength: 9
			},
			cidade:{
					required:true,
			},
			estado:{
					required:true
			},
			situacao:{
					required:true
			}                                
		},
		messages:{
			nome:{
				required:"É necessário informar o nome fantasia",
			},
			CNPJ:{
				required:"É necessário informar o CNPJ",
				exactlength:"CNPJ precisa ter 14 dígitos",
				remote:"Dados não encontrados",
			},
			razaoSocial:{
				required:"É necessário informar a razão social"
			},
			telefone:{
				required:"É necessário informar o telefone",
				exactlength:"O telefone precisa ter 11 dígitos"
			},
			CNAE:{
				required:"É necessário informar o CNAE",
				exactlength:"O CNAE precisa ter 7 dígitos"
			},
			logradouro:{
				required:"É necessário informar o logradouro",
			},
			numero:{
				required:"É necessário informar o número",
				maxlength: "O número não pode conter mais de 5 dígitos"
			},
			bairro:{
				required:"É necessário informar o bairro",
			},
			CEP:{
				required:"É necessário informar o CEP",
				exactlength:"O CEP precisa ter 8 dígitos"
			},
			cidade:{
				required:"É necessário informar a cidade",
			},
			estado:{
				required:"É necessário informar o estado",
			},
			situacao:{
				required:"É necessário informar a situaçao",
			}   
		},
		submitHandler: function(form) {
				$.ajax({
					method: "POST",
					url: "requisicao.php?acao="+$('#acao').val(),
					async: false,
					data:  getUnmaskValue.call( ),
					success : function(text){
						alert("Registro "+( ($('#acao').val() === "cadastro") ? "cadastrado " : "alterado ")+ "com sucesso." )
						location.href = "/PHP%20competi/index.php"
					},
					  error: function(){
						alert('Houve um erro na requisição');
					  }
				});
		}
	});
	   

	$('input[name="telefone"]').mask('(99) 99999-9999')
	$('input[name="CNPJ"]').mask('00.000.000/0000-00')
	$('input[name="CNAE"]').mask('0000-0/00')
	$('input[name="CEP"]').mask('00000-000')
});

function camposOpcionais(){
	if($('textarea[name="observacao"]').val() == ""){
		$('textarea[name="observacao"]').hide();
		$('label[name="lblObservacao"]').hide();
	}

	

	$('input[name="cbObservacao"]').on('click', function(){
		if ( $(this).prop('checked') ) {
			$('textarea[name="observacao"]').fadeIn();
			$('label[name="lblObservacao"]').fadeIn();
		} 
		else {
			$('textarea[name="observacao"]').hide();
			$('textarea[name="observacao"]').val("");
			$('label[name="lblObservacao"]').hide();
		}
		});
}


function excluirEmpresa(){
		
	$('#form').submit(function( event ) {
		event.preventDefault();
		$.ajax({
			method: "POST",
			url: "requisicao.php?acao=exclusao",
			data:  getUnmaskValue.call( ),
			success : function(text){
				alert("Registro excluído com sucesso." )
				location.href = "/PHP%20competi/index.php"
			},
			  error: function(){
				alert('Houve um erro na requisição');
			  }
		});
		return false;
	})

}

function getUnmaskValue(){
	var unmasked = {}
	$("form :input").each(function(){

			try{
				unmasked[$(this).attr('name')] = ( $(this).cleanVal());

			}catch($exception){
				unmasked[$(this).attr('name')] = ( $(this).val());

			}
	})
	unmasked["id"] = $('#id').val();
	unmasked["acao"] = $('#acao').val();

	return unmasked;
}

