@php
  $menus = [
      [
          'label' => 'Kategori',
          'childs' => [['label' => 'Wajah'], ['label' => 'Kulit']],
      ],
      ['label' => 'Terbaru'],
      ['label' => 'Terlaris'],
  ];
@endphp

<nav class="fixed left-0 right-0 bg-stone-200 py-4 px-8 md:py-8 z-40" x-data="{ isMenuOpen: false }">
  <div class="md:container mx-auto flex flex-row items-center justify-between">
    <a href="/">
      <x-application-logo class="w-12 h-12 fill-current text-gray-500" />
    </a>
    <div class="hidden md:inline-flex gap-8" @mouseover.away="isMenuOpen = false">
      @foreach ($menus as $menu)
        @if (isset($menu['childs']))
          <div class="relative my-auto">
            <x-button-menu href="#" @mouseover="isMenuOpen = true">
              <p class="inline-flex items-center gap-2">
                {{ $menu['label'] }}
                <x-icons.chevron-down class="h-4 w-4" />
              </p>
            </x-button-menu>
            <x-dropdown-menu :childs="$menu['childs']" />
          </div>
        @else
          <x-button-menu href="#">
            {{ $menu['label'] }}
          </x-button-menu>
        @endif
      @endforeach
    </div>
    <div class="inline-flex gap-6">
      <button type="button" class="p-2 rounded-full font-semibold hover:bg-stone-300 transition-all duration-200">
        <x-icons.cart class="h-6 w-6" />
      </button>
      <button type="button" class="p-2 rounded-full font-semibold hover:bg-stone-300 transition-all duration-200">
        <x-icons.person class="h-6 w-6" />
      </button>
    </div>
  </div>
</nav>
