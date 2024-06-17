
@auth
<!--a href="/">Inicio</a>
<a href="/dashboard">Dashboard</a>

    <form action="/logout" method="POST">
    @csrf
    
    <a href="/login" onclick="this.closest('form').submit()">Logout</a>
    </form>

@else    
<a href="/login">Login</a-->
@endauth



