  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-blue rounded shadow-sm">
     <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">ZAV GROUP - PRUEBA TECNICA</h6>
      <small>ING RAMIRO GOMEZ CAICEDO</small>
    </div>
  </div>
  <div class="row">
     <div class="col-3">
	 
	 <div class="card">
      <h6 class="card-header">Usuario</h6>
      <div class="card-body">
      	 <p v-if="errors.length">
    			<b>Por favor, corrija el(los) siguiente(s) error(es):</b>
   		      
		 <div v-if="errors.length"  class="alert alert-warning" role="alert">
               <ul>
    			  <li v-for="error in errors">{{ error }}</li>
    		</ul>
            </div>  
			  
			   
  		</p>
  				  
				  <div class="form-group">
    				<label for="exampleInputEmail1">Nombre</label>
				    <input type="text"  class="form-control form-control-sm" name="nombre" v-model="nombre" >
 				  </div>
				  <div class="form-group">
    				<label for="exampleInputEmail1">Correo</label>
				    <input type="text" class="form-control form-control-sm" name="correo" v-model="correo">
 				  </div>
				  <div class="form-group">
    				<label for="exampleInputEmail1">Celular</label>
				    <input type="number" class="form-control form-control-sm" name="celular"  v-model="celular">
 				  </div>
				  <div class="form-group">
    				<label for="exampleInputEmail1">Motivo</label>
				    <select class="form-control form-control-sm" name="motivo" v-model="motivo">
				      <option>Seleccione ...</option>
				      <option value="Compra">Compra</option>
				      <option value="Venta">Venta</option>
				      <option value="Alquiler">Alquiler</option>
				    </select>
  				  </div>
				  <div class="form-group">
    				<label for="exampleInputEmail1">Comentario</label>
					<textarea name="comentario" cols="" rows="" class="form-control form-control-sm" v-model="comentario"></textarea>
  				  </div>
				  
				  
                  <button  class="btn btn-primary mb-2"  @click="crearUsuario"  value="Add" >Enviar</button>
           
  
       </div>
      </div>
 	 
	 </div>
     <div class="col-9">
	 
	 
	 <div class="card">
      <h6 class="card-header">Todos los Usuarios</h6>
      <div class="card-body">
 <table   width="100%" border="0" class="table  table-sm">
 <thead class=" bg-gray">
  <tr >
    <th style="text-align:center;" >Nombre</th>
    <th style="text-align:center;" >Correo</th>
    <th style="text-align:center;" >Motivo</th>
    <th style="text-align:center;" >Accion</th>
  </tr>
   </thead>
   <tbody>
  <tr v-for="(usuario, index) in usuarios">
    <td>{{ usuario.nombre }}</td>
    <td>{{ usuario.correo }}</td>
    <td>{{ usuario.motivo }}</td>
    <td align="center">
     
 	    <a href="#"  class="btn btn-info  btn-sm" @click="verFormActualizar(index)">Editar</a> 
 	    <a href="#"  class="btn btn-danger  btn-sm" @click="borrarUsuario(usuario.id)">Eliminar</a> 
	</td>
  </tr>
 </tbody>
</table>
     </div>
  </div>
 	 </div>
</div>
  
  
  