@props(['tab', 'items', 'active' => false])

<div class="tab-panel {{ $active ? 'active' : '' }}" id="{{ $tab }}">
  <div class="carousel-container">
    <div class="carousel-track" id="{{ $tab }}-track">
      @foreach ($items as $item)
        <div class="carousel-item">
          @include('components.product.menu-card', $item)
        </div>
      @endforeach
    </div>
    <button class="carousel-btn prev" data-carousel="{{ $tab }}">‹</button>
    <button class="carousel-btn next" data-carousel="{{ $tab }}">›</button>
  </div>
  <div class="carousel-indicators" id="{{ $tab }}-indicators"></div>
</div>
