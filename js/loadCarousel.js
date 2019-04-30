jQuery( document ).ready(function(){
//   var oCat = document.getElementById("categorias-youneed");
//   if(oCat !== undefined){
//       jQuery('#categorias-youneed').owlCarousel({
//             loop:false,
//             margin:10,
//             nav:false,
//             items:8,
//             responsive:{
//                 0:{
//                     items:2
//                 },
//                 600:{
//                     items:3
//                 },
//                 1000:{
//                     items:8
//                 }
//             }
//         })
//   }
   
//   var oSrv = document.getElementById("servicios-youneed");
//   if(oSrv !== undefined){
//       jQuery('#servicios-youneed').owlCarousel({
//             loop:false,
//             margin:10,
//             nav:true,
//             items:8,
//             responsive:{
//                 0:{
//                     items:2
//                 },
//                 600:{
//                     items:3
//                 },
//                 1000:{
//                     items:8
//                 }
//             }
//         })
//   }

      var swiper = new Swiper('#categorias-youneed', {
      slidesPerView: 6,
      slidesPerColumn: 2,
      spaceBetween: 35,
      lazy: true,
    //   pagination: {
    //     el: '.swiper-pagination',
    //     type: 'fraction',
    //   },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
    
    jQuery(".swiper-wrapper").removeClass("hidden");
    jQuery(".swiper-lazy-preloader").hide();
});