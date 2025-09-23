<div class="navbar">
  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('products') }}">Katalog proizvoda</a></li>
    <li><a href="{{ route('cart') }}#kopa">Korpa</a></li>
    <li>
      <form action="{{ route('logout') }}" method="post" style="display:inline;">
        @csrf
        <button type="submit">
            Logout
        </button>
      </form>
    </li>
  </ul>
</div>
