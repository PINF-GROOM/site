@props(['img', 'designation', 'localisation', 'couchages', 'description', 'etoiles', 'id', 'lien'])

<div class="productCard">
    <img src='{{ $img }}' alt='logement'height='120' width='200' />
    <div class="productCardBottom">
        <div class="productCardHeader">
            <div class="productCardTitle">
                <h3>
                    {{ $designation }}
                </h3>
                <p>
                    {{ $localisation }}
                <p>
                <div class="productCardBeds">
                    <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt='bed'height='20'
                        width='30' />
                    {{ $couchages }}
                    @if ($couchages > 1)
                        couchages
                    @else
                        couchage
                    @endif
                </div>

            </div>
            <div class="productCardRanking">
                <img src="{{ Vite::asset('resources/assets/icons/stars.svg') }}" alt='star'height='20'
                    width='30' />
                <label>
                    {{ $etoiles }}
                </label>
            </div>
        </div>
        <div class="productCardFooter">
            <p>
                {{ $description }}
            </p>
            <a href="{{ $lien }}">
                Voir plus de détails
            </a>
        </div>
    </div>
</div>
