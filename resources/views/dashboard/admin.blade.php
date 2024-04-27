@extends("layout.layout")
@section("title", "Dashboard")
@section("content")
<div class="container">
    <section>
        <div class="container-fluid h-custom pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>WELCOME ADMIN</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">Logout</button>
                </form>
            </div>

            <h1 class="mt-5">Users</h1>

            @if(session() -> has("success"))
            <div class="alert alert-success" role="alert">
                {{session() -> get("success")}}
            </div>
            @endif

            @if(session() -> has("error"))
            <div class="alert alert-danger" role="alert">
                {{session() -> get("error")}}
            </div>
            @endif

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>

                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>

                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>#{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('user.updateRole', $user) }}">
                                @csrf
                                @method('PATCH')
                                <select name="role_id" onchange="this.form.submit()">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>


                        <td>
                            <form method="POST" action="{{ route('user.delete', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
</div>

@endsection