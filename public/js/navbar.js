document.addEventListener('DOMContentLoaded', function(){
    const nametitle = document.querySelector('.name');
    const hamburger = document.querySelector('.hamburger-icon');
    const menu = document.querySelector('.nav-links');
    const name = document.querySelector('.name');
    nametitle.addEventListener('click', ()=> {
        window.location.href = '/';
    })
    hamburger.addEventListener('click', () => {
       menu.classList.toggle('nav-link-res');
       name.classList.toggle('name-hide');
    })
  
})