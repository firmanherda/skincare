<div x-show="isMenuOpen" class="absolute z-50 bg-stone-100 top-8 left-0 rounded-md p-4"
  x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95"
  x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
  x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
  <ul>
    @foreach ($childs as $child)
      <button type="button" class="py-2 px-4 rounded-md hover:bg-stone-300 transition-all duration-200">
        <p class="inline-flex items-center gap-2">
          {{ $child['label'] }}
        </p>
      </button>
    @endforeach
  </ul>
</div>
