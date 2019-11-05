<template>
    <div class="fondo">
    	<header>
    		<div class="item">
		        <img src="../.././logos/mppe.png" alt="logo ministerio" class="logo-img item-2">
		    </div>
		    <div class="item">
		        <img src="../.././logos/gobernacion.png" alt="logo gobernación" class="logo-img">
		    </div>
		    <div class="item">
		        <img src="../.././logos/zeg.png" alt="logo zona educativa guarico" class="logo-img">
    		</div>
    	</header>
    	<form action="" name="formulario_envio" class="mensaje_form" method="post" @submit.prevent="registro">
   <h2>Registro de Carrera 4k</h2>
   <div>
       <div class="input_group">
            <label for="nombre" id="labelNombre" class="label">Nombre: </label>
           <input type="text" name="nombre" id="nombre" placeholder="Introducir Nombre" v-model="nombre" minlength="3" maxlength="50" required>
       </div>
        <div class="input_group">
           <label for="apellido" id="labelApellido" class="label">Apellido: </label>
            <input type="text" name="apellido" id="apellido" placeholder="Introducir Apellido" class="input_form" v-model="apellido" minlength="5" maxlength="50" required>
         </div>
       <div class="input_group">
         <label for="cedula" id="labelCedula" class="label">Cédula: </label>
         <input type="text" name="cedula" id="cedula" placeholder="Introducir Cédula" v-model="cedula" minlength="5" maxlength="9" required>
       </div>
       <div class="input_group">
         <label for="plantel" id="labelPlantel"class="label">Plantel: </label>
         <input type="text" name="plantel" id="plantel" placeholder="Introducir Plantel" v-model="plantel" minlength="3 " maxlength="100" required>
       </div>
       <div class="input_group">
         <label for="edad" id="labelEdad"class="label">Edad: </label>
         <input type="number" name="edad" id="edad" placeholder="Introducir Edad" v-model="edad" minlength="1" maxlength="3" required>
       </div>
       <div class="input_group">
         <p>Masculino</p>
         <input type="radio" name="sexo" id="sexo" class="input_form" value="masculino" v-model="sexo" required>
         <p>Femenino</p>
         <input type="radio" name="sexo" id="sexo" class="input_form"value="femenino" v-model="sexo" required>
       </div>
       <div class="input_group">
           <label for="direccion" id="direccion"class="label">Dirección: </label>
           <textarea for="" name="direccion" placeholder="Introducir Dirección" v-model="direccion" minlength="3" maxlength="150" required></textarea>
        </div>
        <div class="input_group">
              <label for="grado" id="grado"class="label">Grado: </label>
              <select name="grado" placeholder="introducir su grado" v-model="grado" required>
                <option>Inicial</option>
                <option>4to GRADO</option>
                <option>5to GRADO</option>
                <option>6to GRADO</option>
                <option>1er AÑO</option>
                <option>2do AÑO</option>
                <option>3er AÑO</option>
                <option>4to AÑO</option>
                <option>5to AÑO</option>
                <option>6to AÑO</option>
              </select>
        </div>
        <div class="input_group">
              <label  for="distancia"  class="label">Distancia:</label>
             <select name="distancia" placeholder="introducir su distancia" v-model="distancia" required>
                <option>{{distanciaOpcion}}</option>
              </select>
                <!--<option>{{validacionDistancia}}</option>-->
        </div>
        <div v-if="grado == 'Inicial'">
              <label  for="tallaZapato"  class="label">Talla de Zapatos:</label>
              <input type="text" name="tallaZapato" id="tallaZapato" class="input_form" v-model="zapato" maxlength="20" required>
              <label  for="tallaPantalon"  class="label">Talla de Pantalón:</label>
              <input type="text" name="tallaPantalon" id="tallaPantalon" class="input_form" v-model="pantalon" maxlength="20" required>
              <label  for="tallaCamisa"  class="label">Talla de Camisa:</label>
              <input type="text" name="tallaCamisa" id="tallaCamisa" class="input_form" v-model="camisa" maxlength="20" required>
          </div>
          <div class="checkbox">
              <input type="checkbox" name="autorizacion" id="autorizacion" class="input_form" v-model="verificacionPaternal" required>
              <label  for="tallaZapato"  class="label">Confirmo que estoy bajo la autorización de mis padres</label>
          </div>
       <button id="mensaje_btn" type="submit" value="registrar">Registrar</button>
     </div>
  </form>
    </div>
</template>

<script>
export default {

  name: 'Home',

  data () {
    return {
    nombre:'',
    apellido:'',
    cedula:'',
    plantel:'',
    edad:'',
    sexo:'',
    direccion:'',
    grado:'',
    distancia:'',
    zapato:'',
    pantalon:'',
    camisa:'',
    verificacionPaternal:'',
	opciones: [
      'Mini Carrera Atlética',
      'Vuelta a la Manzana',
      '4k'
      ],
     distancia_id:'',
     grado_id:''
    }
  },
  methods: {
        registro() {
          if(this.nombre.trim() === '' 
          	|| this.apellido.trim() === '' 
          	|| this.cedula.trim() === '' 
          	|| this.plantel.trim() === '' 
          	|| this.plantel.trim() === '' 
          	|| this.edad.trim() === '' 
          	|| this.sexo.trim() === '' 
          	|| this.direccion.trim() === '' 
          	|| this.grado.trim() === '' 
          	|| this.distancia.trim() === '' 
          	){
              alert('Debes completar todos los campos antes de registrarte');
              return;
	      }
	    switch (this.distancia) {
		  case 'Mini Carrera Atlética':
		    this.distancia_id = 1;
		    break;
		  case 'Vuelta a la Manzana':
		    this.distancia_id = 2;
		    break;
		  case '4k':
		  	this.distancia_id = 3;
		    break;
		  default:		  	
		  this.distancia_id = 3;
		    break;
		}
		switch (this.grado) {
		  case 'Inicial':
		    this.grado_id = 1;
		   break;
		   case '4to GRADO':
		    this.grado_id = 2;
		   break;
		   case '5to GRADO':
		    this.grado_id = 3;
		   break;
		   case '6to GRADO':
		    this.grado_id = 4;
		   break;
		   case '1er AÑO':
		    this.grado_id = 5;
		   break;
		   case '2do AÑO':
		    this.grado_id = 6;
		   break;
		   case '3er AÑO':
		    this.grado_id = 7;
		   break;
		   case '4to AÑO':
		    this.grado_id = 8;
		   break;
		   case '5to AÑO':
		    this.grado_id = 9;
		   break;
		   case '6to AÑO':
		    this.grado_id = 10;
		   break;
		  default:		  	
		  this.grado_id = 10;
		  break;
		}
	      // console.log(this.nota.nombre , this.nota.descripcion);
	      const params = {
	        nombre: this.nombre,
	        apellido: this.apellido,
	        cedula: this.cedula,
	        edad: this.edad,
	        sexo: this.sexo,
	        grado_id:this.grado_id,//no tengo el valor grado_id upppsss
	        direccion:this.direccion,
	        plantel:this.plantel,
	        distancia_id:this.distancia_id,//no tengo el valor direccion_id upppsss
	        zapato:this.zapato,
	        pantalon:this.zapato,
	        camisa:this.camisa
	      }
	      // console.log(params);
	      let url = `http://127.0.0.1:8000/api/registrar` 
	       axios.post(url,params)
	       .then(res => {
	         alert('registrado con exito');
	       })
        }
      },
  computed: {
        distanciaOpcion() {
            if(this.grado == 'Inicial'){
               var sugerencia = this.opciones[0];
              return sugerencia;
            }
            if(this.grado == '4to GRADO' ||this.grado == '5to GRADO' || this.grado == '6to GRADO'){
             var sugerencia = this.opciones[1];
              return sugerencia;
            }else{
              var sugerencia = this.opciones[2];
              return sugerencia;
            }
        }
    }
}
</script>

<style lang="css" scoped>
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.fondo {
    background: url(../.././logos/carrera03.png);
    background-position: top center;
    background-repeat:no-repeat;
  font-family: 'Nunito', sans-serif;
  color: #384047;
}
form {
  max-width: 600px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}
input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}
input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
header{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom:10em;
}
img {
    max-width: 100%;
}
.item {
    flex-basis: 13%;
    margin-right:20%;
}

.logo-img {
    margin-right: 15px;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}
</style>
