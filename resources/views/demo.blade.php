<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Utils & Assets</title>

    <!-- Fonts -->
    {{-- Todo3: ?DELETE? --}}
    <!-- <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="s   tylesheet"> -->


    <!-- Scripts -->
    <script>
        function beatifyComment() {
            let taille = document.getElementById("3").value;
            let content = document.getElementById("1").value;
            let result = "/*";
            let length = content.length;
            for (let a = 0; a < Math.ceil((taille - 6 - length) / 2); a++) {
                result += "*";
            }
            result += " " + content + " ";
            for (let a = 0; a < Math.floor((taille - 6 - length) / 2); a++) {
                result += "*";
            }
            document.getElementById("2").value = result += "*/";
        }
    </script>


    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

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
                    <img id="languageSelectFr" src="{{ Vite::asset('resources/assets/icons/flags/france.svg') }}" alt="France flag">
                    <img id="languageSelectEn" src="{{ Vite::asset('resources/assets/icons/flags/uk.svg') }}" alt="United Kingdom flag">
                    <img id="languageSelectEs" src="{{ Vite::asset('resources/assets/icons/flags/spain.svg') }}" alt="Spain flag">
                    <img id="languageSelectDe" src="{{ Vite::asset('resources/assets/icons/flags/germany.svg') }}" alt="Germany flag">
                </div>
            </div>
        </div>
    </header>


    <div id="content" style="display: flex; flex-direction: column; gap: 20px; padding: 100px;">
        <div id="calendar">
        </div>
        {{-- TODO0: REMOVE --}}
        <p style="font-family: 'Inter';"> </p>

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
                <x-form.input placeholder="Input w icon w shadow" class="demoClass" style="shadow" icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input placeholder="Input w icon w shadow disabled" disabled style="shadow" icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input placeholder="Input w icon w/o shadow" icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input placeholder="Input w icon w/o shadow disabled" disabled  icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input placeholder="Input w/o icon w shadow" style="shadow" ></x-form.input>
                <x-form.input placeholder="Input w/o icon w shadow disabled" disabled style="shadow"></x-form.input>

                <x-form.input placeholder="Input w/o icon w/o shadow"></x-form.input>
                <x-form.input placeholder="Input w/o icon w/o shadow disabled" disabled></x-form.input>
            </section>
            <section>
                <x-form.checkbox name="checkboxTest" title="Case à cocher"></x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case à cocher"></x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case à cocher" description="lorem ipsum dolor sit amet"></x-form.checkbox>
                <x-form.checkbox disabled name="checkboxTest" title="Case à cocher" description="lorem ipsum dolor sit amet"></x-form.checkbox>
                {{-- <div class="checkBox">
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
                </div> --}}
            </section>
            <section>
                <a href="Google.com">Lien classique</a>
                <a class="discreet" href="Google.com">Lien classique</a>
            </section>
            <section>
                <div style="display: flex; gap: 10px;">
                    <x-button disabled>Bouton d'action</x-button>
                    <x-button disabled icon="{{ Vite::asset('resources/assets/icons/download.svg') }}" >Bouton d'action</x-button>
                    <x-button disabled small>Bouton d'action</x-button>
                    <x-button disabled small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton d'action</x-button>

                    {{-- <button class="aButton classicButton" disabled>Bouton d'action</button>
                    <a type="button" class="classicButton disabled"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                    <button class="aButton classicButton small" disabled>Bouton d'action</button>
                    <a type="button" class="classicButton disabled small"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a> --}}
                </div>
                <div style="display: flex; gap: 10px;">
                    <x-button>Bouton d'action</x-button>
                    <x-button icon="{{ Vite::asset('resources/assets/icons/download.svg') }}" >Bouton d'action</x-button>
                    <x-button small>Bouton d'action</x-button>
                    <x-button small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton d'action</x-button>

                    {{-- <button class="aButton classicButton">Bouton d'action</button>
                    <a type="button" class="classicButton"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                    <button class="aButton classicButton small">Bouton d'action</button>
                    <a type="button" class="classicButton small"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a> --}}
                </div>
                <div style="display: flex; gap: 10px;">
                    <x-button style="accept">Bouton d'action</x-button>
                    <x-button style="accept" icon="{{ Vite::asset('resources/assets/icons/download.svg') }}" >Bouton d'action</x-button>
                    <x-button style="accept" small>Bouton d'action</x-button>
                    <x-button style="accept" small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton d'action</x-button>

                    {{-- <button class="aButton acceptButton">Bouton d'action</button>
                    <a type="button" class="acceptButton"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                    <button class="aButton acceptButton small">Bouton d'action</button>
                    <a type="button" class="acceptButton small"><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a> --}}
                </div>
                <div style="display: flex; gap: 10px;">
                    <x-button style="deny">Bouton d'action</x-button>
                    <x-button style="deny" icon="{{ Vite::asset('resources/assets/icons/download.svg') }}" >Bouton d'action</x-button>
                    <x-button style="deny" small>Bouton d'action</x-button>
                    <x-button style="deny" small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton d'action</x-button>

                    {{-- <button class="aButton denyButton">Bouton d'action</button>
                    <a type="button" class="denyButton" disabled><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a>
                    <button class="aButton denyButton small">Bouton d'action</button>
                    <a type="button" class="denyButton small" disabled><label>Bouton d'action</label><img src="{{ Vite::asset('resources/assets/icons/download.svg') }}" alt="Download icon"></a> --}}
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
    </div>
</body>

</html>
