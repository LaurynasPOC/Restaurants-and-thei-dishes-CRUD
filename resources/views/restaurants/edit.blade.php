@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update restaurant info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restaurants.update', $restaurants->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $restaurants->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Employees count</label>
                            <input type="number" name="employees" class="form-control" value="{{ $restaurants->employees }}">
                        </div>
                        <div class="form-group">
                            <label for=""> Average customers count</label>
                            <input type="number" name="customers" class="form-control" value="{{ $restaurants->customers }}">
                        </div>
                        <div class="form-group">
                            <label>Dishes: </label>
                            <select name="dish_id" id="" class="form-control">
                                 <option value="" selected disabled>Choose dish</option>
                                 @foreach ($dishes as $dish)
                                <option value="{{ $dish->id }}" @if($dish->id == $restaurants->dish_id) selected="selected" @endif>{{ $dish->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
