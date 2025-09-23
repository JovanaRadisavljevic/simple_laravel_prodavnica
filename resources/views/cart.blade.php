@extends('layout')
@section('sadrzaj')
<link rel="stylesheet" href="{{ asset('css/cart.css')}}">

<div class="content">
    <h2>Korpa</h2>
    @if ($cartItems->isEmpty())
        <p>Korpa je prazna</p>
    @else
        <div class="items">
            @foreach ($cartItems as $ci)
            @php $p = $ci->product; @endphp  
            <div class="product">
                <h3>{{ $p->model }}</h3>
                <p>Količina: {{ $ci->quantity }}</p>
                <p>Cena (kom): {{ $ci->price_snapshot }}</p>
                <p>Međuzbir: {{ $ci->subtotal }}</p>
                <form action="{{ route('cart.destroy', ['type' => $ci->product_type, 'id' => $ci->product_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Ukloni iz korpe</button>
                </form>
            </div>
            @endforeach
        </div>
    @endif
</div>

@endsection