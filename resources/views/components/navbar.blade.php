@php
    $items = [
        ['label' => 'Home', 'url' => url('/'), 'active' => false],
        ['label' => 'About Us', 'url' => url('/#about'), 'active' => false],
        ['label' => 'Products', 'url' => url('/#products'), 'active' => false],
        ['label' => 'Promotions', 'url' => url('/#promotions'), 'active' => false],
        ['label' => 'Label', 'url' => url('/contact'), 'active' => true],
    ];
@endphp

<style>
    .navbar-glass-wrap {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 50;
        display: flex;
        justify-content: center;
        padding: 24px 16px 0;
        background: transparent;
        pointer-events: none;
    }

    .navbar-glass {
        position: relative;
        display: flex;
        align-items: center;
        width: min(826px, 100%);
        height: 51px;
        padding: 4px;
        overflow: hidden;
        border-radius: 296px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12);
        pointer-events: auto;
    }

    .navbar-glass__surface {
        position: absolute;
        inset: 0;
        border-radius: inherit;
        background: rgba(255, 255, 255, 0.65);
        backdrop-filter: blur(18px) saturate(160%);
        -webkit-backdrop-filter: blur(18px) saturate(160%);
    }

    .navbar-glass__surface::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: inherit;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.56), rgba(255, 255, 255, 0.18));
        pointer-events: none;
    }

    .navbar-glass__track {
        position: relative;
        z-index: 1;
        display: flex;
        width: 100%;
        height: 36px;
        align-items: center;
        justify-content: center;
    }

    .navbar-glass__item {
        position: relative;
        display: flex;
        flex: 1 0 0;
        align-items: center;
        justify-content: center;
        height: 100%;
        padding: 0 18px;
        border-radius: 100px;
        color: #1a1a1a;
        text-decoration: none;
        font-family: 'SF Pro Display', 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        font-size: 15px;
        line-height: normal;
        letter-spacing: -0.23px;
        transition: color 160ms ease;
    }

    .navbar-glass__item:hover {
        color: #000;
    }

    .navbar-glass__item span {
        position: relative;
        z-index: 1;
        white-space: nowrap;
    }

    .navbar-glass__item--active {
        font-weight: 700;
        color: #000;
    }

    .navbar-glass__item--active::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 100px;
        background: #ededed;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.55);
    }
</style>

<div class="navbar-glass-wrap">
    <nav class="navbar-glass" aria-label="Primary">
        <div class="navbar-glass__surface" aria-hidden="true"></div>
        <div class="navbar-glass__track">
            @foreach ($items as $item)
                <a
                    href="{{ $item['url'] }}"
                    class="navbar-glass__item {{ $item['active'] ? 'navbar-glass__item--active' : '' }}"
                    @if ($item['active']) aria-current="page" @endif
                >
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>
    </nav>
</div>
