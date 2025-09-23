@extends('layout')
@section('sadrzaj')
<link rel="stylesheet" href="{{ asset('css/singleproizvod.css') }}">
<section>
<div class="proizvod">
       @if ($type === 'sator')
        <div class="proizvod">
                <div class="naslov">
                    <h3>{{$product->model}}</h3>
                    <p>{{$product->sezona}}</p>
                </div>
                <div class="other">
                    <p>broj osoba: {{$product->brOsoba}}</p>
                    <p>tezina: {{$product->tezina}} kg</p>
                    <p>cena: {{$product->price}} din</p>
                    <form action="{{ route('cart.store', ['type' => $type, 'id' => $product->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="dugme">Dodaj u korpu</button>
                    </form>
                </div>
            </div>
        @else
        <div class="naslov">
                        <h3>{{$product->model}}</h3>
                    </div>
                    <div class="other">
                        <p>zapremina: {{$product->zapremina}}</p>
                        <p>tezina: {{$product->tezina}} kg</p>
                        <p>cena: {{$product->price}} din</p>
                        <form action="{{ route('cart.store', ['type' => $type, 'id' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="dugme">Dodaj u korpu</button>
                        </form>
                    </div>
        @endif
</div>
@if (session('success'))
<script>
    alert(@json(session('success')));
</script>
@endif

@if (session('error'))
<script>
    alert(@json(session('error')));
</script>
@endif
</section>
@endsection