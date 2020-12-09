@extends('layouts.app')
@section('content')
<div class="container">
@if($errors->any())
<h4 style="color: red">{{$errors->first()}}</h4>
@endif
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New dish info:</div>
               <div class="card-body">
                   <form action="{{ route('dishes.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Title: </label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Price: </label>
                           <input type="number" step=".01" name="price" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Weight: </label>
                           <input type="number" name="weight" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Meat weight: </label>
                           <input type="number" name="meat" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>About: </label>
                           <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">Add new</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
