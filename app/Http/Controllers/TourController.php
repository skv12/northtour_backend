<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourType;

class TourController extends Controller
{
    //
    public function index(){
        $tours = TourType::paginate(10);
        return view('tours.index', compact('tours'));
    }

    public function create(){
        // Tour::create([
        //     'title' => 'test',
        //     'active' => 1,
        //     'type_id' => 1,
        //     'description' => 'test description',
        // ]);
        return view('tours.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'active' => 'boolean',
            'type_id' => 'required|integer',
            'description' => 'required|string',
        ]);
        $packages = $data['packages'];
        $tour = Tour::create($data);
        $tour->packages()->attach($packages);
        return redirect()->route('tours.index');
    }

    public function show(Tour $tour){
        return view('tour.show', compact('tour'));
    }

    public function edit(Tour $tour){
        $data = request()->validate([
            'title' => 'string',
            'active' => 'boolean',
            'type_id' => 'integer',
            'description' => 'string',
        ]);
        $packages = $data['packages'];
        $tour = Tour::create($data);
        $tour->packages()->sync($packages);
        return view('tour.edit', compact('tour'));
    }

    public function update(Tour $tour){
        $data = request()->validate([
            'title' => 'string',
            'active' => 'boolean',
            'type_id' => 'integer',
            'description' => 'string',
        ]);
        $tour->update($data);
        return redirect()->route('tours.show', $tour->id);
    }

    public function delete(){
        $tour = Tour::find(1);
        $tour->delete();
    }

    public function destroy(Tour $tour){
        $tour->delete();
        return redirect()->route('tours.index');
    }

    public function firstOrCreate(){
        $tour = Tour::firstOrCreate([
            'title' => 'test'
        ],[
            'title' => 'test',
            'active' => 1,
            'type_id' => 1,
            'description' => 'text description',
        ]);
        dump($tour);
    }

    public function updateOrCreate(){
        $tour = Tour::updateOrCreate([
            'title' => 'test'
        ],[
            'title' => 'test',
            'active' => 1,
            'type_id' => 1,
            'description' => 'text description updated',
        ]);
        dump($tour);
    }
}
