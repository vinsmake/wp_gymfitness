function gym_wordpress() {

    /* swiper js */
    if(document.querySelector('.swiper')) {
        const opciones = {
            loop: true,
            autoplay: {
                delay: 3000
            }
        }
        new Swiper('.swiper', opciones)
    }

}
document.addEventListener('DOMContentLoaded', gym_wordpress)