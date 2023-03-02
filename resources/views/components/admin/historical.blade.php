@props(['name', 'location', 'dates', 'status', 'contact', 'number', 'estimate', 'id', 'link'])

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
                    {{ $dates }}
                </p>
                <!-- TODO0: Pour les status j'ai mis P pour payé / A en attente de paiement / PF payé et fini / AF en attente et fini -->
                @if ($status == 'P')
                    <!--Status payé mais location pas terminée-->
                    <div class="status">
                        <p>Status :</p>
                        <p class="green"> Payé</p>
                    </div>
                @elseif ($status == 'A')
                    <!--Status En attente de paiement mais location pas terminée-->
                    <div class="status">
                        <p>Status :</p>
                        <p class="red"> En attente de paiement</p>
                    </div>
                @elseif ($status == 'PF')
                    <!--Status payé et location terminée-->
                    <div class="status">
                        <p>Status :</p>
                        <p class="green"> Payé </p>
                        <p class="finish"> Fini </p>
                    </div>
                @elseif ($status == 'AF')
                    <!--Status En attente de paiement et location terminée-->
                    <div class="status">
                        <p>Status :</p>
                        <p class="red"> En attente de paiement </p>
                        <p class="finish"> Fini </p>
                    </div>
                @endif

                <div class="productCardContact">
                    Contact : {{ $contact }}
                </div>

            </div>
            <div class="productCardRanking">
                {{ $number }}
                @if ($number > 1)
                    personnes
                @else
                    personne
                @endif
                <br />
                Estimation : {{ $estimate }}€
            </div>
        </div>
        <div class="productCardFooter">
            <x-form.button small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">
                Télécharger la facture
            </x-form.button>
        </div>
    </div>
</div>
