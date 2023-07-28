@props(['attributes'])

<div class="flex justify-end mt-10 border-t border-gray=200 pt-6">
    <button type="submit"
            {{ $attributes(['class' => 'bg-blue-500 uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600']) }}>
        {{ $slot }}
    </button>
</div>
