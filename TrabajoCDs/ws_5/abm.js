function mostrarIngreso(){

$.ajax({url:"nexo.php",type:"post",data:{accion:"mIng"}}).then(
	function(exito){

		$("#contenedor").html(exito);

	},function(error){

		$("#contenedor").html(error);
			

	});


}

function ingresar(){

	var n =  $("#cantante").val();
	var a =  $("#ano").val();
	var t =  $("#titulo").val();

	$.ajax({url:"nexo.php",type:"post",data:{accion:"ingresar",nombre:n,ano:a,titulo:t}}).then(
	function(exito){

		mostrar();



	},function(error){

		$("#contenedor").html(error);
			

	});


}

function mostrar(){

	$.ajax({url:"nexo.php",type:"post",data:{accion:"mostrar"}}).then(
	function(exito){

		$("#contenedor").html(exito);



	},function(error){

		$("#contenedor").html(error);
			

	});
}
