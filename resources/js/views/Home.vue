<template>
    <div class="body">
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
      <div v-if="registroExitoso" class="verificar">
        <h3>Registrado exitosamente</h3>
        <img src="../.././logos/trofeo.jpg" width="100%">
        <button  @click="formulario = false; recomendacion = true;">OK</button>
      </div>
    </transition>
      <transition name="fade">
      <div v-if="recomendacion" class="verificar">
        <h3>Recomendamos la supervisión de tus padres antes de llenar el formulario.</h3>
        <img src="../.././logos/jovenes-corriendo.jpg" width="100%">
        <button  @click="formulario = true; recomendacion = false;">OK</button>
      </div>
    </transition>
    <transition name="fade" v-if="formulario">
      <form action="" name="formulario_envio" class="mensaje_form" method="post" @submit.prevent="validar" id="formulario_envio" v-if="formulario">
   <h2>Registro de Carrera Atlética</h2>
   <div>
       <div class="input_group">
            <label for="nombre" id="labelNombre" class="label">Nombre: <span v-if="errorNombre" class="red--text">{{requerimientosNombre}}</span></label>
           <input type="text" name="nombre" id="nombre" placeholder="Introducir Nombre" :class="{' border-danger' : errorNombre}" v-model="nombre" @blur="validarNombre">
       </div>
       <div class="input_group">
           <label for="apellido" id="labelApellido" class="label">Apellido:<span v-if="errorApellido" class="red--text">{{requerimientosApellido}}</span> </label>
            <input type="text" name="apellido" id="apellido" placeholder="Introducir Apellido" class="input_form" :class="{' border-danger' : errorApellido}" v-model="apellido" @blur="validarApellido">
         </div>
         <div class="input_group">
           <label for="cedula" id="labelCedula" class="label">Cédula ó Cédula estudiantil: <span v-if="errorCedula" class="red--text">{{requerimientosCedula}}</span></label>
           <input type="text" name="cedula" id="cedula" placeholder="Introducir Cédula" :class="{' border-danger' : errorCedula}" v-model="cedula" @blur="validarCedula">
        </div>
        <div class="input_group">
         <label for="plantel" id="labelPlantel"class="label">Plantel: <span v-if="errorPlantel" class="red--text">{{requerimientosPlantel}}</span></label>

            <select name="plantel" id="plantel" placeholder="Introducir Plantel" :class="{' border-danger' : errorPlantel}" v-model="plantel" @blur="validarPlantel">

              <option v-for="item of plantelOpciones">{{item}}</option>
            </select>
        </div>
        <div class="input_group">
         <label for="edad" id="labelEdad"class="label">Edad:<span v-if="errorEdad" class="red--text">{{requerimientosEdad}}</span> </label>
         <input type="number" name="edad" id="edad" placeholder="Introducir Edad" :class="{' border-danger' : errorEdad}" v-model="edad" @blur="validarEdad">
       </div>
       <div class="input_group">
         <span v-if="errorSexo" class="red--text">{{requerimientosSexo}}</span>
         <p>Masculino</p>
         <input type="radio" name="sexo" id="sexo" class="input_form" value="masculino" :class="{' border-danger' : errorSexo}" v-model="sexo">
         <p>Femenino</p>
         <input type="radio" name="sexo" id="sexo" class="input_form"value="femenino" :class="{' border-danger' : errorSexo}" v-model="sexo">
       </div>
       <div class="input_group">
           <label for="direccion" id="direccion"class="label">Dirección: <span v-if="errorDireccion" class="red--text">{{requerimientosDireccion}}</span></label>
           <textarea for="" name="direccion" placeholder="Introducir Dirección" :class="{' border-danger' : errorDireccion}"  v-model="direccion" @blur="validarDireccion"></textarea>
        </div>
        <div class="input_group">
              <label for="grado" id="grado"class="label">Grado: <span v-if="errorGrado" class="red--text">{{requerimientosGrado}}</span></label>
              <select name="grado" v-model="grado" placeholder="introducir su grado" :class="{' border-danger' : errorGrado}" @blur="validarGrado">
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
              <label  for="distancia"  class="label">Distancia:<span v-if="errorDistancia" class="red--text">{{requerimientosDistancia}}</span></label>
             <select name="distancia" placeholder="introducir su distancia" :class="{' border-danger' : errorDistancia}" v-model="distancia" @blur="validarDistancia">
                <option>{{distanciaOpcion}}</option>
              </select>
        </div>
        <div v-if="grado == 'Inicial'">
              <label  for="tallaZapato" class="label">Talla de Zapatos:<span if="errorTallaZapato" class="red--text">{{requerimientosTallaZapato}}</span></label>
              <input type="number" name="tallaZapato" id="tallaZapato" :class="{' border-danger' : errorTallaZapato}" v-model="zapato" @blur="validarTallaZapato">
              <label  for="tallaPantalon"  class="label">Talla de Pantalón:<span if="errorTallaPantalon" class="red--text">{{requerimientosTallaPantalon}}</span></label>
              <input type="number" name="tallaPantalon" id="tallaPantalon" :class="{' border-danger' : errorTallaPantalon}" v-model="pantalon" @blur="validarTallaPantalon">
              <label  for="tallaCamisa"  class="label">Talla de Camisa:<span if="errorTallaCamisa" class="red--text">{{requerimientosTallaCamisa}}</span></label>
              <input type="number" name="tallaCamisa" id="tallaCamisa" :class="{' border-danger' : errorTallaCamisa}" v-model="camisa" @blur="validarTallaCamisa">
          </div>
          <div class="checkbox">
              <input type="checkbox" name="autorizacion" id="autorizacion" :class="{' border-danger' : errorRepresentante}" v-model="representante">
              <label  class="label">Confirmo que estoy bajo la autorización de mis padres<span v-if="errorRepresentante" class="red--text"><br>{{requerimientosRepresentante}}</span></label>
          </div>
       <button type="submit" name="registrar" id="mensaje_btn" value="registrar" @click="permisoRegistro=true">Registrar</button>
     </div>
  </form>
  </transition>
    <footer class="pie">
      <div class="contenedor">
        <div class="redes">
            <p class="parrafo-s">Siguenos En Nuestras Redes Sociales</p>
            <div class="iconos">
              <a href="http://www.twitter.com/fundabitguaric2" target="_blank" class="mr">
                <i class="fab fa-twitter-square icono-m"></i>
              </a>

              <a href="http://www.facebook.com/fundabit.guarico.75" target="_blank" class="mr">
                <i class="fab fa-facebook-square icono-m"></i>
              </a>

              <a href="http://www.instagram.com/fundabitguarico" target="_blank">
                <i class="fab fa-instagram icono-m"></i>
              </a>



            </div>
        </div>

        <div style="somosfb">
            <a href="https://twitter.com/hashtag/somosfundabit" target="_blank">
          <img src="images/somos-fundabit-blanco.png" alt="Fundabit" class="img-fo">
            </a>
        </div>
      </div>
       <p class="parrafo-center">Desarrollado Por Gabriel Viloria <br> Fundabit 2019</p>
    </footer>
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
    representante:'',
	opciones: [
      'Mini Carrera Atlética',
      'Vuelta a la Manzana',
      'Copa Bruno Carrasquel 4k'
      ],
     distancia_id:'',
     grado_id:'',
     formulario:false,
      errorNombre:null,
      errorApellido:null,
      errorCedula:null,
      errorLetras:null,
      errorPlantel:null,
      errorEdad:null,
      errorSexo:null,
      errorDireccion:null,
      errorGrado:null,
      errorDistancia:null,
      errorTallaZapato:null,
      errorTallaPantalon:null,
      errorTallaCamisa:null,
      errorRepresentante:null,
      permisoRegistro:true,
      registroExitoso:false
    }
  },
  methods: {
        validar(){
            if(this.nombre.trim() == ''){
            this.validarNombre();
            this.permisoRegistro=false;
            }if(this.nombre.length < 3){
            this.validarNombre();
            this.permisoRegistro=false;
            }if(this.nombre.length > 50){
            this.validarNombre();
            this.permisoRegistro=false;
            }if(this.apellido.trim() == ''){
            this.validarApellido();
            this.permisoRegistro=false;
            }if(this.apellido.length < 3){
            this.validarApellido();
            this.permisoRegistro=false;
            }if(this.apellido.length > 50){
            this.validarApellido();
            this.permisoRegistro=false;
            }if(this.cedula.trim() == ''){
            this.validarCedula();
            this.permisoRegistro=false;
            }if(this.cedula.length  > 18){
            this.validarCedula();
            this.permisoRegistro=false;
            }if(this.cedula.length  < 7){
            this.validarCedula();
            this.permisoRegistro=false;
            }if(this.plantel.trim() == ''){
            this.validarPlantel();
            this.permisoRegistro=false;
            }if(this.edad <= 4){
            this.validarEdad();
            this.permisoRegistro=false;
            }if(this.edad > 22){
            this.validarEdad();
            this.permisoRegistro=false;
            }if(this.sexo.trim() == ''){
            this.validarSexo();
            this.permisoRegistro=false;
            }if(this.direccion.length < 3){
            this.validarDireccion();
            this.permisoRegistro=false;
            }if(this.direccion.length > 150){
            this.validarDireccion();
            this.permisoRegistro=false;
            }if(this.grado.trim() == ''){
            this.validarGrado();
            this.permisoRegistro=false;
            }if(this.distancia.trim() == ''){
            this.validarDistancia();
            this.permisoRegistro=false;
            }if(this.zapato < 20 && this.grado.trim() == 'Inicial'){
            this.validarTallaZapato();
            this.permisoRegistro=false;
            }if(this.zapato > 46 && this.grado.trim() == 'Inicial'){
            this.validarTallaZapato();
            this.permisoRegistro=false;
            }if(this.pantalon < 3 && this.grado.trim() == 'Inicial'){
            this.validarTallaPantalon();
            this.permisoRegistro=false;
            }if(this.pantalon > 40 && this.grado.trim() == 'Inicial'){
            this.validarTallaPantalon();
            this.permisoRegistro=false;
            }if(this.camisa < 3 && this.grado.trim() == 'Inicial'){
            this.validarTallaCamisa();
            this.permisoRegistro=false;
            }if(this.camisa > 40 && this.grado.trim() == 'Inicial'){
            this.validarTallaCamisa();
            this.permisoRegistro=false;
            }if(!this.representante){
            this.validarRepresentante();
            this.permisoRegistro=false;
            }if(this.cedula.split('')){
              var letrasCedula = this.cedula.split('');
              var numero = " / - V 0 1 2 3 4 5 6 7 8 9";
              var i;
              for(i in letrasCedula){
                 if (numero.indexOf(letrasCedula[i]) == -1){
                  this.errorLetras=true;
                  this.errorCedula=true;
                  this.permisoRegistro=false;
                 }else{
                  this.errorLetras=null;
                  this.errorCedula=null;
                 }
              }
          }
          if(this.permisoRegistro){
          this.registro();
          }else{
          alert('error al registrar');
          }
      },
        registro() {
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
	        pantalon:this.pantalon,
	        camisa:this.camisa
	      }
	      // console.log(params);
	      let url = `http://127.0.0.1:8000/api/registrar`
	       axios.post(url,params)
	       .then(res => {
	         this.registroExitoso=true;
           this.formulario=false;
	       })

        },
    validarNombre(){
          var val = this.nombre.trim();
          if(val == ''){
          this.errorNombre=true;
          }else if(val.length  < 3){
            this.errorNombre=true;
          }else if(val.length  > 50){
            this.errorNombre=true;
          }else{
            this.errorNombre=false;
          }
        },//errorApellido
        validarApellido(){
          var val = this.apellido.trim();
          if(val == ''){
          this.errorApellido=true;
          }else if(val.length  < 3){
            this.errorApellido=true;
          }else if(val.length  > 50){
            this.errorApellido=true;
          }else{
            this.errorApellido=false;
          }
        },
        validarCedula(){
          var val = this.cedula.trim();
          this.errorLetras=null;
          this.errorCedula=null;
          if(val == ''){
          this.errorCedula=true;
          }else if(val.length  < 7){
          this.errorCedula=true;
          }else if(val.length  > 18){
          this.errorCedula=true;
          }else if(this.cedula.split('')){
            var letrasCedula = this.cedula.split('');
            var numero = "/ - V 0 1 2 3 4 5 6 7 8 9";
            var i;
            for(i in letrasCedula){
               if (numero.indexOf(letrasCedula[i]) == -1){
                this.errorLetras=true;
                this.errorCedula=true;
                return;
               }else{
                this.errorLetras=null;
                this.errorCedula=null;
               }
            }
          } else{
            this.errorCedula=false;
          }
        },
        validarPlantel(){
          var val = this.plantel.trim();
          if(val == ''){
          this.errorPlantel=true;
          }else{
            this.errorPlantel=false;
          }
        },
        validarEdad(){//return 'no puedes ser menor a tres años'
          if(this.edad <= 4){
          this.errorEdad=true
          }else if(this.edad > 22){
            this.errorEdad=true
          }else{
            this.errorEdad=false
          }
        },
        validarSexo(){
          if(this.sexo.trim() == ''){
          this.errorSexo=true
          }else{
          this.errorSexo=false
          }
        },
        validarDireccion(){
          if(this.direccion.length < 3){
          this.errorDireccion=true
          }else if(this.direccion.length > 50){
          this.errorDireccion=true
          }else{
          this.errorDireccion=false
          }
        },
        validarGrado(){
          var val = this.grado.trim();
          if(val == ''){
          this.errorGrado=true;
          }else{
            this.errorGrado=false;
          }
        },
        validarDistancia(){
          var val = this.distancia.trim();
          if(val == ''){
          this.errorDistancia=true;
          }else{
            this.errorDistancia =false;
          }
        },
        validarTallaZapato(){
          if(this.zapato < 20){
          this.errorTallaZapato=true
          }else if(this.zapato > 46){
            this.errorTallaZapato=true
          }else{
            this.errorTallaZapato=false
          }
        },
        validarTallaPantalon(){
          if(this.pantalon < 3){
          this.errorTallaPantalon=true
          }else if(this.pantalon > 40){
            this.errorTallaPantalon=true
          }else{
            this.errorTallaPantalon=false
          }
        },
        validarTallaCamisa(){
          if(this.camisa < 3){
          this.errorTallaCamisa=true
          }else if(this.camisa > 40){
            this.errorTallaCamisa=true
          }else{
            this.errorTallaCamisa=false
          }
        },
        validarRepresentante(){
          if(!this.representante){
          this.errorRepresentante=true;
          }else{
          this.errorRepresentante=false;
          }
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
        requerimientosNombre(){
          var val = this.nombre.trim();
          if(val == ''){
          return "por favor introduzca su nombre";
          }else if(val.length  < 3){
          return "por favor introduzca un nombre de al menos tres letras";
          }else if(val.length  > 50){
          return "por favor introduzca un nombre menor a cincuenta letras";
          }else{
            return null;
          }
        },
        requerimientosApellido(){
          var val = this.apellido.trim();
          if(val == ''){
          return "por favor introduzca su apellido";
          }else if(val.length  < 3){
          return "por favor introduzca un apellido de al menos tres letras";
          }else if(val.length  > 150){
          return "por favor introduzca un apellido menor a cincuenta letras";
          }else{
            return null;
          }
        },
        requerimientosCedula(){
          var val = this.cedula.trim();
          if(val == ''){
          return "por favor introduzca su cedula";
          }else if(val.length  > 18){
          return "por favor introduzca una cedula más corta cedula";
          }else if(this.errorLetras){
          return "por favor introduzca el formato correcto";
          }else if(val.length  < 7){
          return "su cedula es muy corta";
          }else{
            return null;
          }
        },
        requerimientosPlantel(){
          var val = this.plantel.trim();
          if(val == ''){
          return "por favor elija su plantel";
          }else{
            return null;
          }
        },
        requerimientosEdad(){
          if(this.edad == 0){
            return 'por favor introdusca su edad';
          }else if(this.edad <= 4){
            return 'no puedes ser menor a cuatro años';
          }else if(this.edad >22){
            return 'no puedes ser mayor de Veintidós años';
          }else{
            return null;
          }
        },
        requerimientosSexo(){
          var val = this.sexo.trim();
          if(val == ''){
          return "por favor seleccione su tipo de sexo";
          }else{
            return null;
          }
        },
        requerimientosDireccion(){
          if(this.direccion.length == 0){
            return 'por favor introdusca su dirección';
          }else if(this.direccion.length < 3){
            return 'por favor introdusca una dirección más larga';
          }else if(this.direccion.length > 150){
            return 'por favor introdusca una dirección más corta';
          }else{
            return null;
          }
        },
        requerimientosGrado(){
          var val = this.grado.trim();
          if(val == ''){
          return "por favor elija su grado";
          }else{
            return null;
          }
        },
        requerimientosTallaZapato(){
          if(this.zapato == 0){
            return 'por favor introdusca su talla de zapato';
          }else if(this.zapato <20){
            return 'su talla no puede ser menor a veinte';
          }else if(this.zapato >46){
            return 'su talla no puede ser mayor a cuarentiseis';
          }else{
            return null;
          }
        },
        requerimientosTallaPantalon(){
          if(this.pantalon == 0){
            return 'por favor introdusca su talla de pantalon';
          }else if(this.pantalon <3){
            return 'su talla no puede ser menor a tres';
          }else if(this.pantalon >40){
            return 'su talla no puede ser mayor a cuarenta';
          }else{
            return null;
          }
        },
        requerimientosTallaCamisa(){
          if(this.pantalon == 0){
            return 'por favor introdusca su talla de camisa';
          }else if(this.pantalon < 3){
            return 'su talla no puede ser menor a tres';
          }else if(this.pantalon >40){
            return 'su talla no puede ser mayor a cuarenta';
          }else{
            return null;
          }
        },
        requerimientosRepresentante(){
          if(!this.representante){
          return 'campo obligatorio';
          }else{
          return null;
          }
        },
        requerimientosDistancia(){
          var val = this.distancia.trim();
          if(val == ''){
          return "por favor elija su distancia a recorrer";
          }else{
            return null;
          }
        },
      },
    created(){
      let url = `http://127.0.0.1:8000/api/planteles`
         axios.get(url)
         .then(res => {
           this.plantelOpciones = res.data
         })
    }
  }
</script>

<style lang="css" scoped>
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.body {
        background: url("../.././logos/zapatosng.png")no-repeat,
                    url("../.././logos/pan.jpg") repeat;
        font-family: 'Nunito', sans-serif;
        color: #384047;
        width: 100%;
        background-size: contain;
        margin: 0;
        height: 1000;
}.border-danger{
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
    background: url(../.././logos/zapatosng.png);
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
/*footer*/
.pie {
  background-color: #FF4A00;
  margin: 20px 0 0 0;
  color: #fff;
}
.icono-m {
    font-size: 30px;
    margin-right: 16px;
}

.icono-m:last-of-type {
    margin: 0;
}
.mr {
    margin-right: 12px;
}

.parrafo-center {
    text-align: center;
    margin: 0;
    margin-top: 20px;
    padding: 16px;
    background-color: rgba(0,0,0,.2);
}
.parrafo-s {
    font-size: 13px;
    text-transform: capitalize;
}
.contenedor {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.img-fo {
  height: 75px;
}
.fundabit {
    font-size: 16px;
}
@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}
</style>
