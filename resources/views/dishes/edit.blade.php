@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update dish info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dishes.update', $dish->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $dish->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" step=".01" name="price" class="form-control" value="{{ $dish->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Weight</label>
                            <input type="number" name="weight" class="form-control" value="{{ $dish->weight }}">
                        </div>
                        <div class="form-group">
                            <label for="">Meat weight</label>
                            <input type="number" name="meat" class="form-control" value="{{ $dish->meat }}">
                        </div>
                        <div class="form-group">
                            <label for="">About</label>
                            <textarea type="text" name="about" rows=10 cols=100 class="form-control">{{ $dish->about }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
