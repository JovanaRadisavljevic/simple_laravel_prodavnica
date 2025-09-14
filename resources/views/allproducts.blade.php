@extends('layout')
@section('sadrzaj')
<link rel="stylesheet" href="{{ asset('css/proizvodi.css') }}">
<section>
    <h2>Katalog proizvoda</h2>
    <form class="filteri" method="GET" action="{{ route('products') }}">
        <label for="type">
            Tip
            <select name="type" id="type">
                <option value="" @selected(!request()->filled('type'))>Svi</option>
                <option value="sator" @selected(request('type')==='sator') >Satori</option>
                <option value="ranac" @selected(request('type')==='ranac') >Rancevi</option>
            </select>
        </label>
        <label for="sezona">
            Sezona (sator)
            <input id="sezona" type="text" name="sezona" value="{{request('sezona')}}">
        </label>
        <label for="tezina">
            Tezina (kg)
            <input id="tezina" type="number" step="0.01" name="tezina" value="{{ request('tezina') }}">
        </label>
        <label for="zapremina">
            Zapremina (ranac)
            <input id="zapremina" type="number" name="zapremina" value="{{request('zapremina')}}">
        </label>
        <label for="sort">
            Sortiraj po ceni
            <select name="sort" id="sort">
                <option value="" @selected(!request()->filled('sort')) >Bez sortiranja</option>
                <option value="asc" @selected(request('sort')==='asc')>Rastuce</option>
                <option value="desc" @selected(request('sort')==='desc')>Opadajuce</option>
            </select>
        </label>
        <button type="submit">Primeni filtere</button>
        <a href="{{ route('products') }}">Reset</a>   
    </form>
    <div class="proizvodi">
    @forelse($products as $p)
        <div class="proizvod">
        <div class="naslov">
            <h3>{{ $p->model }}</h3>
            @if($p->type === 'sator')
            <p>{{ $p->sezona }}</p>
            @endif
        </div>

        <div class="other">
            @if($p->type === 'sator')
            <p>broj osoba: {{ $p->brOsoba }}</p>
            @else
            <p>zapremina: {{ $p->zapremina }}</p>
            @endif

            <p>tezina: {{ $p->tezina }} kg</p>
            <p>cena: {{ number_format($p->price, 2) }} din</p>

            <a href="{{ route('product.show', ['type' => $p->type, 'id' => $p->id]) }}" class="dugme">
            DETALJI
            </a>
        </div>
        </div>
    @empty
        <p>Nema proizvoda za izabrane filtere.</p>
    @endforelse
    </div>

</section>
@endsection