<h1>Ini halaman user </h1>
{{-- <h2>{{}}</h2> --}}
{{ Auth::user()->name }}
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>