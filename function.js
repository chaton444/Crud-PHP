var inter=10000;
var carrusel= document.querySelector('.carrusel');
var imagenes= carrusel.querySelectorAll('img');
var index=0;

function cambiar(){
  imagenes[index].style.transform='translateX(-100%)';
  index=(index+1)%imagenes.length;
  imagenes[index].style.transform='translateX(0)';
}

cambiar();
setInterval(cambiar,index);