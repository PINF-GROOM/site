@props(['name'])

<div class="moreInformationCard box">
    <h3>{{ $name }}</h3>
    {{ $slot }}
</div>
