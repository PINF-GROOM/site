@props(['disabled' => false, 'class', 'style'=>'classic', 'small', 'placeholder', 'options', 'id', 'name'=>'default'])

{{-- Adding passed classes --}}
@isset($class)
    @php
        $attributes = $attributes->merge(['class' => $class]);
    @endphp
@endisset

@isset($small)
    @php
        $attributes = $attributes->merge(['class' => 'small']);
    @endphp
@endisset

{{-- Merges classes to fit style --}}
@switch($style)
    @case('accept')
        @php
            $attributes = $attributes->merge(['class' => 'acceptButton']);
        @endphp
    @break

    @case('deny')
        @php
            $attributes = $attributes->merge(['class' => 'denyButton']);
        @endphp
    @break

    @default
        @php
            $attributes = $attributes->merge(['class' => 'classicButton']);
        @endphp
@endswitch


<div @class([$attributes['class'], 'select', 'selectInactive', 'disabled' => $disabled])>
    <div class="selectTitle"><label>{{ $placeholder }}</label><img
            src="{{ Vite::asset('resources/assets/icons/rightArrow.svg') }}" alt="v">
    </div>
    <!-- Input hidden pour enregistrer le choix -->
    <input name="{{ $name }}" type="hidden" value="">
    {{ $slot }}
</div>
