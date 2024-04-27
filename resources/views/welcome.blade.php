@extends("layout.layout")
@section("title", "Home")
@section("content")
<div class="container">
    <section>
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <img style="width:450px;"  src="{{asset('images/portada.jpg')}}"  class="img-fluid rounded shadow" alt="Sample image">
            </div>
            <div class="col-md-7">
                <div class="jumbotron">
                    <h1 class="display-5">Welcome to Real Madrid Website!</h1>
                    <p class="lead">Join our community and share your thoughts with the world.</p>
                    <hr class="my-4">
                    <p>Click the button below to login and start exploring.</p>
                    <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login</a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection