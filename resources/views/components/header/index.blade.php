@props(['index', 'contact'])

<header>
    <a href="index.html"><img src="{{ Vite::asset('resources/assets/logo/long-name.svg') }}"
            alt="Logo Vincent Masseron"></a>
    <div>
        <nav>
            @php

                if (Auth::user()) {

                    echo '<a href="logout">Logout</a>';
                    echo '<a href="a">Admin</a>';
                    if (Auth::user()->isSAdmin()) {
                        echo '<a href="sa">Super Admin</a>';
                    }
                    echo '<a href="dashboard">Dasboard</a>';
                } else {
                    echo '<a href="login">Login</a>';
                }
            @endphp

        </nav>
        <div>
            <div id="languageIcon">
                <svg width="50" height="50" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29.975 5C16.175 5 5 16.2 5 30C5 43.8 16.175 55 29.975 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 29.975 5ZM47.3 20H39.925C39.125 16.875 37.975 13.875 36.475 11.1C41.075 12.675 44.9 15.875 47.3 20ZM30 10.1C32.075 13.1 33.7 16.425 34.775 20H25.225C26.3 16.425 27.925 13.1 30 10.1ZM10.65 35C10.25 33.4 10 31.725 10 30C10 28.275 10.25 26.6 10.65 25H19.1C18.9 26.65 18.75 28.3 18.75 30C18.75 31.7 18.9 33.35 19.1 35H10.65ZM12.7 40H20.075C20.875 43.125 22.025 46.125 23.525 48.9C18.925 47.325 15.1 44.15 12.7 40ZM20.075 20H12.7C15.1 15.85 18.925 12.675 23.525 11.1C22.025 13.875 20.875 16.875 20.075 20ZM30 49.9C27.925 46.9 26.3 43.575 25.225 40H34.775C33.7 43.575 32.075 46.9 30 49.9ZM35.85 35H24.15C23.925 33.35 23.75 31.7 23.75 30C23.75 28.3 23.925 26.625 24.15 25H35.85C36.075 26.625 36.25 28.3 36.25 30C36.25 31.7 36.075 33.35 35.85 35ZM36.475 48.9C37.975 46.125 39.125 43.125 39.925 40H47.3C44.9 44.125 41.075 47.325 36.475 48.9ZM40.9 35C41.1 33.35 41.25 31.7 41.25 30C41.25 28.3 41.1 26.65 40.9 25H49.35C49.75 26.6 50 28.275 50 30C50 31.725 49.75 33.4 49.35 35H40.9Z" />
                </svg>
            <div id="languageChoice">
                <img id="languageSelectFr" src="{{ Vite::asset('resources/assets/icons/flags/france.svg') }}"
                    alt="France flag">
                <img id="languageSelectEn" src="{{ Vite::asset('resources/assets/icons/flags/uk.svg') }}"
                    alt="United Kingdom flag">
                <img id="languageSelectEs" src="{{ Vite::asset('resources/assets/icons/flags/spain.svg') }}"
                    alt="Spain flag">
                <img id="languageSelectDe" src="{{ Vite::asset('resources/assets/icons/flags/germany.svg') }}"
                    alt="Germany flag">
            </div>
        </div>
    </div>
</header>
