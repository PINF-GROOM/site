@props(['disabled', 'icon', 'type' => 'button', 'style' => 'classic', 'class', 'small', 'accept', 'deny'])


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

{{-- Small --}}
@isset($small)
    @php
        $attributes = $attributes->merge(['class' => 'small']);
    @endphp
@endisset

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
    <button {{ $attributes }} @isset($disabled) disabled @endisset>{{ $slot }}</button>
@endisset
