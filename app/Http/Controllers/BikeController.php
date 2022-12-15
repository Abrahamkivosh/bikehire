<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Brand;
use App\Http\Requests\StoreBikeRequest;
use App\Http\Requests\UpdateBikeRequest;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::query()->with('brand')->get();
        return view('admins.bikes.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admins.bikes.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBikeRequest $request)
    {
        
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        
        Bike::create($data);
        session()->flash('success', 'Bike created successfully');
        return redirect()->route('bikes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        return view('admins.bikes.show', compact('bike'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        $brands = Brand::all();
        return view('admins.bikes.edit', compact('bike','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBikeRequest  $request
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBikeRequest $request, Bike $bike)
    {
        
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // delete old image
            $image_path = public_path('/images/'.$bike->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        $bike->update($data);
        session()->flash('success', 'Bike updated successfully');
        return redirect()->route('bikes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        $image_path = public_path('/images/'.$bike->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $bike->delete();
        session()->flash('success', 'Bike deleted successfully');
        return redirect()->route('bikes.index');
    }
}
