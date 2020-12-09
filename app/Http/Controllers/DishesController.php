<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function index(Request $request) {
        // $project = Project::query();
        // if (request('term')) {
        //     $project->where('name', 'Like', '%' . request('term') . '%');
        // }

        // return $project->orderBy('id', 'DESC')->paginate(10);
        if(isset($request->title) && $request->title !== 0)
        $dishes = \App\Models\Dishes::where('title', 'Like', '%'.$request->title.'%')->get();
        else
        $dishes = \App\Models\Dishes::orderBy('title')->get();
        return view('dishes.index', ['dishes' => $dishes]);
        
    }
    public function create() {
        return view('dishes.create');
    }
    
    public function store(Request $request) {
        $dish = new Dishes();
        if($request->weight < $request->meat){
            return back()->withErrors('Meat weight cannot be bigger');
        }
     // can be used for seeing the insides of the incoming request
         // dd($request->all()); die();
        $dish->fill($request->all());
        $dish->save();
        return redirect()->route('dishes.index')->with('status_success', 'New dish added!');
    }
    public function edit(Dishes $dish){
        return view('dishes.edit', ['dish' => $dish]);
    }
 
    public function update(Request $request, Dishes $dish){
        $dish->fill($request->all());
        $dish->save();
        return redirect()->route('dishes.index')->with('status_success', 'Dish updated!');
    }
 
     public function destroy(Dishes $dish){
    
            $dish->delete();
            return redirect()->route('dishes.index')->with('status_success', 'Dish Deleted!');
         
         
     }
 
 
}
