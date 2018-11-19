<!-- Modal showAddModal -->
<div class="myModal" id="myModal" role="dialog" v-if="showAddModal">
  <div class="modal-dialog">
      <!-- Modal content-->
  	  <div class="modal-header modal-content">
			<div class="editHeader">
				<span class="headerTitle col-xs-10 col-md-10">Ajouter un nouvel employé</span>
				<button class="closeEditBtn pull-right col-xs-2 col-md-2" @click="showAddModal = false">&times;</button>
			</div>
          		
			 		<div class="form-group">
						<label>Prénom - Nom</label>
						<input type="text" class="form-control" v-model="newMember.nommov">
	 		 		</div>
			 		<!--
			 		<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control" v-model="newMember.apemov">
			 		</div>
			 		-->
			 		<div class="form-group">
						<label>Sexe:</label>
 						<select class="form-control" id="sel1" name="template" v-model="newMember.sexmov">
    					<option v-for="template in templates"
        				:selected="template == category ? 'selected' : ''"
        				:value="template">
       					{{ template }}
			   			</option>
						</select>
			 		</div>
					<div class="modal-footer">
					<div class="footerBtn pull-right">
					<button class="btn btn-default warning" @click="showAddModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success warning" @click="showAddModal = false; saveMember();"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				</div>
     		</div>
  		</div>
	</div> 
</div> 
<!-- FIN FIN FIN Modal showAddModal -->
<!-- FIN FIN FIN Modal showAddModal -->
<!-- FIN FIN FIN Modal showAddModal -->








<!-- Edit Modal -->
<div class="myModal" v-if="showEditModal && (clickMember.nummov == null ||  clickMember.nummov == '')">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Modifier un employé</span>
			<button class="closeEditBtn pull-right" @click="showEditModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>Prénom - Nom</label>
				<input type="text" class="form-control" v-model="clickMember.nommov">
			</div>
			<!--
			<div class="form-group">
				<label>Nom</label>
				<input type="text" class="form-control" v-model="clickMember.apemov">
			</div>
			-->
			<div class="form-group">
				<label>Sexe:</label>
  				<label for="sel1">Sélectionnez la liste (sélectionnez-en une):</label>
      			<select class="form-control" id="sel1" v-model="clickMember.sexmov">
				<option value="" disabled="disabled">sélectionnez le Sexe</option>      			
		        <option value="Homme" selected="true">Homme</option>
		        <option value="Femme">Femme</option>
		        </select>
			</div>
		</div>
	
		<div class="modalFooter">
			<div class="footerBtn pull-right">

				<button class="btn btn-default warning" @click="showEditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

				 <button class="btn btn-success warning" @click="showEditModal = false; updateMember();"><span class="glyphicon glyphicon-check warning"></span> Save</button>
			</div>
		</div>
	</div>
</div>
<!-- FIN FIN FIN EDIT Modal EDIT MODAL -->
<!-- FIN FIN FIN EDIT Modal EDIT MODAL -->
<!-- FIN FIN FIN EDIT Modal EDIT MODAL -->

<!-- Débarque Modal -->
<div class="myModal" v-if="showDebarqueModal">
	<div class="modalContainer">
		<div class="deleteHeader">
			<span class="headerTitle">Débarqué employé </span>
			<button class="closeDelBtn pull-right" @click="showDebarqueModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<h5 class="text-center">Êtes-vous sûr de vouloir débarquer</h5>
			<h2 class="text-center">{{clickMember.nommov}} {{clickMember.apemov}}</h2>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default warning" @click="showDebarqueModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger warning" @click="showDebarqueModal = false; debarqueMember(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
			</div>
		</div>
	</div>
</div>
<!-- FIN Débarque Modal -->

<!-- Débarque Modal -->
<div class="myModal" v-if="showDebarqueModal2">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Embarqué employé </span>
			<button class="closeEditBtn pull-right" @click="showDebarqueModal2 = false">&times;</button>
		</div>
		<div class="modalBody">
			<h5 class="text-center">Êtes-vous sûr de vouloir embarquer</h5>
			<h2 class="text-center">{{clickMember.nommov}} {{clickMember.apemov}}</h2>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default warning" @click="showDebarqueModal2 = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-warning warning" @click="showDebarqueModal2 = false; embarqueMember(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
			</div>
		</div>
	</div>
</div>
<!-- FIN Embarque Modal -->




<!-- MOSTRAL Modal -->
<div class="myModal" v-if="mostrarModal">
	<div class="modalContainer">
		<div class="modalHeader">
            <span class="headerTitle">OJO-Modal Nuevo-ojo</span>
            <button class="closeBtn pull-right" @click="mostrarModal = false">&times;</button>
        </div>
        <div class="modalBody">
			<h5 class="text-center">Êtes-vous sûr de vouloir débarquer</h5>
			<h2 class="text-center">{{clickMember.nommov}} {{clickMember.apemov}}</h2>
		</div>
   	    <hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default warning" @click="mostrarModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger warning" @click="mostrarModal = false; debarqueMember(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
			</div>
		</div>
	 </div>
</div>
<!-- FIN mostral Modal -->


<!-- Edit Modal -->
<div class="myModal" v-if="showQuestion">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Employé enregistré</span>
			<button class="closeEditBtn pull-right" @click="showQuestion = false">&times;</button>
		</div>
		<div class="modalBody">
						<h1 class="text-center">Voules-vous faire un autre enregistrement</h1>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
			<fieldset class="btn upload1">
            <div class="controls upload1">
            <input type="file" accept="image/*" capture="camera" @click="showQuestion = false"/></div>
        	</fieldset>
			<!--
			<fieldset class="input-group upload1">
            <div class="controls upload1">
            <input type="file" accept="image/*" capture="camera"/></div>
        	</fieldset>
			-->
			<button class="btn btn-default warning" @click="showQuestion = false"><span class="glyphicon glyphicon-remove"></span>NON</button>
			</div>
		</div>
	</div>
</div>
<!-- fin -->

<!-- Edit Modal -->
	<div class="myModal" v-if="showQuestion2">
		<div class="modalContainer">
			<div class="deleteHeader">
			<span class="headerTitle">Employé NON enregistré</span>
			<button class="closeDelBtn pull-right" @click="showQuestion2 = false">&times;</button>
			</div>
			<div class="modalBody">
			<h1 class="text-center">Veuillez recommencer</h1>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
			<fieldset class="btn upload1">
            <div class="controls upload1">
            <input type="file" accept="image/*" capture="camera" @click="showQuestion2 = false"/>
        	</div>
        	</fieldset>
			<!--
			<fieldset class="input-group upload1">
            <div class="controls upload1">
            <input type="file" accept="image/*" capture="camera"/></div>
        	</fieldset>
			-->
			<button class="btn btn-default warning" @click="showQuestion2 = false"><span class="glyphicon glyphicon-remove"></span>NON</button>
			</div>
		</div>
	</div>
</div>
<!-- fin -->



	

<!-- Modal showAddModal existente -->
<div class="myModal" id="myModal" role="dialog" v-if="showAddModalex">
  <div class="modal-dialog">
      <!-- Modal content-->
  	  <div class="modal-header modal-content">
					<div class="editHeader">
					<span class="headerTitle col-xs-10 col-md-10">Ajouter un  employé existant</span>
					<button class="closeEditBtn pull-right col-xs-2 col-md-2" @click="showAddModalex = false">&times;</button>
					</div>
	          		
			 		<div class="form-group">
				    <label>Prénom - Nom</label>
					<input type="text" class="form-control" v-model="newMember.nommov"  v-on:keyup="actualizarLista($event.target.value)">
					<input type="hidden" class="form-control" v-model="newMember.codmov">
	 		 		</div>
			 	
					<div class="modal-footer">
					<div class="footerBtn pull-right">
					<button class="btn btn-default warning" @click="showAddModalex = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success warning" @click="showAddModalex = false; saveMemberexistentes();"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				    </div>
     		        </div>
  		</div>
	</div> 
</div> 
<!-- FIN FIN FIN Modal showAddModal-existente -->
<!-- FIN FIN FIN Modal showAddModal -->
<!-- FIN FIN FIN Modal showAddModal -->





<!-- Modal showAddimagen -->


<div class="myModal" id="myModal" role="dialog" v-if="showAddimagen">
  <div class="modal-dialog">
  	  	  <div class="modal-header modal-content">
			<div class="editHeader">
				<span class="headerTitle col-xs-2 col-md-2">Employé ajouté</span>
			</div>
			<!-- class="upload1img" -->
	        <div class="upload1img" style="width: 420px; height: 400px; border: none;" >
		    <img  style="width: 100%; height: 100%;"  @click="showAddimagen = false">
            </div>
  	        <div class="col-xs-2 col-md-2">
					<div class="modal-footer">
					<div class="footerBtn pull-right">
					</div>
		     		</div>
		</div>
  </div>
</div>  
</div> 



<!-- Modal showAddimagen2 -->
<!-- MOSTRAL Modal -->
	<div class="myModal" id="myModal" role="dialog" v-if="showAddimagen2">
	   <div class="modal-dialog">
  	  	  	<div class="modal-header modal-content">
  	  	  		<pre style="margin: 0; text-align: center; font-size: 14px; white-space: normal">SVP attendre. Création du PDF </pre>
				<pre style="margin: 0; text-align: center; font-size: 14px; white-space: normal">et envoi du courriel en cours </pre>
		        <div class="col-xs-10 col-md-10" style="margin: 0; text-align: center;">
                <img  style="vertical-align: top;" class="form-img" src="./img/ajax-loader.gif"  /> <span style="vertical-align: bottom; margin: 0px; position: left;"></span> 
                </div>
	        </div>
		  	        <div class="col-xs-2 col-md-2">
					<div class="modal-footer">
					<div class="footerBtn pull-right">
					</div>
				    </div>
				    </div>
  			</div>
		</div>  
	</div>  



