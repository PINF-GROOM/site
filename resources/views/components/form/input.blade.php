@props(['disabled', 'icon', 'class', 'style' => 'classic'])

{{-- Adding passed clsses --}}
@isset($class)
    @php
        $attributes = $attributes->merge(['class' => $class]);
    @endphp
@endisset





{{-- Merges classes to fit style --}}
@switch($style)
    @case('shadow')
        @php
            $attributes = $attributes->merge(['class' => 'denyButton']);
        @endphp
    @break

    @default
        @php
            $attributes = $attributes->merge(['class' => 'classicButton']);
        @endphp
@endswitch

{{-- Button with icon --}}
@isset($icon)
    {{-- Disabled button --}}
    @isset($disabled)
        @php
            $attributes = $attributes->merge(['class' => 'disabled']);
        @endphp
    @endisset

    <a type="{{ $type }}" {{ $attributes }}>
        <label>{{ $slot }}</label>
        <img src="{{ $icon }}" alt="icon">
    </a>

    {{-- Button without icon --}}
@else
    <button @isset($disabled) disabled @endisset {{ $attributes }}>{{ $slot }}</button>
@endisset

<input type="text" placeholder="Input de texte" />

<input class="inputShadow" type="text" placeholder="Input de texte" />

<div class="inputIcon inputShadow">
    <img src="{{ Vite::asset('resources/assets/icons/user.svg') }}">
    <input type="text" placeholder="Input de texte" />
</div>

<div class="inputIcon inputShadow">
    <img src="{{ Vite::asset('resources/assets/icons/user.svg') }}">
    <input type="text" placeholder="Input de texte" />
</div>
