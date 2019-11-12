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
      <transition name="fade">
      <div v-if="recomendacion" class="verificar">
        <h3>Recomendamos la supervisión de tus padres antes de llenar el formulario.</h3>
        <img src="../.././logos/Corriendo00.png" width="100%">
        <button  @click="formulario = true; recomendacion = false;">OK</button>
      </div>
    </transition>
    <transition name="fade" v-if="formulario">
    	<form action="" name="formulario_envio" class="mensaje_form" method="post" @submit.prevent="registro">
   <h2>Registro de Carrera 4k</h2>
   <div>
       <div class="input_group">
            <label for="nombre" id="labelNombre" class="label">Nombre: <span v-if="nombreError != null" class="error">{{nombreError}}</span></label>
           <input type="text" name="nombre" id="nombre" placeholder="Introducir Nombre" :class="{' border-danger' : nombreError != null}"  v-model="nombre" minlength="3" maxlength="50" required>
       </div>
        <div class="input_group">
           <label for="apellido" id="labelApellido" class="label">Apellido:<span v-if="apellidoError != null" class="error">{{apellidoError}}</span> </label>
            <input type="text" name="apellido" id="apellido" placeholder="Introducir Apellido" class="input_form" :class="{' border-danger' : apellidoError != null}" v-model="apellido" minlength="3" maxlength="50" required>
         </div>
       <div class="input_group">
         <label for="cedula" id="labelCedula" class="label">Cédula ó Cédula estudiantil: <span v-if="cedulaError != null" class="error">{{cedulaError}}</span></label>
         <input type="text" name="cedula" id="cedula" placeholder="Introducir Cédula" :class="{' border-danger' : cedulaError != null}" v-model="cedula" minlength="6" maxlength="15" pattern="^([VEJPG]{1})([0-9]{7,9})$"required>
       </div>
       <div class="input_group">
         <label for="plantel" id="labelPlantel"class="label">Plantel: <span v-if="plantelError != null" class="error">{{plantelError}}</span></label>
            <select name="plantel" id="plantel" placeholder="Introducir Plantel" :class="{' border-danger' : plantelError != null}" v-model="plantel" minlength="3 " maxlength="100" required>
                <option v-for="item of plantelOpciones">{{item}}</option>
            </select>
       </div>
       <div class="input_group">
         <label for="edad" id="labelEdad"class="label">Edad:<span v-if="edadError != null" class="error">{{edadError}}</span> </label>
         <input type="number" name="edad" id="edad" placeholder="Introducir Edad" :class="{' border-danger' : edadError != null}" v-model="edad" minlength="1" maxlength="2" required>
       </div>
       <div class="input_group">
         <span v-if="sexoError != null" class="error">{{sexoError}}</span>
         <p>Masculino</p>
         <input type="radio" name="sexo" id="sexo" class="input_form" value="masculino" v-model="sexo">
         <p>Femenino</p>
         <input type="radio" name="sexo" id="sexo" class="input_form"value="femenino" v-model="sexo" required>
       </div>
       <div class="input_group">
           <label for="direccion" id="direccion"class="label">Dirección: <span v-if="direccionError != null" class="error">{{direccionError}}</span></label>
           <textarea for="" name="direccion" placeholder="Introducir Dirección" :class="{' border-danger' : direccionError != null}"  v-model="direccion" minlength="3" maxlength="150" required></textarea>
        </div>
        <div class="input_group">
              <label for="grado" id="grado"class="label">Grado: <span v-if="gradoError != null" class="error">{{gradoError}}</span></label>
              <select name="grado" v-model="grado" placeholder="introducir su grado" :class="{' border-danger' : gradoError != null}" required>
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
              <label  for="distancia"  class="label">Distancia:<span v-if="distanciaError != null" class="error">{{distanciaError}}</span></label>
             <select name="distancia" placeholder="introducir su distancia" :class="{' border-danger' : distanciaError != null}" v-model="distanciaCampo" required>
                <option>{{distanciaOpcion}}</option>
              </select>
                <!--<option>{{validacionDistancia}}</option>-->
        </div>
        <div v-if="grado == 'Inicial'">
              <label  for="tallaZapato"  class="label">Talla de Zapatos:</label>
              <input type="number" name="tallaZapato" id="tallaZapato" class="input_form" v-model="zapato" maxlength="20" pattern="[0-40]{8}" required>
              <label  for="tallaPantalon"  class="label">Talla de Pantalón:</label>
              <input type="number" name="tallaPantalon" id="tallaPantalon" class="input_form" v-model="pantalon" maxlength="20" pattern="[0-40]{8}" required>
              <label  for="tallaCamisa"  class="label">Talla de Camisa:</label>
              <input type="number" name="tallaCamisa" id="tallaCamisa" class="input_form" v-model="camisa" maxlength="20" pattern="[0-40]{8}" require>
          </div>
          <div class="checkbox">
              <input type="checkbox" name="autorizacion" id="autorizacion" class="input_form" v-model="verificacionPaternal" required>
              <label  for="tallaZapato"  class="label">Confirmo que estoy bajo la autorización de mis padres</label>
          </div>
       <button id="mensaje_btn" type="submit" value="registrar">Registrar</button>
     </div>
  </form>
  </transition>
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
    plantelOpciones:'',
    edad:'',
    sexo:'',
    direccion:'',
    grado:'',
    distancia:'',
    zapato:'',
    pantalon:'',
    camisa:'',
    recomendacion:true,
    formulario:false,
    verificacionPaternal:'',
	opciones: [
      'Mini Carrera Atlética',
      'Vuelta a la Manzana',
      'Copa Bruno Carrasquel 4k'
      ],
     distancia_id:'',
     grado_id:'',
     errorNombreActivar:'',
      errorApellidoActivar:'',
      errorCedulaActivar:'',
      errorPlantelActivar:'',
      errorEdadActivar:'',
      errorSexoActivar:'',
      errorDireccionActivar:'',
      errorGradoActivar:'',
      errorDireccionActivar:'',
      errorGradoActivar:'',
      errorDistanciaActivar:''
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
		  case 'Copa Bruno Carrasquel 4k':
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
        },
    nombreError(){
          var val = this.nombre.trim();
          if(val == ''){
            return null
          }
          if(val.length  < 3){
            return 'por favor introduce un nombre más largo'
          }
          if(val.length  > 50){
            return 'has excedido la cantidad de caracteres'
          }
          return null;
        },
        apellidoError(){
          var val = this.apellido.trim();
          if(val == ''){
            return null
          }
          if(val.length  < 3){
            return 'por favor introduce un apellido más largo'
          }
          if(val.length  > 50){
            return 'has excedido la cantidad de caracteres'
          }
            return null;
        },
        cedulaError(){
          var val = this.cedula.trim();
          if(val == ''){
            return null
          }
          if(val == 1){
            return null
          }
          if(val.length  < 6 && this.cedula == null){
            return 'por favor introduce una cédula más larga'
          }
          if(val.length  > 15){
            return 'has excedido la cantidad de caracteres'
          }
        },
        plantelError(){
          var val = this.plantel.trim();
          if(val == ''){
            return null
          }
          if(val.length  < 3){
            return 'por favor introduzca un plantel más largo'
          }
          if(val.length  > 100){
            return 'has excedido la cantidad de caracteres'
          }
        },
        edadError(){
          if(this.edad < 3 && this.edad == null){
          return 'no puedes ser menor a tres años'
          }
          if(this.edad < 2 && this.edad == null){
          return 'no puedes ser menor a dos años'
          }
          if(this.edad < 1 && this.edad == null){
          return 'no puedes ser menor a un años'
          }
          if(this.edad < 0 && this.edad == null){
          return 'no puedes no haber nacido'
          }
          if(this.edad > 21){
          return 'no puedes ser mayor a veinte años'
          }
          var val = this.edad.trim();
          if(val == ''){
            return null
          }
        },
        sexoError(){
          var val = this.sexo.trim();
          if(val == ''){
            return null
          }
        },
        direccionError(){
          var val = this.direccion.trim();
          if(val == ''){
            return null
          }
          if(val.length  < 3){
            return 'por favor introdusca una dirección más larga'
          }
          if(val.length  > 150){
            return 'has excedido la cantidad de caracteres'
          }
        },
        gradoError(){
          var val = this.grado.trim();
          if(val == ''){
            return null
          }
        },
        distanciaError(){
          var val = this.distancia.trim();
          if(val == ''){
          return null
          }
        },
        representanteError(){
          if(this.representante === false){
            return'debe estar bajo la supervisión de su representante';
        }
        },
    created(){
      let url = `http://127.0.0.1:8000/api/planteles`
         axios.get(url)
         .then(res => {
           this.plantelOpciones = res.data
         })
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
.error{
  color:red;
}
.border-danger{
  border-color:red;
}
.fade-enter-active, .fade-leave-active {
  transition: .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}
.verificar{
   max-width: 500px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
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
.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}
.header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom:10em;
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
