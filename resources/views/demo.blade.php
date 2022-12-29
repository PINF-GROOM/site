<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="s   tylesheet"> -->

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- <body onload="initUtils(); initAssets();" class="antialiased"> -->

<body class="antialiased">

    <header>
        <a href="index.html"><img src="{{ Vite::asset('resources/assets/logo/long-name.svg') }}" alt="Logo Vincent Masseron"></a>
        <div>
            <nav>
                <a href="index.html">Contact</a>
                <!-- En fonction de la situation : -->

                <a href="index.html">Création</a>
                <a href="index.html">Admin</a>
                <a href="index.html">Accueil</a>
            </nav>
            <div>
                <div id="languageIcon">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29.975 5C16.175 5 5 16.2 5 30C5 43.8 16.175 55 29.975 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 29.975 5ZM47.3 20H39.925C39.125 16.875 37.975 13.875 36.475 11.1C41.075 12.675 44.9 15.875 47.3 20ZM30 10.1C32.075 13.1 33.7 16.425 34.775 20H25.225C26.3 16.425 27.925 13.1 30 10.1ZM10.65 35C10.25 33.4 10 31.725 10 30C10 28.275 10.25 26.6 10.65 25H19.1C18.9 26.65 18.75 28.3 18.75 30C18.75 31.7 18.9 33.35 19.1 35H10.65ZM12.7 40H20.075C20.875 43.125 22.025 46.125 23.525 48.9C18.925 47.325 15.1 44.15 12.7 40ZM20.075 20H12.7C15.1 15.85 18.925 12.675 23.525 11.1C22.025 13.875 20.875 16.875 20.075 20ZM30 49.9C27.925 46.9 26.3 43.575 25.225 40H34.775C33.7 43.575 32.075 46.9 30 49.9ZM35.85 35H24.15C23.925 33.35 23.75 31.7 23.75 30C23.75 28.3 23.925 26.625 24.15 25H35.85C36.075 26.625 36.25 28.3 36.25 30C36.25 31.7 36.075 33.35 35.85 35ZM36.475 48.9C37.975 46.125 39.125 43.125 39.925 40H47.3C44.9 44.125 41.075 47.325 36.475 48.9ZM40.9 35C41.1 33.35 41.25 31.7 41.25 30C41.25 28.3 41.1 26.65 40.9 25H49.35C49.75 26.6 50 28.275 50 30C50 31.725 49.75 33.4 49.35 35H40.9Z" />
                    </svg>
                </div>
                <div id="languageChoice">
                    <img src="{{ Vite::asset('resources/assets/icons/flags/france.svg') }}" alt="France flag">
                    <img src="{{ Vite::asset('resources/assets/icons/flags/uk.svg') }}" alt="United Kingdom flag">
                    <img src="{{ Vite::asset('resources/assets/icons/flags/spain.svg') }}" alt="Spain flag">
                    <img src="{{ Vite::asset('resources/assets/icons/flags/germany.svg') }}" alt="Germany flag">
                </div>
            </div>
        </div>
    </header>


    <div id="content" style="display: flex; flex-direction: column; gap: 20px; padding: 100px;">
        <div style="display: flex; gap: 10px;">
            <div id="calendar">

            </div>
            <div style="display:  flex; flex-direction: column; gap: 10px;">
                <button class="classicButton" onclick="nextMonth();">Suivant</button>
                <button class="classicButton" onclick="lastMonth();">Précédent</button>
                <button class="classicButton" onclick="clearSelectionCalendar();">Supprimer sélection</button>
                <button class="classicButton" onclick="drawCurrentMonth();">Revenir au mois courant</button>
            </div>
        </div>
    </div>

    <div style="padding: 50px 100px;">
        <textarea id=1 onkeyup="beatifyComment();" style="width: 500px; height: 100px" placeholder="Enter comment here"></textarea>
        <textarea id=2 style="width: 500px; height: 100px" placeholder="Result will be here" disabled></textarea>
        <input id=3 type="number" placeholder="Nombre de caractères" value="50" />
        <button class="classicButton" onclick=" navigator.clipboard.writeText(document.getElementById('2').value);">Click me to copy</button>
        <section>
            <h1>Titre de niveau h1</h1>
            <h2>Titre de niveau h2</h2>
            <h3>Titre de niveau h3</h3>
            <h4>Sous titre de niveau h4</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam ad, porro libero fuga accusamus soluta
                saepe quod quae quo eveniet impedit eos doloremque sapiente accusantium vel laudantium asperiores
                dignissimos repudiandae?</p>
            <p>Paragraphe en une ligne</p>
            <dfn>Explication de terme ou de concept</dfn>
            <p>Paragraphe avec un <strong>élément important</strong> à l'intérieur</p>
        </section>
        <section>
            <input type="text" placeholder="Input de texte" />
            <div class="inputIcon">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 6.14591C13.7084 6.14591 14.6875 7.12508 14.6875 8.33342C14.6875 9.54175 13.7084 10.5209 12.5 10.5209C11.2917 10.5209 10.3125 9.54175 10.3125 8.33342C10.3125 7.12508 11.2917 6.14591 12.5 6.14591ZM12.5 15.5209C15.5938 15.5209 18.8542 17.0417 18.8542 17.7084V18.8542H6.14585V17.7084C6.14585 17.0417 9.40627 15.5209 12.5 15.5209ZM12.5 4.16675C10.1979 4.16675 8.33335 6.03133 8.33335 8.33342C8.33335 10.6355 10.1979 12.5001 12.5 12.5001C14.8021 12.5001 16.6667 10.6355 16.6667 8.33342C16.6667 6.03133 14.8021 4.16675 12.5 4.16675ZM12.5 13.5417C9.71877 13.5417 4.16669 14.9376 4.16669 17.7084V20.8334H20.8334V17.7084C20.8334 14.9376 15.2813 13.5417 12.5 13.5417Z" />
                </svg>
                <input type="text" placeholder="Input de texte" />
            </div>
            <input class="inputShadow" type="text" placeholder="Input de texte" />
            <div class="inputIcon inputShadow">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 6.14591C13.7084 6.14591 14.6875 7.12508 14.6875 8.33342C14.6875 9.54175 13.7084 10.5209 12.5 10.5209C11.2917 10.5209 10.3125 9.54175 10.3125 8.33342C10.3125 7.12508 11.2917 6.14591 12.5 6.14591ZM12.5 15.5209C15.5938 15.5209 18.8542 17.0417 18.8542 17.7084V18.8542H6.14585V17.7084C6.14585 17.0417 9.40627 15.5209 12.5 15.5209ZM12.5 4.16675C10.1979 4.16675 8.33335 6.03133 8.33335 8.33342C8.33335 10.6355 10.1979 12.5001 12.5 12.5001C14.8021 12.5001 16.6667 10.6355 16.6667 8.33342C16.6667 6.03133 14.8021 4.16675 12.5 4.16675ZM12.5 13.5417C9.71877 13.5417 4.16669 14.9376 4.16669 17.7084V20.8334H20.8334V17.7084C20.8334 14.9376 15.2813 13.5417 12.5 13.5417Z" />
                </svg>
                <input type="text" placeholder="Input de texte" />
            </div>
        </section>
        <section>
            <div class="checkBox">
                <div></div>
                <label>Case à cocher</label>
                <input type="checkbox" name="testCheckbox" id="testCheckbox">
            </div>
            <div class="checkBox">
                <div></div>
                <label>Case à cocher</label>
                <input type="checkbox" name="testCheckbox" id="testCheckbox">
            </div>
            <div class="checkBox">
                <div></div>
                <div><label>Case à cocher</label><dfn>Avec description éventuelle qui peut<br />éventuellement
                        prendre
                        plusieurs lignes</dfn></div>
                <input type="checkbox" name="testCheckbox" id="testCheckbox">
            </div>
            <div class="checkBox disabled">
                <div></div>
                <label>Case à cocher désactivée</label>
                <input type="checkbox" name="testCheckbox" id="testCheckbox">
            </div>
        </section>
        <section>
            <a href="Google.com">Lien classique</a>
            <a class="discreet" href="Google.com">Lien classique</a>
        </section>
        <section>
            <div style="display: flex; gap: 10px;">
                <button class="aButton classicButton" disabled>Bouton d'action</button>
                <a type="button" class="classicButton disabled"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                <button class="aButton classicButton small" disabled>Bouton d'action</button>
                <a type="button" class="classicButton disabled small"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
            </div>
            <div style="display: flex; gap: 10px;">
                <button class="aButton classicButton">Bouton d'action</button>
                <a type="button" class="classicButton"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                <button class="aButton classicButton small">Bouton d'action</button>
                <a type="button" class="classicButton small"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
            </div>
            <div style="display: flex; gap: 10px;">
                <button class="aButton acceptButton">Bouton d'action</button>
                <a type="button" class="acceptButton"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                <button class="aButton acceptButton small">Bouton d'action</button>
                <a type="button" class="acceptButton small"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
            </div>
            <div style="display: flex; gap: 10px;">
                <button class="aButton denyButton">Bouton d'action</button>
                <a type="button" class="denyButton" disabled><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                <button class="aButton denyButton small">Bouton d'action</button>
                <a type="button" class="denyButton small" disabled><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
            </div>
        </section>
        <section>
            <div style="display: flex; gap: 10px;">
                <div class="select selectInactive classicButton disabled">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
                <div class="select selectInactive classicButton small disabled">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
            </div>
            <div style="display: flex; gap: 10px;">
                <div class="select selectInactive classicButton">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
                <div class="select selectInactive classicButton small">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
            </div>

            <div style="display: flex; gap: 10px;">
                <div class="select selectInactive acceptButton">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
                <div class="select selectInactive acceptButton small">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
            </div>
            <div style="display: flex; gap: 10px;">
                <div class="select selectInactive denyButton">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
                <div class="select selectInactive denyButton small">
                    <div class="selectTitle"><label>Bouton de sélection</label><img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                    </div>
                    <!-- Input hidden pour enregistrer le choix -->
                    <!-- Alt 'v' si flèche manquante-->
                    <input type="hidden" name="example" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate
            nisi.
            Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu
            vestibulum
            vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh.</p>
        <div>
            <p>© 2022 Vincent Masseron</p>
            •
            <a>Contact</a>
            •
            <a>Politique de confidentialité</a>
        </div>
    </footer>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            GROOM has wonderful, thorough documentation covering every aspect of the framework.
                            Whether
                            you are new to the framework or have previous experience with Laravel, we recommend
                            reading
                            all of the documentation from beginning to end.
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                            </path>
                            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript
                            development.
                            Check them out, see for yourself, and massively level up your development skills in the
                            process.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>

                    <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                        Shop
                    </a>

                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>

                    <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                        Sponsor
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
    </div>
</body>

</html>