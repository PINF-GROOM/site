@props(['disabled', 'class', 'name', 'title', 'description', 'id'])



{{-- Adding passed classes --}}
@isset($class)
    @php
        $attributes = $attributes->merge(['class' => $class]);
    @endphp
@endisset

{{-- Disabled button --}}
@isset($disabled)
    @php
        $attributes = $attributes->merge(['class' => 'disabled']);
    @endphp
@endisset


    @php
        $attributes = $attributes->merge(['class' => 'checkBox']);
    @endphp




{{-- <a type="{{ $type }}" {{ $attributes }}>
    <label>{{ $slot }}</label>
    <img src="{{ $icon }}" alt="icon">
</a> --}}

<div {{ $attributes }}>
    <div ></div>

    @if (isset($description))
        <div>
            <label>{{ $title }}</label>
            <dfn>{{ $description }} <br/></dfn>
        </div>
    @else
        <label>{{ $title }}</label>
    @endif



    <input name="{{ $name }}" type="checkbox"
        @isset($id) id="{{ $id }}" @endisset />
</div>

{{-- <div class="checkBox">
    <div></div>
    <div><label>Case à cocher</label><dfn>Avec description éventuelle qui peut<br />éventuellement
            prendre
            plusieurs lignes</dfn></div>
    <input type="checkbox" name="testCheckbox" id="testCheckbox">
</div> --}}


{{-- <div class="checkBox">
    <div></div>
    <label>Case à cocher</label>
    <input type="checkbox" name="testCheckbox" id="testCheckbox">
</div> --}}
