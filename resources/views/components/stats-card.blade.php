@props(['title', 'value', 'linkText', 'linkHref', 'colorClass'])

<div class="bg-white p-6 rounded-lg shadow-md">
    <h4 class="text-gray-500 text-sm font-medium">{{ $title }}</h4>
    <p class="text-3xl font-bold mt-2">{{ $value }}</p>
    <a href="{{ $linkHref }}" class="text-sm font-medium mt-4 inline-block {{ $colorClass }}">
        {{ $linkText }}
    </a>
</div>