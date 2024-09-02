<?php get_header(); ?>

<div class="flex w-full m-8 justify-center items-center">
        <div>
            <div class="flex w-full justify-center items-center">
                <div class="m-8">
                    <img class="h-24" src="./assets/images/logo.png" alt="">
                    <div class="m-3">
                        <h2 class="text-white text-4xl uppercase font-light">Mairie test</h2>
                        <p class="text-base text-white mt-1">Consulter l'affichage legal, les liens utiles, l'agenda de votre commune, </p>
                    </div>
                </div>
                <div class="text-white text-3xl">
                    <div class="flex items-center justify-center">
                        <a href="./accueil.html" id="ripple-button" class="relative flex items-center justify-center w-[25rem] h-[25rem] text-gray-700 bg-gray-100 rounded-full shadow-lg focus:outline-none">
                            <img class="h-14" src="./assets/images/icons/cursor-finger.png" alt="">
                                Toucher l'écran
                            <span class="absolute w-full h-full rounded-full border-[2rem] border-gray-100 animate-ripple"></span>
                            <span class="absolute w-full h-full rounded-full border-[1.7rem] border-gray-300 animate-ripple"></span>
                        </a> 
                    </div>
                </div>    
            </div>        
        </div>
    </div>
<?php get_footer(); ?>
