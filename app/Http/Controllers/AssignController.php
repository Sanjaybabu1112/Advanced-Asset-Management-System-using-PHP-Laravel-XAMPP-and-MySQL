<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Assets;
use App\Models\Employee;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function index()
    {
        $assigns = Assign::orderBy('id','desc')->get();
        $assets = Assets::orderBy('id', 'desc')->get();
        return view('assigns.index', compact('assigns', 'assets'));
    }

    public function create()
    {
        $options = Assets::all();
        $employees = Employee::all();
        return view('assigns.create', ['options' => $options, 'employees' => $employees]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset' => 'required',
            'employee' => 'required',
            'date' => 'required',
            'deadline' => 'required',
            'condition' => 'required',
        ]);

        // Parse asset details from request
        list($assetUid) = explode(',', $request->input('asset'));
        $asset = Assets::where('uid', trim($assetUid))->first();

        if ($asset) {
            $asset->condition = $request->input('condition');
            $asset->save();
        }

        Assign::create($request->all());

        return redirect()->route('assigns.index')->with('success', 'Assignment has been created successfully.');
    }

    public function show(Assign $assign)
    {
        return view('assigns.show', compact('assign'));
    }

    public function edit(Assign $assign)
    {
        $options = Assets::all();
        $employees = Employee::all();
        return view('assigns.edit', compact('options', 'employees', 'assign'));
    }

    public function update(Request $request, Assign $assign)
    {
        $request->validate([
            'asset' => 'required',
            'employee' => 'required',
            'date' => 'required',
            'deadline' => 'required',
            'condition' => 'required',
        ]);

        // Parse asset details from request
        list($assetUid) = explode(',', $request->input('asset'));
        $asset = Assets::where('uid', trim($assetUid))->first();

        if ($asset) {
            $asset->condition = $request->input('condition');
            $asset->save();
        }

        $assign->fill($request->all())->save();

        return redirect()->route('assigns.index')->with('success', 'Assignment has been updated successfully.');
    }

    public function destroy(Assign $assign)
    {
        $assign->delete();
        return redirect()->route('assigns.index')->with('success', 'Assignment has been deleted successfully.');
    }
}
