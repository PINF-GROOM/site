@props([ 'name', 'location', 'dates', 'status', 'contact', 'number','estimate', 'id','link'])

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
                @if ($status == "P")  <!--Status payé mais location pas terminée-->
                <p>
                    Status : <div class="green"> Payé</div>
                </p>
                @elseif ($status == "A")<!--Status En attente de paiement mais location pas terminée-->
                <p>
                    Status : <div class="red"> En attente de paiement</div>
                </p>
                @elseif ($status == "PF")<!--Status payé et location terminée-->
                <p>
                    Status : <div class="green"> Payé </div> <div class="finish"> Fini </div>
                </p>
                @elseif ($status == "AF")<!--Status En attente de paiement et location terminée-->
                <p>
                    Status : <div class="red"> En attente de paiement </div> <div class="finish"> Fini </div>
                </p>
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
                <br/>
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
