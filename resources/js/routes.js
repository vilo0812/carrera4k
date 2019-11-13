//importamos las vistas del Home
import Home from './views/Home.vue';
import Descargas from './views/Descargas.vue';

export const routes = [
  /*
   |--------------------------------------------------------------------------
   | Home front end rutas
   |--------------------------------------------------------------------------|
   */
  {
    path:'/',
    component:Home,
    name:'Home'
  },
  {
    path:'/descargas',
    component:Descargas,
    name:'descargas'
  }
]
