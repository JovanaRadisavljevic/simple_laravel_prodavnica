@extends('layout')
@section('sadrzaj')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<section class="home-hero">
    <div class="levo">
        <h1>Dobrodošli u našu prodavnicu planinarske opreme</h1>
        <p>
            Oprema za avanture u prirodi na jednom mestu! <br>
            Kvalitetni šatori, rančevi i dodatna oprema za bezbedan i udoban boravak u prirodi.
        </p>
        <a href="{{ route('products') }}" class="btn">Pogledaj katalog</a>
    </div>

    <div class="desno">
        <h2>Zašto izabrati nas?</h2>
        <ul>
            <li>✅ Više od 30 godina iskustva</li>
            <li>✅ Proizvodi testirani na ekstremnim uslovima</li>
            <li>✅ Povoljni paketi i popusti</li>
            <li>✅ Brza dostava širom Srbije</li>
        </ul>
    </div>
</section>

@endsection