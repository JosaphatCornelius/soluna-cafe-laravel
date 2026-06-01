<section class="menu-section">
  <div class="menu-container">
    <nav class="menu-sidebar" aria-label="Product categories">
      <a href="#" class="active" data-tab="drink">Drink</a>
      <a href="#" data-tab="food">Food</a>
      <a href="#" data-tab="dessert">Dessert</a>
    </nav>

    <div class="menu-content">
      <h2 class="menu-title">Menu</h2>

      @php
        $drinkItems = [
          ['image' => asset('images/cappucino.webp'), 'title' => 'Cappucino', 'description' => 'Espresso dengan steamed milk dan foam', 'price' => 'Rp 35.000'],
          ['image' => asset('images/americano.jpg'), 'title' => 'Americano', 'description' => 'Espresso dengan hot water', 'price' => 'Rp 30.000'],
          ['image' => asset('images/latte.webp'), 'title' => 'Caffe Latte', 'description' => 'Espresso dengan steamed milk', 'price' => 'Rp 38.000'],
          ['image' => asset('images/mocha.jpg'), 'title' => 'Mocha', 'description' => 'Espresso dengan coklat, susu, dan whipped cream', 'price' => 'Rp 42.000'],
          ['image' => asset('images/espresso.jpg'), 'title' => 'Espresso', 'description' => 'Pure coffee shot yang kuat', 'price' => 'Rp 25.000'],
          ['image' => asset('images/Matcha-Latte.jpg'), 'title' => 'Matcha latte', 'description' => 'Matcha dengan susu', 'price' => 'Rp 42.000'],
        ];

        $foodItems = [
          ['image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=500&q=80', 'title' => 'Nasi Goreng', 'description' => 'Nasi goreng spesial dengan telur', 'price' => 'Rp 45.000'],
          ['image' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=500&q=80', 'title' => 'Ayam Geprek', 'description' => 'Ayam crispy dengan sambal', 'price' => 'Rp 48.000'],
          ['image' => 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=500&q=80', 'title' => 'Mie Goreng', 'description' => 'Mie goreng dengan sayuran', 'price' => 'Rp 42.000'],
          ['image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&q=80', 'title' => 'Caesar Salad', 'description' => 'Sayur segar dengan dressing', 'price' => 'Rp 40.000'],
          ['image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&q=80', 'title' => 'Beef Burger', 'description' => 'Burger daging sapi premium', 'price' => 'Rp 65.000'],
        ];

        $dessertItems = [
          ['image' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=500&q=80', 'title' => 'Tiramisu', 'description' => 'Dessert Italia dengan kopi', 'price' => 'Rp 45.000'],
          ['image' => 'https://images.unsplash.com/photo-1497034825429-c343d7c6a68f?w=500&q=80', 'title' => 'Es Krim', 'description' => 'Ice cream vanilla & coklat', 'price' => 'Rp 35.000'],
          ['image' => 'https://images.unsplash.com/photo-1551024601-bec78aea704b?w=500&q=80', 'title' => 'Chocolate Donut', 'description' => 'Donat coklat dengan topping', 'price' => 'Rp 28.000'],
          ['image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=500&q=80', 'title' => 'Cheesecake', 'description' => 'New York style cheesecake', 'price' => 'Rp 50.000'],
          ['image' => 'https://images.unsplash.com/photo-1515037028865-0a2a82603f7c?w=500&q=80', 'title' => 'Pancake', 'description' => 'Pancake dengan maple syrup', 'price' => 'Rp 42.000'],
        ];
      @endphp

      @include('components.product.carousel', ['tab' => 'drink', 'items' => $drinkItems, 'active' => true])
      @include('components.product.carousel', ['tab' => 'food', 'items' => $foodItems])
      @include('components.product.carousel', ['tab' => 'dessert', 'items' => $dessertItems])
    </div>
  </div>
</section>
