@props(['type', 'name', 'beds', 'PMR','enfant','localisation', 'estimation', 'date_debut', 'date_fin', 'dispo', 'note'])

<div>
    <div>
        <div>
            <h3>{{ $name }}</h3>
            <p>
                {{ $beds }}
                    @if ($beds > 1)
                        personnes
                    @else
                        personne
                    @endif
                @if ($PMR)
                    - PMR
                @endif
                @if ($enfant)
                    - Enfant en bas âge
                @endif
            </p>
        </div>
        <div>
            <p>{{ $localisation }}</p>
            @if ($type == "reservation")
                <p>Estimation: {{ $estimation }}€</p>
            @else
                <p>Du {{ $date_debut }} au  {{ $date_fin }}</p>
            @endif
        </div>
    </div>
    @if($type == "reservation")
        <div>
            <h4>Option</h4>
            <ul>
                <li>Test</li>
                <li>Test</li>
            </ul>
        </div>
    @else
        <p>{{ $note }}</p>
        @for ($i = 0; $i < (int)$note; $i++)
            <img src="{{ Vite::asset('resources/assets/icons/fullStar.svg') }}" alt="v"/>
        @endfor
        @if(strchr($note, ",5"))
            <p>OK</p>
        @endif
        @for ($i = 0; $i < 5-(int)$note; $i++)
            <img src="{{ Vite::asset('resources/assets/icons/emptyStar.svg') }}" alt="v"/>
        @endfor
        <p>(globale)</p>
    @endif
    <div>
        @if ($type == "reservation")
            <p>Du {{ $date_debut }} au {{ $date_fin }}</p>
            <div>
                <p>
                        @if ($dispo == 0)
                            Logement déjà occupé
                            <x-form.button disabled small icon="{{ Vite::asset('resources/assets/icons/valid.svg') }}">Continuer</x-form.button>
                        @else
                            <x-form.button style="accept" small icon="{{ Vite::asset('resources/assets/icons/valid.svg') }}">Continuer</x-form.button>
                        @endif
                </p>
                <div class="select selectInactive denyButton small">
                    <div class="selectTitle">
                        <label>Motif de refus</label>
                        <img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v"/>
                    </div>
                    <input name="example" type="hidden" value="">
                    <div class="selectOption">Option 1</div>
                    <div class="selectOption">Option 2</div>
                    <div class="selectOption">Option 3</div>
                </div>
            </div>
        @else
            <x-form.button style="accept" small icon="{{ Vite::asset('resources/assets/icons/valid.svg') }}">Valider</x-form.button>
            <div class="select selectInactive denyButton small">
                <div class="selectTitle">
                    <label>Motif de refus</label>
                    <img src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v"/>
                </div>
                <input name="example" type="hidden" value="">
                <div class="selectOption">Option 1</div>
                <div class="selectOption">Option 2</div>
                <div class="selectOption">Option 3</div>
            </div>
        @endif
    </div>
</div>
