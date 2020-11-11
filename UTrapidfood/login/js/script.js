$( document ).ready(function() {

	$("#sendLogin").submit(function(e) {
		e.preventDefault();
		var usuario = $("#usuario").val();
		var pass = $("#passwd").val();
		const DATOS = {
			usuario: usuario,
			pass: pass
		};
		$.post("loginDB.php",DATOS,function(respuesta) {
			if (respuesta == "logged") {
				location.href=" ../index.html";
			}else{
				$("#loginMessage").html(respuesta);
				$("#loginMessage").show();
			}
		});
		
	});


	function checkEmail(){
		var correo=document.getElementById("correo").value;
		if(correo ==""){
			document.getElementById("emailmsg").innerHTML = "Necesitas proporcionar un correo!";
			$("#emailmsg").show();
		}
		else{
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (expr.test(correo)){
				document.getElementById("emailmsg").innerHTML = "";
				$("#emailmsg").hide();
			}
			else{
				document.getElementById("emailmsg").innerHTML = "Este correo no es válido";
				$("#emailmsg").show();
			}        
		}
	}
	document.getElementById("correo").addEventListener("blur",checkEmail,false);


	function checkUsername() {
		var user = document.getElementById("usuario").value;
		if(user ==""){
			document.getElementById("usermsg").innerHTML = "Debes introducir un usuario!";
			$("#usermsg").show();
		}else {
			document.getElementById("usermsg").innerHTML = "";
			$("#usermsg").hide();
		}
	}
	document.getElementById("usuario").addEventListener("blur",checkUsername,false);

	function checkPassword() {
		var password = document.getElementById("passwd").value;
		if(password ==""){
			document.getElementById("passmsg").innerHTML = "Debes introducir una contraseña!";
			$("#passmsg").show();
		}else {
			if (password.length < 6) {
				document.getElementById("passmsg").innerHTML = "Tu contraseña debe ser de por lo menos 6 caracteres";
				$("#passmsg").show();
			}else {
				document.getElementById("passmsg").innerHTML = "";
				$("#passmsg").hide();
			}
		}
	}
	document.getElementById("passwd").addEventListener("blur",checkPassword,false);


	function checkReppasswd() {
		var reppasswd = document.getElementById("reppasswd").value;
		if(reppasswd ==""){
			document.getElementById("passrepmsg").innerHTML = "Debes confirmar la contraseña!";
			$("#passrepmsg").show();
		}else {
			if (document.getElementById("passwd").value != reppasswd) {
				document.getElementById("passrepmsg").innerHTML = "Las contraseñas no coinciden";
				$("#passrepmsg").show();
			}else {
				document.getElementById("passrepmsg").innerHTML = "";
				$("#passrepmsg").hide();
			}
		}
	}
	document.getElementById("reppasswd").addEventListener("blur",checkReppasswd,false);



	$("#sendRegister").submit(function(e) {
		e.preventDefault();
		if ($("#register").val() == "Aceptar") {
			location.href="index.php";
		}
		const DATOS = {
			usuario: $("#usuario").val(),
			correo: $("#correo").val(),
			password: $("#passwd").val(),
			repeatpassword: $("#reppasswd").val()
		};
		$.post("registerDB.php",DATOS,function(respuesta) {
			if (respuesta == "OK") {
				$("#passrepmsg").html("cuenta registrada");
				document.getElementById("passrepmsg").style.color = "rgba(0,255,0,255)";
				$("#passrepmsg").show();
				$("#register").val("Aceptar");
			}else{
				$("#passrepmsg").html(respuesta);
				$("#passrepmsg").show();
			}
		});
		
	});


});


