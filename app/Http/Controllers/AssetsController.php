<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Http\Request;
use App\Models\Assign;

class AssetsController extends Controller
{
    public function index()
    {
        $assets = Assets::orderBy('id', 'desc')->get();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'uid' => 'required|unique:assets',
            'brand' => 'required',
            'model' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specification1' => 'nullable',
            'specification2' => 'nullable',
            'specification3' => 'nullable',
            'specification4' => 'nullable',
            'dop' => 'required',
            'cost' => 'required',
            'warranty' => 'nullable',
            'condition' => 'required',
        ]);

        if (Assets::where('uid', $request->uid)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Asset with this UID already exists.');
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName; 
        }

        $asset = new Assets();
        $asset->type = $request->type;
        $asset->uid = $request->uid;
        $asset->brand = $request->brand;
        $asset->model = $request->model;
        $asset->image = $imagePath;
        $asset->specification1 = $request->specification1;
        $asset->specification2 = $request->specification2;
        $asset->specification3 = $request->specification3;
        $asset->specification4 = $request->specification4;
        $asset->dop = $request->dop;
        $asset->cost = $request->cost;
        $asset->warranty = $request->warranty;
        $asset->condition = $request->condition;
        $asset->save();

        return redirect()->route('assets.index')->with('success', 'Asset has been created successfully.');
    }

    public function show(Assets $asset)
    {
        return view('assets.show', compact('asset'));
    }

    public function edit(Assets $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, Assets $asset)
    {
        $request->validate([
            'type' => 'required',
            'uid' => 'required',
            'brand' => 'required',
            'model' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specification1' => 'nullable',
            'specification2' => 'nullable',
            'specification3' => 'nullable',
            'specification4' => 'nullable',
            'dop' => 'required',
            'cost' => 'required',
            'warranty' => 'nullable',
            'condition' => 'required',
        ]);

        try {
            $asset->type = $request->type;
            $asset->uid = $request->uid;
            $asset->brand = $request->brand;
            $asset->model = $request->model;
            $asset->specification1 = $request->specification1;
            $asset->specification2 = $request->specification2;
            $asset->specification3 = $request->specification3;
            $asset->specification4 = $request->specification4;
            $asset->dop = $request->dop;
            $asset->cost = $request->cost;
            $asset->warranty = $request->warranty;
            $asset->condition = $request->condition;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $asset->image = 'images/' . $imageName;
            }

            $asset->save();
            return redirect()->route('assets.index')->with('success', 'Asset has been updated successfully');
            
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error updating asset: ' . $e->getMessage());
        }
    }

    public function destroy(Assets $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Asset has been deleted successfully');
    }
}
