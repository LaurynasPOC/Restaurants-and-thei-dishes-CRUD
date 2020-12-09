@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add new rastaurant:</div>
               <div class="card-body">
                   <form action="{{ route('restaurants.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                            <label for="">Title: </label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Employees count: </label>
                            <input type="number" name="employees" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Average customers count: </label>
                            <input type="number" name="customers" class="form-control">
                        </div>
                       <div class="form-group">
                           <label>Main dish: </label>
                           <select name="dish_id" id="" class="form-control">
                                <option value="" selected disabled>Main dish</option>
                                @foreach ($dishes as $dish)
                                <option value="{{ $dish->id }}">{{ $dish->title }}</option>
                                @endforeach
                           </select>
                       </div>
                       <button type="submit" class="btn btn-primary">Add new</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
