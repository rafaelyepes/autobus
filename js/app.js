//   $(".btn-success").prop("disabled",true);
//    $(".btn-tt").prop("disabled",true);
var app = new Vue({
	el: '#members',
	data:{
		showAddimagen: false,
		showAddimagen2: false,
		showAddimagenX: false,
		showAddModal: false,
		showAddModalex: false,
		showAddModal1: false,
		showEditModal: false,
		showDeleteModal: false,
		showDebarqueModal: false,
		showDebarqueModal2: false,
		mostrarModal: false,
		showQuestion: false,
		showQuestion2: false,
		errorMessage: "",
		successMessage: "",
		saveMemberex: "",
		danger1: "",
		contadorgr: 0,

		selected: "A",
		members: [],
		templates: ['Homme','Femme'],
        category: 'Homme',
		newMember: {codmov:'ZZZZZ', nummov:'',nommov: '', apemov: '', sexmov: '',documento: ''},
		clickMember: {}
	},

	mounted: function(){
		this.getAllMembersinicio();
	},
	methods:{
		getAllMembersinicio: function(){
		docmov = document.getElementById("documento").value;

		if (docmov != ''){
			//alert ("Adicionando :"+docmov);
			crud="read-1";
			const formData = new FormData();
			formData.append('crud', crud);
			formData.append('docmov', docmov);
		    console.log("Documento inicial-verifica");
			axios({
	              method: 'POST',
	              url: 'api.php',
	              responseType: 'json',
	              data: formData
	        })
			//esta esta bien//
			.then(function(response){
						console.log("Respueta grabados-todos los miembros documento inicial");
						console.log(response);
						if(response.data.error){
							app.errorMessage = response.data.message;
						}
						else{
							app.members = response.data.results;
							document.getElementById("fecha").value = response.data.fecin;
							document.getElementById("chofer").value = response.data.choin;
							document.getElementById("bus").value = response.data.busin;
							document.getElementById("horadepart").value = response.data.horadepart;
							document.getElementById("horallegada").value = response.data.horallegada;

							horadepart = response.data.horadepart;
							horallegada = response.data.horallegada;

							$("#chofer").css("background-color", "#9FF781");
							$("#bus").css("background-color", "#9FF781");
							validahora(horadepart, horallegada);
						}
			});
		} else {

			horadepart = document.getElementById("horadepart").value;
			horallegada = document.getElementById("horallegada").value;
			//alert (horadepart+"  "+horallegada);
			validahora(horadepart, horallegada);
		} //fin condicion if
		},

		getAllMembers: function(){
		fecmov = document.getElementById("fecha").value;
		docmov = document.getElementById("documento").value;
		chofer = document.getElementById("chofer").value;
		autobus = document.getElementById("bus").value;

		if (docmov !=''){
		crud="read";
		const formData = new FormData();
		formData.append('crud', crud);
		formData.append('fecmov', fecmov);
		formData.append('docmov', docmov);
	  formData.append('autobus', autobus);
		formData.append('chofer', chofer);
	  console.log("Muestra Todos los grabados");
		axios({
              method: 'POST',
              url: 'api.php',
              responseType: 'json',
              data: formData
        })
		//esta esta bien//
		.then(function(response){
					console.log("Respueta grabados-todos los miembros");
					console.log(response);
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.members = response.data.results;
					}
			});

		} //fin if docmov


		},

		ConsultaMembers: function(){
			alert ("Consulta miembros");
			app.successMessage = "si esta consultando";
			var memForm = app.toFormData(app.consultaMember);
			axios.post('api.php?crud=consulta', memForm)
				.then(function(response){
					//console.log(response);
					if(response.data.error){1
						app.errorMessage = response.data.message;
//						app.errorMessage = "Error -01";
					}
					else{
					//	app.members = response.data.members;
					//	app.successMessage = response.data.message
					//app.successMessage = response.data.members[0].numemp;

					numero=response.data.members[0].numemp;
					nombre=response.data.members[0].nomemp;
					apellido=response.data.members[0].apeemp;
					sexo=response.data.members[0].sexemp;

					/*
					nombre=app.members[0].nomemp;
					apellido=app.members[0].apeemp;
					sexo=app.members[0].sexemp;
					numero="41333";
					nombre="Solagne-nuevo";
					apellido="Tchoelag-nuevo";
					sexo="Femme";
					*/
		 			documentog= document.getElementById("documento").value;

					app.newMember = {nummov:numero, nommov:nombre, apemov:apellido, sexmov:sexo, documento:documentog};
					app.saveMember1();

					}
				});
		},

		ValidaChiffres: function(nummov){
	//	alert ("Carte invalide est nécessaire pour le scanner à nouveau:"+nummov);
		alert ("SVP: Vérifer si la carte esr enregistrée dans le tableau"+nummov);
		},

		ValidaMembers: function(nummov){

			numerorecibido=nummov;
			//alert (nummov);
			//nummov = "C0001";
			fecmov = document.getElementById("fecha").value;
			docmov = document.getElementById("documento").value;
			chofer = document.getElementById("chofer").value;
			autobus = document.getElementById("bus").value;

			//alert ("Chofer : "+chofer+"   "+"Autobus  :"+autobus);


			validacion = "1";
			if (chofer =='' || autobus ==''){
				validacion = "0";
			}
			if (nummov != chofer && nummov != autobus){
			 if (validacion == "1"){
				crud="grababandolinea";
				const formData = new FormData();
		        formData.append('crud', crud);
		        formData.append('nummov', nummov);
		        formData.append('fecmov', fecmov);
		        formData.append('docmov', docmov);
	            formData.append('autobus', autobus);
		        formData.append('chofer', chofer);
		        console.log("Consultando Respuesta AL SERVIDOR-validacion-111");
						axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
		        })
				//esta esta bien//
				.then(function(response){
					console.log("Consultando Respuesta LINEA AGREGADA");
					console.log(response);
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
					//numero=response.data.members[0].nummov;
					nombre=response.data.members[0].nommov;
					nombre=response.data.members[0].nommov;
					if (nombre == "EXISTE"){
						app.successMessage = "Respuesta ok-ya existe";
             		   $("#slider-thumbs ul.hide-bullets li:first-child").remove();
									 alert ("Employé est déjà enregistré");
					}else{
									idgenerado=response.data.idgenerado;
            		 	app.successMessage = "Grabado Nuevo";
            		 	console.log("LLamando a todos los miembros getAllMembers");
								//	alert ("Verifica Si esta grabado el miembro  "+idgenerado);
            		 	console.log("Set Timer-01");
            		 	//contador para cerrar el MODAL AUTOMAQTICAMENTE//
									if (idgenerado != "0"){
 										  app.contadorgr=0;
											app.getAllMembers();
									    app.showAddimagen = true;
						          setTimeout(() => {
						            app.showAddimagen = false;
						          }, 1300);
									}else{
										 if (app.contadorgr <= 20){
											 app.contadorgr=app.contadorgr+1;
											 app.ValidaMembers(numerorecibido);
										 }
										 if (app.contadorgr >=21){
											app.finciclo();
										 }
									} //fin if idgenerado
								} // fin if nombre == "EXISTE"
					}
				}); // fin then funcion

				} // FIN VALIDACION chofer-autbous;
				} // FIN VALIDACION =1;

			if (validacion == "0"){
					//Validando si el BUS YA FUE ABIERTO O CERRADO//
					//alert ("Validacion Carta Autobus o Carta Conductor");
					crud="validaautobus";
					usuario='autobus';
					const formData = new FormData();
			        formData.append('crud', crud);
			        formData.append('nummov', nummov);
			        formData.append('fecmov', fecmov);
			        formData.append('docmov', docmov);
                    formData.append('autobus', autobus);
			        formData.append('chofer', chofer);
			        formData.append('usuario', usuario);
			       // alert ("0");
			        console.log("Consultando Respuesta AL SERVIDOR-CARTA AUTOBUS");
					axios({
			              method: 'POST',
			              url: 'api.php',
			              responseType: 'json',
			              data: formData
			        })
					//esta esta bien//
					.then(function(response){
					        console.log("Consultando SERVIDOR-CARTA AUTOBUS");
							console.log(response);
							if(response.data.error){
								app.errorMessage = response.data.message;
							}else{
							if (response.data.respuesta =='EMPLEADO NO ACORDE'){
		               		    $("#slider-thumbs ul.hide-bullets li:first-child").remove();
//								$("#result_strip ul.thumbnails li:first-child").remove();
								alert ("SVP scanner la carte du chauffeur et identifier l'autobus");
								return false;
							}
							autobus=response.data.autobus;
	 					    document.getElementById("bus").value=response.data.autobus;
							document.getElementById("chofer").value=response.data.chofer;
							document.getElementById("documento").value=response.data.documento;
							document.getElementById("horadepart").value=response.data.horadepart;
							document.getElementById("horallegada").value=response.data.horallegada;
							validahora(response.data.horadepart, response.data.horallegada);
							console.log(response.data.autobus);
							console.log(response.data.chofer);
							console.log(response.data.documento);
							if (response.data.chofer !=''){
								$("#chofer").css("background-color", "#9FF781");
							}
							if (response.data.autobus !=''){
								$("#bus").css("background-color", "#9FF781");
							}
							if (response.data.chofer !='' && response.data.autobus !=''){
							$(".container-fluid").css("background-color", "#FFFFFF");
							  //alert ("Chofer-Autbus Completo");
						     /*Evita refrescar la pagina*/
				              documentodd=document.getElementById("documento").value
				              if (documentodd !=''){
				                refh=window.location.host;
				                refp=window.location.pathname;
				                refs=window.location.search.split('?');
				                nuevourl=refp+"?documento="+documentodd+"&"+refs[1];
				                history.pushState(null, "", nuevourl);
				              }
							 /*Evita refrescar la pagina*/
             				}

							app.getAllMembers();
							}
						}); // fin then funcion
			}//fin validacion 0
		}, //fin funcion valida miembros

		finciclo: function(){
			$("#slider-thumbs ul.hide-bullets li:first-child").remove();
			alert ("Erreur de communication CARTE non sauvegardée "+app.contadorgr);
			return false;
		//	app.contadorgr=0;
		},


		RevisaMembers: function(){
			//$('#myModal').modal('show');
			//app.successMessage = "Revisando si esta en el otro bus";
			//app.showDebarqueModal = "true";

			var memForm = app.toFormData(app.consultaMember);
			axios.post('api.php?crud=revisa', memForm)
				.then(function(response){
					//console.log(response);
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
//						app.mostrarModal = "true";
					    app.successMessage = "Revisando si esta en el otro bus";
					}
				});
		},

		saveMember: function(){
				fecmov = document.getElementById("fecha").value;
				docmov = document.getElementById("documento").value;
				chofer = document.getElementById("chofer").value;
				autobus = document.getElementById("bus").value;
				crud="create";
				const formData = new FormData();
			    formData.append('crud', crud);
		        formData.append('fecmov', fecmov);
		        formData.append('docmov', docmov);
	            formData.append('autobus', autobus);
		        formData.append('chofer', chofer);
		        formData.append('firstname', app.newMember.nommov);
		        formData.append('lastname', app.newMember.apemov);
		        formData.append('sexe', app.newMember.sexmov);
				console.log("Consultando Respuesta GRABANDO ADICIONAL");
				console.log(app.newMember);
				axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
		        })
				//esta esta bien//
				.then(function(response){
					//console.log(response);
					app.newMember = {nommov:'', apemov:'', sexmov:'', fecmov:'', docmov:''};
					if(response.data.error){
						app.errorMessage = response.data.message;
//						app.errorMessage = "Error -01";
					}
					else{
						console.log("RESPUESTA SATISFACTORIA GRABANDO ADICIONALES");
//						app.successMessage = "Si esta buscando en el cruddd";
						console.log(response);
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		saveMemberexistentes: function(){
				fecmov = document.getElementById("fecha").value;
				docmov = document.getElementById("documento").value;
				chofer = document.getElementById("chofer").value;
				autobus = document.getElementById("bus").value;
				crud="createex";
				const formData = new FormData();
			    formData.append('crud', crud);
		        formData.append('fecmov', fecmov);
		        formData.append('docmov', docmov);
	            formData.append('autobus', autobus);
		        formData.append('chofer', chofer);
		        formData.append('codigoname', app.newMember.codmov);
		        formData.append('firstname', app.newMember.nommov);
		        formData.append('lastname', app.newMember.apemov);
		        formData.append('sexe', app.newMember.sexmov);
				console.log("Consultando Respuesta GRABANDO existente");
				console.log(app.newMember);
				axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
		        })
				//esta esta bien//
				.then(function(response){
					console.log(response);
					app.newMember = {nommov:'', apemov:'', sexmov:'', fecmov:'', docmov:''};
					if(response.data.error){
						app.errorMessage = response.data.message;
//						app.errorMessage = "Error -01";
					}
					else{
//						app.successMessage = "Si esta buscando en el cruddd";
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});




		},


		saveMember1: function(){
			//console.log(app.newMember);
			var memForm = app.toFormData(app.newMember);
			axios.post('api.php?crud=create1', memForm)
				.then(function(response){
					//console.log(response);
					app.newMember = {nummov:'', nommov:'', apemov:'', sexmov:''};
					if(response.data.error){
						app.errorMessage = response.data.message;
//						app.errorMessage = "Error -01";

					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
						sonido();
						app.showQuestion = "true";

					}
				});
		},

		updateMember(){
				fecmov = document.getElementById("fecha").value;
				docmov = document.getElementById("documento").value;
				chofer = document.getElementById("chofer").value;
				autobus = document.getElementById("bus").value;
				crud="update";
				const formData = new FormData();
			    formData.append('crud', crud);
		        formData.append('fecmov', fecmov);
		        formData.append('docmov', docmov);
	            formData.append('autobus', autobus);
		        formData.append('chofer', chofer);
		        formData.append('firstname', app.clickMember.nommov);
		        formData.append('lastname', app.clickMember.apemov);
		        formData.append('sexe', app.clickMember.sexmov);
		        formData.append('memid', app.clickMember.id);
				console.log("UPDATE GRABANDO ADICIONAL");
				console.log(app.clickMember);
				axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
		        })
				//esta esta bien//


			var memForm = app.toFormData(app.clickMember);
			axios.post('api.php?crud=update', memForm)
				.then(function(response){
					//console.log(response);
					app.clickMember = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},



		deleteMember(){
			crud="delete";
			const formData = new FormData();
  		    formData.append('crud', crud);
			formData.append('memid', app.clickMember.id);
			console.log("Borrando Miembro");
			console.log(app.clickMember);
			axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
	        })
			.then(function(response){
					//console.log(response);
					app.clickMember = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		actualizarLista(event){

			var n = event.length;
			if (!/^([0-9])*$/.test(event)){

			}else{
	  		  if ( n == 5){

				console.log(event);
				console.log("Verificando el codigo");
				crud="verificacodigo";
				memid=event;
				const formData = new FormData();
	  		    formData.append('crud', crud);
				formData.append('memid', memid);
				console.log("verificando codigo");
				axios({
						  method: 'POST',
			              url: 'api.php',
			              responseType: 'json',
			              data: formData

		        })
				.then(function(response){
						console.log("Respuesta verificando codigo");
						console.log(response);
						if(response.data.error){
							console.log("Respuesta ERROR "+response.data.nombre);
							app.errorMessage = response.data.message;
						}
						else{
							console.log("Respuesta OK "+response.data.nombre);
							app.successMessage = response.data.message
							app.newMember.nommov=app.newMember.nommov+" "+response.data.nombre;
							app.newMember.codmov=response.data.codigoname;
						}
				});





  			  } //fin n==6
			} // fin valida si es numerico






		}, //fin actulizarlista

		debarqueMember(){
			crud="debarque";
			docmov = document.getElementById("documento").value;
			const formData = new FormData();
  		    formData.append('crud', crud);
			formData.append('memid', app.clickMember.id);
	//		alert (app.clickMember.id)
			formData.append('docmov', docmov);
			console.log("Debarcando Miembro");
			console.log(app.clickMember);
			axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
	        })
			.then(function(response){
					console.log("Respuesta debarcando Miembro");
					console.log(response);
					app.clickMember = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		embarqueMember(){
			crud="embarque";
			const formData = new FormData();
  		    formData.append('crud', crud);
			formData.append('memid', app.clickMember.id);
			console.log("embarcando Miembro");
			console.log(app.clickMember);
			axios({
		              method: 'POST',
		              url: 'api.php',
		              responseType: 'json',
		              data: formData
	        })
			.then(function(response){
					console.log("Respuesta embarcando Miembro");
					console.log(response);
					app.clickMember = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		selectMember(member){
			app.clickMember = member;
		},

		toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function(){
			app.errorMessage = '';
			app.successMessage = '';
		}

	}
});
