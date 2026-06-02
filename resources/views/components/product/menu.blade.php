<section class="menu-section">
  <div class="menu-container">
    @if (!empty($categories))
      <nav class="menu-sidebar" aria-label="Product categories">
        @foreach ($categories as $catName => $items)
          <a href="#" class="{{ $loop->first ? 'active' : '' }}" data-tab="{{ \Illuminate\Support\Str::slug($catName) }}">{{ $catName }}</a>
        @endforeach
      </nav>

      <div class="menu-content">
        <h2 class="menu-title">Menu</h2>

        @foreach ($categories as $catName => $items)
          @include('components.product.carousel', [
            'tab' => \Illuminate\Support\Str::slug($catName),
            'items' => $items,
            'active' => $loop->first,
          ])
        @endforeach
      </div>
    @else
      <div class="menu-content" style="text-align: center; padding: 60px 20px;">
        <h2 class="menu-title">Menu</h2>
        <p style="color: #8f5a3a; font-size: 18px; margin-top: 20px;">No products available at the moment.</p>
      </div>
    @endif
  </div>
</section>
