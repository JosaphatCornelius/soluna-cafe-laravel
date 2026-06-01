@extends('layouts.app')

@section('title', 'Promotions')

@section('content')
    @include('components.promotions.hero')

    @include('components.promotions.intro', [
        'title' => 'Promotions',
        'description' => 'Below you’ll find our best deals and promotions. Made with your wallets in our mind, we have put up the most fabulous of deals! Check these deals out yourself in the comfort of your own home or do come visit us!',
    ])

    @include('components.promotions.carousel')

    @include('components.promotions.intro', [
        'title' => 'Can’t Wait!',
        'description' => 'Every brew that we made originated from our deep love of coffee. And if you can’t wait to give our finest of coffee beans, be sure to contact us as soon as you’re ready! We definitely cannot wait for your arrival to Soluna Cafe!',
    ])

    @include('components.promotions.contact')
@endsection