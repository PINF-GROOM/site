@props(['icon', 'alt'])

<div class="moreInformationsItem">
    <img src="{{ $icon }}" alt="{{ $alt }}">
    <p>{{ $slot }}</p>
</div>
