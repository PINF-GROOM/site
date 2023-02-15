@props([ 'name', 'location', 'dates', 'status', 'contact', 'number','estimate', 'id','link'])

<div class="productCard">
    <img src='{{ $img }}' alt='logement icon' height='120' width='200' />
    <div class="productCardBottom">
        <div class="productCardHeader">
            <div class="productCardTitle">
                <h3>
                    {{ $name }}
                </h3>
                <p>
                    {{ $location }}
                <p>
                <div class="productCardBeds">
                    <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt='bed icon' height='20'
                        width='30' />
                    {{ $beds }}
                    @if ($beds > 1)
                        couchages
                    @else
                        couchage
                    @endif
                </div>

            </div>
            <div class="productCardRanking">
                <img src="{{ Vite::asset('resources/assets/icons/stars.svg') }}" alt='rating icon' height='20'
                    width='30' />
                <label>
                    {{ $rating }}
                </label>
            </div>
        </div>
        <div class="productCardFooter">
            <p>
                {{ $description }}
            </p>
            <a href="{{ $link }}">
                Voir plus de détails
            </a>
        </div>
    </div>
</div>
