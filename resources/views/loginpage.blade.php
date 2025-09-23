<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<h2>Prijava korisnika</h2>
<div class="login">
<form action="{{ url('login') }}" method="POST">
        @csrf
        <div class="polje">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div class="polje">
            <label for="password">Šifra</label>
            <input type="password" name="password" id="password" required>
        </div>

        @if ($errors->any())
            <div style="color:rgb(232, 223, 223); margin: 8px 0;">{{ $errors->first() }}</div>
        @endif

        <div class="dugme">
            <button type="submit">Prijavi se</button>
        </div>
</form>
</div>
