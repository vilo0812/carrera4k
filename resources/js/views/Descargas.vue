<template>
  <div class="body">
    <div class="padre-f">
        <div class="hijo fila">
            <a class="btnDescarga" href="/descargar">Descargar Todos Los Participantes</a>
            <a class="btnDescarga" href="/descargarMCA">Mini Carrera Atlética</a>
            <a class="btnDescarga" href="/descargarVM">Vuelta a la Manzana</a>
            <a class="btnDescarga" href="/descargar4K">Copa Bruno Carrasquel 4k</a>
        </div>
        <div class="hijo">
            <form action="/descargaP" name="formulario_envio" class="mensaje_form" method="get">
               <h2>Descarga Personalizada</h2>
               <div>

                   <div class="input_group">
                     <label for="plantel" id="labelPlantel"class="label">Plantel: </label>
                        <select name="plantel" id="plantel" placeholder="Introducir Plantel" :class="{' border-danger' : plantelError != null}" v-model="plantel" minlength="3 " maxlength="100" required>
                            <option v-for="item of plantelOpciones">{{item}}</option>
                        </select>
                   </div>
                    <div class="input_group">
                          <label  for="distancia"  class="label">Distancia:</label>
                         <select name="distancia" placeholder="introducir su distancia" required>
                            <option>Mini Carrera Atletica</option>
                            <option>Vuelta a la Manzana</option>
                            <option>Copa Bruno Carrasquel 4k</option>
                          </select>
                    </div>
                   <button class="btnDescarga" name="descargar" id="mensaje_btn" type="submit" value="Descargar">Descargar</button>
                 </div>
              </form>
        </div>
    </div>
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

  name: 'Descargas',

  data () {
    return {
      opciones: [
      'Mini Carrera Atlética',
      'Vuelta a la Manzana',
      'Copa Bruno Carrasquel 4k'
      ],
      plantelOpciones:'',
      plantel:'',
      distancia:'',
      distancia_id:''

    }
  },
  method:{
    descargar() {
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
    const params = {
          distancia_id:this.distancia_id,
          plantel:this.plantel
        }
    let url = `http://127.0.0.1:8000/api/descargaPersonal`
         axios.post(url,params)
         .then(res => {
           alert('exito');
         })
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
</script>
<style type="text/css">
.body {
      margin: 0;
        background: url("../.././logos/manzana.png")center center/ contain no-repeat,
                    url("../.././logos/pan.jpg") center center/ cover no-repeat;
                    height: 1200;
}
* {
    box-sizing: border-box;
}
.fondo {
    background: url(../.././logos/zapatosng.png);
    background-position: top center;
    background-repeat:no-repeat;
  font-family: 'Nunito', sans-serif;
  color: #384047;
  height: 2000px;
}

form {

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

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
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

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.padre-f {
    display: flex;
    flex-wrap: wrap-reverse;
    justify-content: space-between;
    padding: 100px;
}

.hijo {
      max-width: 300px;
      padding: 10px 20px;
      background: #f4f7f8;
      border-radius: 8px;
      margin-top: 20px;
}

.hijo .btnDescarga {
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
      display: block;
      text-decoration: none;
      font-size: 15px;
}

.fila {
    display: flex;
    justify-content: center;
    flex-direction: column;
}
/*footer*/
footer{
  margin-top: 200px;
}
.pie {
  background-color: #FF4A00;
  margin: 50px 0 0 0;
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

</style>