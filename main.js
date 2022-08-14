let navbar = document.querySelector('.navbar');
let bars = document.querySelector('.bars');
let croix = document.querySelector('.croix');
let search = document.querySelector('.recherche');

bars.addEventListener('click', function () {
    navbar.classList.add('ouvrir')
    bars.classList.add('ouvrir')
    croix.classList.add('ouvrir')
    search.classList.add('ouvrir')

    navbar.classList.remove('fermer')
    bars.classList.remove('fermer')
    croix.classList.remove('fermer')
    search.classList.remove('fermer')
});
croix.addEventListener('click', function () {
    navbar.classList.add('fermer')
    bars.classList.add('fermer')
    croix.classList.add('fermer')
    search.classList.add('fermer')

    navbar.classList.remove('ouvrir')
    bars.classList.remove('ouvrir')
    croix.classList.remove('ouvrir')
    search.classList.remove('ouvrir')
});
