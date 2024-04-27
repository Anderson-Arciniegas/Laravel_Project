@extends("layout.layout")
@section("title", "Dashboard")
@section("content")
<div class="container">
    <section>
        <div class="container-fluid h-custom pt-5">
            <h1>Welcome Real Madrid partner!</h1>
            @if(Auth::check())
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ Auth::user()->name }}</h5>
                        <h3 class="card-subtitle mb-2 text-muted">{{ Auth::user()->email }}</h6>

                </div>
            </div>
            @else
            <h1>Welcome, guest!</h1>
            @endif
            <form class="mt-5" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">Logout</button>
            </form>
        </div>
    </section>
</div>

@endsection