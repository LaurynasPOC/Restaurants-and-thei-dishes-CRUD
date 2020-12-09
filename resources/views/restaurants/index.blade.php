@extends('layouts.app')
@section('content')
<style>
    input{
    border: none;
    border-bottom: 2px solid red;
   
    }
    select {
        border-radius: 15px;
        outline: none;
        border-bottom: 2px solid red;

    }
    option {
        border: none;
        outline: none;
    }

    
</style> 
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
    <form class="form-inline" action="{{ route('restaurants.index') }}" method="GET">
        <select name="dish_id" id="" class="form-control">
            <option value="" selected disabled>Dishes filter:</option>
            @foreach ($dishes as $dish)
            <option value="{{ $dish->id }}" 
                @if($dish->id == app('request')->input('dish_id')) 
                    selected="selected" 
                @endif>{{ $dish->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mx-2">Filter dishes</button>
    </form>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col-2">Title</th>
                <th scope="col-3">Employees count</th>
                <th scope="col-3">Ave. Customers count</th>
                <th scope="col-3">Main dish</th>
                <th scope="col-4">Actions</th>
            </tr>
        </thead>
        @foreach ($restaurants as $restaurant)
        <tbody>
        
        <tr>
            <td>{{ $restaurant->title }}</td>
            <td>{{ $restaurant->employees }}</td>
            <td>{{ $restaurant->customers }}</td>
            <td>{{ $restaurant->dishes['title'] }}</td>
            <td>
                <form action={{ route('restaurants.destroy', $restaurant->id) }} method="POST">
                    <a class="update" class="btn btn-success" href={{ route('restaurants.edit', $restaurant->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="delete" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
      
    </table>
</div>
<div class="mx-5" ><a class="create" href="{{ route('restaurants.create') }}" >Add new restaurant</a></div>


</tbody>   
@endsection