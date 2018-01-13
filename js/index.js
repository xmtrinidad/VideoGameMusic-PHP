const menuBtn = document.querySelector('.Nav__menu');
const mobileList = document.querySelector('.Nav__mobile-list');

menuBtn.addEventListener('click', function(){
    $(mobileList).toggleClass('Nav__mobile-list--active');
});