@props(['disabled' => false, 'icon', 'class', 'style' => 'classic', 'type' => 'text', 'placeholder', 'content', 'id'])
{{-- type style class placeholder content icon disabled --}}

{{-- Adding passed clsses --}}
@isset($class)
    @php
        $attributes = $attributes->merge(['class' => $class]);
    @endphp
@endisset

{{-- Adding styles --}}
@switch($style)
    @case('shadow')
        @php
            $attributes = $attributes->merge(['class' => 'inputShadow']);
        @endphp
    @break

    @default
@endswitch

@switch($type)
    @case('notText')
    @break

    {{-- Apply input style by default --}}

    @default
        {{-- Button with icon --}}
        @isset($icon)

            <div @class([ $attributes['class'], 'inputIcon', 'disabled' => $disabled]) >
                <img src="{{ $icon }}" alt="icon">
                <input type="text" {{ $attributes }} @if($disabled) disabled @endif @isset($placeholder) placeholder="{{ $placeholder }}" @endisset @isset($id) id="{{ $id }}" @endisset/>
            </div>

            {{-- Button without icon --}}
        @else
            <input type="text" @if($disabled) disabled @endif {{ $attributes }} @isset($id) id="{{ $id }}" @endisset placeholder="{{ $placeholder }}"/>
        @endisset
@endswitch



{{-- <input type="text" placeholder="Input de texte" />

<input class="inputShadow" type="text" placeholder="Input de texte" />

<div class="inputIcon inputShadow">
    <img src="{{ Vite::asset('resources/assets/icons/user.svg') }}">
    <input type="text" placeholder="Input de texte" />
</div>

<div class="inputIcon inputShadow">
    <img src="{{ Vite::asset('resources/assets/icons/user.svg') }}">
    <input type="text" placeholder="Input de texte" />
</div> --}}
