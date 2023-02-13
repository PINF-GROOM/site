<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Utils & Assets</title>

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
    @vite(['resources/css/app.css', 'resources/css/carousel.css', 'resources/js/app.js', 'resources/js/header.js'])
</head>

<body class="antialiased">

    <x-header></x-header>


    <div id="content" style="display: flex; flex-direction: column; gap: 20px; padding: 100px;">
        <div id="calendar">
        </div>

        <div id="carousel">
            <img src="{{ Vite::asset('resources/assets/demo/demo3.jpg') }}" alt="demo3">
            <div class="carouselRight">
                <img src="{{ Vite::asset('resources/assets/demo/demo1.jpg') }}" alt="demo1">
                <img src="{{ Vite::asset('resources/assets/demo/demo2.jpg') }}" alt="demo2">
                <img src="{{ Vite::asset('resources/assets/demo/demo4.jpg') }}" alt="demo4">
                <img src="{{ Vite::asset('resources/assets/demo/demo5.jpg') }}" alt="demo5">
                <img src="{{ Vite::asset('resources/assets/demo/demo6.jpg') }}" alt="demo6">
                <img src="{{ Vite::asset('resources/assets/demo/demo7.jpg') }}" alt="demo7">
            </div>
        </div>

        @env('local')
        <p style="font-family: 'Inter';"> </p>
        @endenv

        <div style="padding: 50px 100px;">
            <textarea id=1 style="width: 500px; height: 100px" onkeyup="beatifyComment();" placeholder="Enter comment here"></textarea>
            <textarea id=2 style="width: 500px; height: 100px" placeholder="Result will be here" disabled></textarea>
            <input id=3 type="number" value="50" placeholder="Nombre de caractères" />
            <button class="classicButton"
                onclick=" navigator.clipboard.writeText(document.getElementById('2').value);">Click me to copy</button>
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
                <x-form.input class="demoClass" style="shadow" placeholder="Input w icon w shadow"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input style="shadow" placeholder="Input w icon w shadow disabled" disabled
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input placeholder="Input w icon w/o shadow"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input placeholder="Input w icon w/o shadow disabled" disabled
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input style="shadow" placeholder="Input w/o icon w shadow"></x-form.input>
                <x-form.input style="shadow" placeholder="Input w/o icon w shadow disabled" disabled></x-form.input>

                <x-form.input placeholder="Input w/o icon w/o shadow"></x-form.input>
                <x-form.input placeholder="Input w/o icon w/o shadow disabled" disabled></x-form.input>
            </section>
            <section>
                <x-form.input class="demoClass" type="password" style="shadow"
                    placeholder="Input password w icon w shadow"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input type="password" style="shadow" placeholder="Input password w icon w shadow disabled"
                    disabled icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input type="password" placeholder="Input password w icon w/o shadow"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input type="password" placeholder="Input password w icon w/o shadow disabled" disabled
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input type="password" style="shadow" placeholder="Input password w/o icon w shadow">
                </x-form.input>
                <x-form.input type="password" style="shadow" placeholder="Input password w/o icon w shadow disabled"
                    disabled></x-form.input>

                <x-form.input type="password" placeholder="Input password w/o icon w/o shadow"></x-form.input>
                <x-form.input type="password" placeholder="Input password w/o icon w/o shadow disabled" disabled>
                </x-form.input>

            </section>
            <section>
                <x-form.checkbox name="checkboxTest" title="Case à cocher"></x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case à cocher"></x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case à cocher" description="lorem ipsum dolor sit amet">
                </x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case à cocher" disabled
                    description="lorem ipsum dolor sit amet"></x-form.checkbox>
            </section>
            <section>
                <a href="Google.com">Lien classique</a>
                <a class="discreet" href="Google.com">Lien classique</a>
            </section>
            <section>
                <div style="display: flex; gap: 10px;">
                    <x-form.button disabled>Bouton d'action</x-form.button>
                    <x-form.button disabled icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton
                        d'action
                    </x-form.button>
                    <x-form.button disabled small>Bouton d'action</x-form.button>
                    <x-form.button disabled small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action</x-form.button>
                </div>
                <div style="display: flex; gap: 10px;">
                    <x-form.button>Bouton d'action</x-form.button>
                    <x-form.button icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton d'action
                    </x-form.button>
                    <x-form.button small>Bouton d'action</x-form.button>
                    <x-form.button small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton
                        d'action
                    </x-form.button>
                </div>
                <div style="display: flex; gap: 10px;">
                    <x-form.button style="accept">Bouton d'action</x-form.button>
                    <x-form.button style="accept" icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action</x-form.button>
                    <x-form.button style="accept" small>Bouton d'action</x-form.button>
                    <x-form.button style="accept" small
                        icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton d'action</x-form.button>
                </div>
                <div style="display: flex; gap: 10px;">
                    <x-form.button style="deny">Bouton d'action</x-form.button>
                    <x-form.button style="deny" icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action</x-form.button>
                    <x-form.button style="deny" small>Bouton d'action</x-form.button>
                    <x-form.button style="deny" small
                        icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton d'action</x-form.button>
                </div>
            </section>
            <section>
                <div style="display: flex; gap: 10px;">
                    <div class="select selectInactive classicButton disabled">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                    <div class="select selectInactive classicButton small disabled">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="select selectInactive classicButton">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                    <div class="select selectInactive classicButton small">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <div class="select selectInactive acceptButton">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                    <div class="select selectInactive acceptButton small">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="select selectInactive denyButton">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
                        <div class="selectOption">Option 1</div>
                        <div class="selectOption">Option 2</div>
                        <div class="selectOption">Option 3</div>
                    </div>
                    <div class="select selectInactive denyButton small">
                        <div class="selectTitle"><label>Bouton de sélection</label><img
                                src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
                        </div>
                        <!-- Input hidden pour enregistrer le choix -->
                        <!-- Alt 'v' si flèche manquante-->
                        <input name="example" type="hidden" value="">
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
