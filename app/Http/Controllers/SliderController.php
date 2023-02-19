<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateSlider;
use Illuminate\Support\Facades\Hash;

class SliderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc');
        $sliders = $sliders->paginate(50);

        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateSlider $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $validated['image'] = $fileName;

            // move file
            $request->image->move(public_path('uploads/images'), $fileName);
        }

        $slider = Slider::create($validated);

        return redirect(route('sliders.index'))->with('success', 'Slider berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Slider::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateSlider $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $slider = Slider::findOrFail($id);

        $validated['image'] = $slider->image;

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $validated['image'] = $fileName;

            // move file
            $request->image->move(public_path('uploads/images'), $fileName);
            
            // delete old file
            $oldPath = public_path('/uploads/images/'.$slider->image);
            if(file_exists($oldPath) && $slider->image != 'default.png'){
                unlink($oldPath);
            }
        }

        $slider->update($validated);

        return redirect(route('sliders.index'))->with('success', 'Slider berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/images/'.$slider->image);
        if(file_exists($oldPath) && $slider->image != 'default.png'){
            unlink($oldPath);
        }
        $slider->delete();

        return redirect(route('sliders.index'))->with('success', 'Slider berhasil dihapus.');
    }
}
