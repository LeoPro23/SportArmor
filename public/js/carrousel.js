document.addEventListener("DOMContentLoaded",function(){
    var swiper1 = new Swiper(".mySwiper1",{
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            depth:500,
            modifier:2,
            slideShadows:false,
            rotate:0,
            stretch:0
        }
    });
    
    var swiper2 = new Swiper(".mySwiper2",{
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            depth:500,
            modifier:2,
            slideShadows:false,
            rotate:0,
            stretch:0
        }
    });
});

//carrusel