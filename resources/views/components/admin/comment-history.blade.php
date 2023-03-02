@props([ 'name', 'location', 'dates', 'id', 'number', 'note','description','commentDate'])

<div class="productCard">
    <div class="productCardBottom">
        <div class="productCardHeader">
            <div class="productCardTitle">
                <h3>
                    {{ $name }}
                </h3>
                <p>
                    {{ $location }}
                </p>
                <p>
                    Le {{ $commentDate }}
                </p>
                <div class="stars">
                    <p class="note">
                        {{ $note}}
                    </p>
                    @for ($i=0; $i<(int)$note; $i++)
                        <img src="{{ Vite::asset('resources/assets/icons/fullStar.svg') }}" alt='rating icon' height='30'
                    width='50' />
                    @endfor
                    @if($note-$i >= 0.75)
                            <img src="{{ Vite::asset('resources/assets/icons/fullStar.svg') }}" alt='rating icon' height='30'
                            width='50' />
                            @php
                                $i=$i+1;
                            @endphp
                    @endif
                    @if($note-$i >0.25 && $note-$i <0.75)
                        <img src="{{ Vite::asset('resources/assets/icons/halfStar.svg') }}" alt='rating icon' height='30'
                        width='50' />
                        @php
                                $i=$i+1;
                            @endphp
                    @endif
                    @for($j=0; $j<5-(int)$i; $j++)
                    <img src="{{ Vite::asset('resources/assets/icons/emptyStar.svg') }}" alt='rating icon' height='30'
                    width='50' />
                    @endfor
                </div>
            </div>
            <div class="productCardRanking">
                {{ $number }}
                @if ($number > 1)
                        personnes
                    @else
                        personne
                    @endif
                <br/>
                {{ $dates }}
            </div>
        </div>
        <div class="productCardFooter">
                <p>
                    {{ $description }}
                </p>
                <x-form.button style="deny" small
                        icon="{{ Vite::asset('resources/assets/icons/cancel.svg') }}">
                        Supprimer</x-form.button>
        </div>
    </div>
</div>
