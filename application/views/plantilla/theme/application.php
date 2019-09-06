<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="description" content="Prueba Tenica ZAV GROUP ">
  <meta name="author" content="Ing Ramiro Gomez">
  <title>Prueba ZAV GROUP</title>
  <link href="<?=base_url()?>assets/plantilla/css/bootstrap.min.css" rel="stylesheet" >
  <link href="<?=base_url()?>assets/plantilla/estilo.css" rel="stylesheet">
 </head>

<body class="bg-light">
  <main role="main" class="container-fluid">
    <div id='root'>
      <?=$yield?>
	</div>
  </main>
</body>
      <script src="<?=base_url()?>assets/plantilla/js/jquery-3.4.1.js"  ></script>
 	  <script src="<?=base_url()?>assets/plantilla/js/bootstrap.bundle.min.js" ></script>
	  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 	  <script>
         var app=  new Vue({
                el: '#root',
                data: {
                     nombre: '',
                     correo: '',
                     celular: '',
                     motivo: '',
                     comentario: '',
                     formActualizar: false,
                     idActualizar: 0,
                     nombreActualizar: '',
                     correoActualizar: '',
                     celularActualizar: '',
                     motivoActualizar: '',
					 comentarioActualizar: '',
                     usuarios: [] ,
					 errors: [],
                },
				 mounted: function () {
                      this.getUsuarios()
                },
                methods: {
				     getUsuarios: function(){
                     	axios.get('<?=base_url()?>taller/all')
                    	.then(function (response) {
                    	 console.log(response.data);
                    	 app.usuarios = response.data;

                    })
                       .catch(function (error) {
                           console.log(error);
                       });
                     },
                    crearUsuario: function () {
					    enviar=true;
						app.errors= [];
						 if (!this.nombre) {
					         	this.errors.push('El nombre es obligatorio.');
 								 enviar=false;
     					 } 
						  if(!this.correo) {
					          this.errors.push('El correo electrónico es obligatorio.');
 							  enviar=false;
     					 } else if (!this.validEmail(this.correo)) {
						     this.errors.push('El correo electrónico debe ser válido.');
     						 enviar=false;
     					 }
						 if (!this.celular) {
					         	this.errors.push('El celular es obligatorio.');
 								 enviar=false;
     					 } 
						 if (!this.motivo) {
					         	this.errors.push('El motivo es obligatorio.');
 								enviar=false;
     					 }
						 
						 
					  if(enviar){
					
					
					     let formData = new FormData();
						 formData.append('nombre', this.nombre)
						 formData.append('correo', this.correo)
						 formData.append('celular', this.celular)
						 formData.append('motivo', this.motivo)
						 formData.append('comentario', this.comentario)
						 url='<?=base_url()?>taller/create'
						 if( app.formActualizar == true){
						     formData.append('id',app.idActualizar )
							 url='<?=base_url()?>taller/update'
 						 }
 					     axios({
            					method: 'post',
           					    url: url,
           						data: formData,
                                config: { headers: {'Content-Type': 'multipart/form-data' }}
                           }).then(function (response) {
            					 app.getUsuarios();
						 	
                        		app.nombre = '';
                        		app.correo = '';
                        		app.celular = '';
                       		    app.motivo = '';
                        		app.comentario = ''; 
            					app.formActualizar  = false;
        				 	})
					 }
                         
                    },
                    verFormActualizar: function (usuario_id) {
                        app.idActualizar = app.usuarios[usuario_id].id;
                        this.nombre = app.usuarios[usuario_id].nombre;
                        this.correo = app.usuarios[usuario_id].correo;
                        this.celular = app.usuarios[usuario_id].celular;
                        this.motivo = app.usuarios[usuario_id].motivo;
                        this.comentario = app.usuarios[usuario_id].comentario;
                        app.formActualizar = true;
                    },
                    borrarUsuario: function (usuario_id) {
					     let formData = new FormData();
						 formData.append('id', usuario_id)
                          axios({
            					method: 'post',
           					    url: '<?=base_url()?>taller/delete',
           						data: formData,
                                config: { headers: {'Content-Type': 'multipart/form-data' }}
                           }).then(function (response) {
            					 app.getUsuarios();
         				 	})
						 
                    } ,
                    validEmail: function (email) {
                          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                         return re.test(email);
                     }
                   
                }
            });
     </script>
  
  </html>