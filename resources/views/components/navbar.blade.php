@php
    $items = [
        ['label' => 'Home', 'url' => url('/'), 'active' => request()->is('/')],
        ['label' => 'About Us', 'url' => url('/about'), 'active' => request()->is('about')],
        ['label' => 'Products', 'url' => url('/product'), 'active' => request()->is('product')],
        ['label' => 'Promotions', 'url' => route('promotion'), 'active' => request()->is('promotion')],
        ['label' => 'Contact Us', 'url' => url('/contact'), 'active' => request()->is('contact')],
    ];
@endphp

<style>
    .floating-nav {
        position: fixed;
        top: 25px;
        left: 50%;
        transform: translateX(-50%);

        width: 90%;
        max-width: 850px;

        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);

        padding: 10px 20px;
        border-radius: 50px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .floating-nav ul {
        display: flex;
        justify-content: space-between;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 5px;
    }

    .floating-nav a {
        text-decoration: none;
        color: #333;
        font-family: 'Host Grotesk', sans-serif;
        font-size: 16px;
        font-weight: 500;
        padding: 10px 18px;
        border-radius: 25px;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .floating-nav a:hover {
        background: rgba(0, 0, 0, 0.08);
        color: #000;
    }

    .floating-nav .active a {
        font-weight: 700;
        background: #dcdcdc;
        color: #000;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        .floating-nav {
            top: 15px;
            width: 95%;
            padding: 8px;
        }

        .floating-nav ul {
            gap: 0;
        }

        .floating-nav a {
            padding: 8px 10px;
            font-size: 13px;
        }
    }
</style>

<nav class="floating-nav">
    <ul style="padding: 4px;">
        @foreach ($items as $item)
            <li class="{{ $item['active'] ? 'active' : '' }}">
                <a href="{{ $item['url'] }}" @if ($item['active']) aria-current="page" @endif>{{ $item['label'] }}</a>
            </li>
        @endforeach
        @auth
            <li>
                <a href="{{ route('cms.dashboard') }}" style="background: #8f5a3a; color: white;">CMS</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: contents;">
                    @csrf
                    <button type="submit" style="color: #333; border: none; font-family: 'Host Grotesk', sans-serif; font-size: 16px; font-weight: 500; border-radius: 25px; cursor: pointer; transition: all 0.3s ease;">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}" style="background: #8f5a3a; color: white;">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" style="background: #8f5a3a; color: white;">Register</a>
            </li>
        @endauth
    </ul>
</nav>
