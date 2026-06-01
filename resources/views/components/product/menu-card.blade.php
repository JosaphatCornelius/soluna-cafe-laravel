@props(['image', 'title', 'description', 'price'])

<div class="menu-item">
  <div class="img-wrapper">
    <img src="{{ $image }}" alt="{{ $title }}" />
  </div>
  <p class="item-name">{{ $title }}</p>
  <p class="item-desc">{{ $description }}</p>
  <p class="item-price">{{ $price }}</p>
</div>
