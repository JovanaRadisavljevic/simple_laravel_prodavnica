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
                    <a href="{{ route('product.show', ['type' => 'sator', 'id' => $product->id]) }}" class="dugme">
                         Dodaj u korpu
                    </a>
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
                        <a href="{{ route('product.show', ['type' => 'ranac', 'id' => $product->id]) }}" class="dugme">
                            Dodaj u korpu
                        </a>
                    </div>
        @endif
</div>
</section>
@endsection