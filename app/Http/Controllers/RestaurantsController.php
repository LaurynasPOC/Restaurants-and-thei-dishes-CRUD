<?php

namespace App\Http\Controllers;

use App\Models\Restaurants;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function index(Request $request){
        if(isset($request->dish_id) && $request->dish_id !== 0)
            $restaurants = \App\Models\Restaurants::where('dish_id', $request->dish_id)->orderBy('title')->get();
        else
            $restaurants = \App\Models\Restaurants::orderBy('title')->get();
            $dishes = \App\Models\Dishes::get();
        return view('restaurants.index', ['restaurants' => $restaurants, 'dishes' => $dishes]);
    }
    public function create() {
        $dishes = \App\Models\Dishes::orderBy('title')->get();
        return view('restaurants.create', ['dishes' => $dishes]);
    }
    public function store(Request $request) {
        $this->validate($request, [
            
            'title' => 'required|unique:restaurants',
            'employees' => 'required',
            'customers' => 'required',
            'dish_id' => 'required',
        ]);
        $restaurant = new Restaurants();
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurants.index')->with('status_success', 'Restaurant created!');
    }
    public function edit(Restaurants $restaurant){
        $dishes = \App\Models\Dishes::orderBy('title')->get();
        return view('restaurants.edit', ['restaurants' => $restaurant], ['dishes' => $dishes]);
    }
 
    public function update(Request $request, Restaurants $restaurant){
        $this->validate($request, [
            
            'title' => 'required',
            'employees' => 'required',
            'customers' => 'required',
            'dish_id' => 'required',
        ]);
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurants.index')->with('status_success', 'Restaurant updated!');
    }
 
     public function destroy(Restaurants $restaurant){
         $restaurant->delete();
         return redirect()->route('restaurants.index');
     }
}
