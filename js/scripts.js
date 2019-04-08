
const icona = document.getElementById("header-container__icon");
const menu = document.querySelector(".header-container__sidemenu");
const dashone = document.querySelector("#dashone");
const dashtwo = document.querySelector("#dashtwo");
const dashthree = document.querySelector("#dashthree");
const down = document.querySelector(".header-container__down");



//hamburger
 icona.addEventListener("click",  (e)=>{
 menu.classList.toggle('menu-open');
 dashone.classList.toggle('dashone-open');
 dashtwo.classList.toggle('dashtwo-open');
 dashthree.classList.toggle('dashthree-open');
});
var swiper = new Swiper('.swiper-container', {
	effect: 'coverflow',
	grabCursor: true,
	centeredSlides: true,
	slidesPerView: 'auto',
	coverflowEffect: {
		rotate: 50,
		stretch: 0,
		depth: 100,
		modifier: 1,
		slideShadows : true,
	},
	pagination: {
		el: '.swiper-pagination',
	},
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
});
//scroll down function
down.addEventListener("click", (e)=>{
	document.querySelector('.content').scrollIntoView({
  behavior: 'smooth'
});
});
