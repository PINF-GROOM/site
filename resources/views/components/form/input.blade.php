@props(['disabled' => false, 'icon', 'class', 'style' => 'classic', 'type' => 'text', 'placeholder', 'content', 'id'])
{{-- type style class placeholder content icon disabled --}}

{{-- Adding passed classes --}}
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
    @case('submit')
        <input class="classicButton" type="submit" value="{{ $content }}">
    @break

    @case('password')
        @php
            $attributes = $attributes->merge(['class' => 'inputPassword']);
        @endphp

        @isset($icon)
            <div @class([$attributes['class'], 'inputIcon', 'disabled' => $disabled])>
                <img src="{{ $icon }}" alt="icon">
                <input type="{{ $type }}" {{ $attributes }} @if ($disabled) disabled @endif
                    @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
                    @isset($id) id="{{ $id }}" @endisset />
                <img class="seePassword" src="{{ Vite::asset('resources/assets/icons/see.svg') }}" alt="See password" draggable="false">
            </div>

            {{-- Input without icon --}}
        @else
            <div @class([$attributes['class'], 'disabled' => $disabled])>
                <input type="{{ $type }}" {{ $attributes }} @if ($disabled) disabled @endif
                    @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
                    @isset($id) id="{{ $id }}" @endisset />
                <img class="seePassword" src="{{ Vite::asset('resources/assets/icons/see.svg') }}" alt="See password" draggable="false">
            </div>
        @endisset
    @break

    {{-- Apply input style by default --}}

    @default
        {{-- Input with icon --}}
        @isset($icon)
            <div @class([$attributes['class'], 'inputIcon', 'disabled' => $disabled])>
                <img src="{{ $icon }}" alt="icon">
                <input type="{{ $type }}" {{ $attributes }} @if ($disabled) disabled @endif
                    @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
                    @isset($id) id="{{ $id }}" @endisset />
            </div>

            {{-- Input without icon --}}
        @else
            <input type="{{ $type }}" @if ($disabled) disabled @endif {{ $attributes }}
                @isset($id) id="{{ $id }}" @endisset placeholder="{{ $placeholder }}" />
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
