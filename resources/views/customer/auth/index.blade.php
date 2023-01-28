<h1>Trang dành cho admin</h1>
<a href="{{ route('customers.logout') }}"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    đăng xuất
</a>
<form id="logout-form" action="{{ route('customers.logout')
}}" method="POST" class="d-none">
@csrf
</form>

<a href="{{ Auth::guard('customers')->check() ? route('store.cart') :  route('customers.login') }}">
    button
</a>
