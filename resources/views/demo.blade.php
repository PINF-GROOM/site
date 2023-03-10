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
    <style>
        section {
            border-top: 1px solid var(--main-color-marron-bois);
            margin-top: 20px;
            padding: 20px 0;
            flex-direction: column;
        }
    </style>

    {{-- Favicons --}}


    <link href="{{ Vite::asset('resources/assets/favicons/apple-touch-icon.png') }}" rel="apple-touch-icon"
        sizes="180x180">
    <link type="image/png" href="{{ Vite::asset('resources/assets/favicons/favicon-32x32.png') }}" rel="icon"
        sizes="32x32">
    <link type="image/png" href="{{ Vite::asset('resources/assets/favicons/favicon-16x16.png') }}" rel="icon"
        sizes="16x16">
    <link href="{{ Vite::asset('resources/assets/favicons/site.webmanifest') }}" rel="manifest">
    <link href="{{ Vite::asset('resources/assets/favicons/safari-pinned-tab.svg') }}" rel="mask-icon" color="#5bbad5">
    <link href="{{ Vite::asset('resources/assets/favicons/favicon.ico') }}" rel="shortcut icon">
    <meta name="theme-color" content="#ffffff">



    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/carousel.css', 'resources/js/app.js', 'resources/js/header.js'])
</head>

<body class="antialiased">

    <x-header></x-header>


    <div id="content" style="display: flex; flex-direction: column; gap: 20px; padding: 100px;">
        <div id="calendar" class="box">
        </div>

        <div id="carousel">
            <div class="carouselLeft">
                <div id="carouselMovingPart">
                    <img class="CarouselImageDisplayed" src="{{ Vite::asset('resources/assets/demo/demo1.jpg') }}"
                        alt="demo1">
                </div>
            </div>
            <div class="carouselRight">
                <img src="{{ Vite::asset('resources/assets/demo/demo2.jpg') }}" alt="demo2">
                <img src="{{ Vite::asset('resources/assets/demo/demo3.jpg') }}" alt="demo3">
                <img src="{{ Vite::asset('resources/assets/demo/demo4.jpg') }}" alt="demo4">
                <img src="{{ Vite::asset('resources/assets/demo/demo5.jpg') }}" alt="demo5">
                <img src="{{ Vite::asset('resources/assets/demo/demo6.jpg') }}" alt="demo6">
                <img src="{{ Vite::asset('resources/assets/demo/demo7.jpg') }}" alt="demo7">
            </div>
        </div>
        <div id="imagePopup">
            <img src="{{ Vite::asset('resources/assets/demo/demo3.jpg') }}" alt="demo3">
        </div>

        @env('local')
        <p style="font-family: 'Inter';"> </p>
        @endenv

        <div style="padding: 50px 100px;">
            <textarea id=1 style="width: 500px; height: 100px" onkeyup="beatifyComment();" placeholder="Enter comment here"></textarea>
            <textarea id=2 style="width: 500px; height: 100px" placeholder="Result will be here" disabled></textarea>
            <input id=3 type="number" value="50" placeholder="Nombre de caract??res" />
            <button class="classicButton"
                onclick=" navigator.clipboard.writeText(document.getElementById('2').value);">Click me to
                copy</button>
            <section>
                @php
                    if (Auth::check()) {
                        echo 'Connected as ', Auth::user()->isSAdmin() ? 'Super Admin' : 'Admin';
                    } else {
                        echo 'Not connected';
                    }
                @endphp
            </section>
            <section>
                <h1>Titre de niveau h1</h1>
                <h2>Titre de niveau h2</h2>
                <h3>Titre de niveau h3</h3>
                <h4>Sous titre de niveau h4</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam ad, porro libero fuga
                    accusamus soluta
                    saepe quod quae50 quo eveniet impedit eos doloremque sapiente accusantium vel laudantium
                    asperiores
                    dignissimos repudiandae?</p>
                <p>Paragraphe en une ligne</p>
                <dfn>Explication de terme ou de concept</dfn>
                <p>Paragraphe avec un <strong>??l??ment important</strong> ?? l'int??rieur</p>
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
                <x-form.input style="shadow" placeholder="Input w/o icon w shadow disabled" disabled>
                </x-form.input>

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
                <x-form.input class="invalid" placeholder="Input w icon w shadow w error"></x-form.input>
                <x-form.input class="invalid" placeholder="Input w icon w shadow w error"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input class="invalid" type="password" placeholder="Input password w icon w shadow w error"></x-form.input>
                <x-form.input class="invalid" type="password" placeholder="Input password w icon w shadow w error"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <x-form.input style="shadow" class="invalid" placeholder="Input w icon w shadow w error"></x-form.input>
                <x-form.input style="shadow" class="invalid" placeholder="Input w icon w shadow w error"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input style="shadow" class="invalid" type="password" placeholder="Input password w icon w shadow w error"></x-form.input>
                <x-form.input style="shadow" class="invalid" type="password" placeholder="Input password w icon w shadow w error"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>

                <textarea class="invalid" placeholder="Textarea w error"></textarea>
            </section>
            <section>
                <x-form.checkbox name="checkboxTest" title="Case ?? cocher"></x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case ?? cocher"></x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case ?? cocher" description="lorem ipsum dolor sit amet">
                </x-form.checkbox>
                <x-form.checkbox name="checkboxTest" title="Case ?? cocher" disabled
                    description="lorem ipsum dolor sit amet"></x-form.checkbox>
            </section>

            <section>
                <a href="Google.com">Lien classique</a>
                <a class="discreet" href="Google.com">Lien classique</a>
            </section>
            <section>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.button disabled>Bouton d'action</x-form.button>
                    <x-form.button disabled icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action
                    </x-form.button>
                    <x-form.button disabled small>Bouton d'action</x-form.button>
                    <x-form.button disabled small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action</x-form.button>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.button>Bouton d'action</x-form.button>
                    <x-form.button icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton
                        d'action
                    </x-form.button>
                    <x-form.button small>Bouton d'action</x-form.button>
                    <x-form.button small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action
                    </x-form.button>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.button style="accept">Bouton d'action</x-form.button>
                    <x-form.button style="accept" icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton
                        d'action</x-form.button>
                    <x-form.button style="accept" small>Bouton d'action</x-form.button>
                    <x-form.button style="accept" small
                        icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                        Bouton d'action</x-form.button>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
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
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.select disabled placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option 3</x-form.option>
                    </x-form.select>
                    <x-form.select disabled small placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option 3</x-form.option>
                    </x-form.select>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.select placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option 3</x-form.option>
                    </x-form.select>
                    <x-form.select small placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option 3</x-form.option>
                    </x-form.select>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.select style="accept" placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option 3</x-form.option>
                    </x-form.select>
                    <x-form.select style="accept" small placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option 3</x-form.option>
                    </x-form.select>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <x-form.select style="deny" placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option baaaaaaaaaaaad longue</x-form.option>
                    </x-form.select>
                    <x-form.select style="deny" small placeholder="Bouton de s??lection">
                        <x-form.option>Option 1</x-form.option>
                        <x-form.option>Option 2</x-form.option>
                        <x-form.option>Option baaaaaaaaaaaad longue</x-form.option>
                    </x-form.select>
                </div>
            </section>
            <section>
                @php
                    if (Auth::check()) {
                        echo '<pre>';
                        dump(Auth::user());
                        echo '</pre>';
                    }
                @endphp
            </section>
        </div>
    </div>
    <footer>
        <p>Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut
            vulputate
            nisi.
            Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu
            vestibulum
            vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh.
        </p>
        <div>
            <p>?? 2022 Vincent Masseron</p>
            ???
            <a>Contact</a>
            ???
            <a>Politique de confidentialit??</a>
        </div>
    </footer>
    </div>
</body>

</html>
