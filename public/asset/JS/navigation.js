let navigation = {
    menuOpen: false,
    init: function () {
        const nav = document.querySelector("nav");
        const overlay = document.querySelector('#overlay');
        nav.style.opacity = 0
        overlay.style.opacity = 0


        const button = document.querySelector('.button-nav');
        button.addEventListener('click',navigation.HandleClickMenu);
    },
    HandleClickMenu: function (){
        if (navigation.menuOpen === false){
            const logo = document.querySelector("#button-navigation");
            const nav = document.querySelector("nav");
            const overlay = document.querySelector('#overlay');
            logo.className = "fa-solid fa-xmark";
            nav.classList.remove('hidden');
            navigation.menuOpen = true;
            overlay.style.display = 'block';
            setTimeout(function() {
                // Deuxième action
                nav.style.opacity = 1;
                overlay.style.opacity = 1
            }, 300);

        }
        else if (navigation.menuOpen === true){
            const logo = document.querySelector("#button-navigation");
            const nav = document.querySelector("nav");
            const overlay = document.querySelector('#overlay');
            logo.className = "fa-solid fa-bars";

            navigation.menuOpen = false;
            nav.style.opacity = 0;
            overlay.style.opacity = 0
            setTimeout(function() {
                nav.classList.add('hidden');
                overlay.style.display = 'none';
            }, 300);


        }
    }
};