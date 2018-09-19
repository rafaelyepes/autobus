
var app = new Vue({
	el: '#members',
	data:{
		showAddimagen: false,
		showAddimagenX: false,
		showAddModal: false,
		showAddModal1: false,
		showEditModal: false,
		showDeleteModal: false,
		showDebarqueModal: false,
		mostrarModal: false,
		showQuestion: false,
		showQuestion2: false,
		errorMessage: "",
		successMessage: "",
		selected: "A",
		members: [],
		templates: ['Homme','Femme'],
        category: 'Homme',
		newMember: {nummov:'',nommov: '', apemov: '', sexmov: '',documento: ''},
		clickMember: {}
	},

	mounted: function(){
		this.getAllMembers();
	},

	methods:{
		getAllMembers: function(){
		
//		axios.post('api.php?documento=documento')
//		axios.post('api.php?documento=DOC0101')
		documento=document.getElementById("documento").value;;
//esta esta bien//
		axios.get('api.php?documento='+documento)
//****////	
	
	
		

		

		.then(function(response){
			//console.log(response);
					if(response.data.error){
						app.errorMessage = response.data.message;
//						app.errorMessage = "Error -01";
					}
					else{
						app.members = response.data.members;

						//app.successMessage = "Miembros OK"
					}
			});
		},

		ConsultaMembers: function(){
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

		ValidaMembers: function(){
			app.consultaMember.fecmov=document.getElementById("fecha").value;
			app.consultaMember.docmov=document.getElementById("documento").value;  
			var memForm = app.toFormData(app.consultaMember);
			nummov = app.consultaMember.nummov;
			crud="grababd";
  	    	fecmov=document.getElementById("fecha").value; 


  	    	//alert (crud+" "+fecmov+" "+nummov);   
  	  		
  	  		/*
  	  		axios.post('api.php', {
   			params: {
      		crud: crud,
      		nummov: nummov,
      		fecmov: fecmov
  	  		}
			})
			*/
			
			axios.post('api.php?crud=grababd', memForm)

				.then(function(response){
					//console.log(response);
					if(response.data.error){
						app.errorMessage = response.data.message;
//						app.errorMessage = "Error -01";
					}
					else{
					//	app.members = response.data.members;
//					app.successMessage = response.data.message
					

					
//   				    app.successMessage = response.data.members[0].nommov;


					//numero=response.data.members[0].nummov;
					nombre=response.data.members[0].nommov;
					if (nombre == "EXISTE"){
						app.successMessage = "Respuesta ok-ya existe";
             		   //app.ConsultaMembers();
						$("#respuesta").css({"background-color": "red"});
						$("#respuesta").text("Employé est déjà enregistré");
	        		 	$("#respuesta").show();

            		 }else{
            		 	app.successMessage = "Grabado Nuevo";
            		 	$("#respuesta").css("background-color","green");
						$("#respuesta").text("Employé enregistré");
	        		 	$("#respuesta").show();
            		 	app.showAddimagen = "true";
						app.getAllMembers();
						


//            		 	app.showDebarqueModal = "true";
						//app.RevisaMembers();
            		 }
					/*
					nombre=response.data.members[0].nomemp;
					apellido=response.data.members[0].apeemp;
					sexo=response.data.members[0].sexemp;

					*/
        
//					app.newMember = {nummov:numero, nommov:nombre, apemov:apellido, sexmov:sexo};
//					app.saveMember1();

					}
				});
		}, //fin funcion valida miembros

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
			//console.log(app.newMember);
   	   	//  var documento = <?php echo json_encode($documento)?>;
		//	app.newMember.documento=documento;
			app.newMember.fecmov=document.getElementById("fecha").value;
			app.newMember.documento=document.getElementById("documento").value;
			app.newMember.sexmov=app.category;

			var memForm = app.toFormData(app.newMember);
			axios.post('api.php?crud=create', memForm)
				.then(function(response){
					//console.log(response);
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
			var memForm = app.toFormData(app.clickMember);
			axios.post('api.php?crud=delete', memForm)
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

		debarqueMember(){
			var memForm = app.toFormData(app.clickMember);
			axios.post('api.php?crud=debarque', memForm)
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