$(function(){
	$("#formularioCliente").validate({
		rules: 
		{
			nome:{
				required: true,
				minlength:1,
				maxlength:100
			},
			email:{
				required: true,
				email: true,
				minlength:1,
				maxlength:100
			},
			cpf:{
				required: true,
				maxlength:14,
				minlength:13
			},
			celular: {
				required: true,
				maxlength:15,
				minlength:14
			},
			nascimento: {
				required: true,
				date: true
			},


		}
	});
});