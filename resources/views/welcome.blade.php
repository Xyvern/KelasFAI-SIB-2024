@if (Auth::user()->isSuperAdmin())
    <p>Welcome, Super Admin!</p>
@elseif (Auth::user()->isProductAdmin())
    <p>Welcome, Product Admin!</p>
@else
    <p>Welcome, Guest!</p>
@endif