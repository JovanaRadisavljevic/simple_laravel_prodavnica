@extends('layout')
@section('sadrzaj')
<link rel="stylesheet" href="{{ asset('css/proizvodi.css') }}">
<section>
    <h2>Katalog proizvoda</h2>
    <div class="proizvodi">
        @foreach($satori as $sator)
            <div class="proizvod">
                <div class="naslov">
                    <h3>{{$sator->model}}</h3>
                    <p>{{$sator->sezona}}</p>
                </div>
                <div class="other">
                    <p>broj osoba: {{$sator->brOsoba}}</p>
                    <p>tezina: {{$sator->tezina}} kg</p>
                    <p>cena: {{$sator->price}} din</p>
                    <a href="{{ route('product.show', ['type' => 'sator', 'id' => $sator->id]) }}" class="dugme">
                        Detalji
                    </a>
                </div>
            </div>
        @endforeach
        @foreach($rancevi as $ranac)
            <div class="proizvod">
                <div class="naslov">
                    <h3>{{$ranac->model}}</h3>
                </div>
                <div class="other">
                    <p>zapremina: {{$ranac->zapremina}}</p>
                    <p>tezina: {{$ranac->tezina}} kg</p>
                    <p>cena: {{$ranac->price}} din</p>
                    <a href="{{ route('product.show', ['type' => 'ranac', 'id' => $ranac->id]) }}" class="dugme">
                        Detalji
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection