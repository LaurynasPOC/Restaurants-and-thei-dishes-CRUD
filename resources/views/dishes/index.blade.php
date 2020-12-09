@extends('layouts.app')
@section('content')
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

@if ($errors->any())

<div>
    @foreach ($errors->all() as $error)
        <p style="color: red">{{ $error }}</p>
    @endforeach
</div>
@endif

<div class="card-body">
    <form class="form-inline" action="{{ route('dishes.index') }}">
        <div class="form-group">
            <input class="form-control" type="text" name='title' placeholder="Search dish...">
            <input class="btn btn-primary m-2" type="submit" value="Search">
        </div>
    </form>
    <div class="table-responsive mx-3">
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Meat weight</th>
            <th>About</th>
            <th>Actions</th>
        </tr>
        @foreach ($dishes as $dish)
        <tr>
            <td scope="row">{{ $dish->title }}</td>
            <td>{{ $dish->price.'eur' }}</td>
            <td>{{ $dish->weight.'g' }}</td>
            <td>{{ $dish->meat.'g' }}</td>
            <td>{{ $dish->about }}</td>
            <td>
                <form action={{ route('dishes.destroy', $dish->id) }} method="POST">
                    <a class="update" class="btn btn-success" href={{ route('dishes.edit', $dish->id) }}>Update</a>
                    @csrf @method('delete')
                    <input class="delete" type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
</div>
    <div class="mx-3">
        <a class="create" href="{{ route('dishes.create') }}" class="btn btn-success">Add new</a>
    </div>
</div>
@endsection
