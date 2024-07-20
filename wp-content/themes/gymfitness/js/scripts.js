function gym_wordpress() {

    /* swiper js */
    if (document.querySelector('.swiper')) {
        const opciones = {
            loop: true,
            autoplay: {
                delay: 3000
            }
        }
        new Swiper('.swiper', opciones)
    }

    /* hamburguer menu */
    const hamburguer = document.querySelector('.hamburguer-menu svg');
    hamburguer.addEventListener('click', function(){
        const menuPrincipal = document.querySelector('.contenedor-menu');
        menuPrincipal.classList.toggle('mostrar');
    })

}
document.addEventListener('DOMContentLoaded', gym_wordpress);

window.onscroll = function () {
    const scroll = window.scrollY;

    const navbar = document.querySelector('.barra-navegacion');

    if(scroll > 300) {
        navbar.classList.add('fixed-top');
    } else {
        navbar.classList.remove('fixed-top');
    }
}