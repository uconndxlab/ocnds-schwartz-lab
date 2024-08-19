<?php

namespace App\Http\Controllers;

use App\Models\Phosphorylation;
use Illuminate\Http\Request;

class PhosphorylationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $phosphorylations = Phosphorylation::query();

        // search it on gene or accession
        if ($request->has('search')) {
            $phosphorylations->where('gene', 'like', '%' . $request->search . '%')
                ->orWhere('accession', 'like', '%' . $request->search . '%');
        }

        // order by request var
        if ($request->has('order_by')) {
            $order_by = $request->order_by;
            $phosphorylations->orderBy($order_by);
        } else {
            $phosphorylations->orderBy('accession');
        }

        $phosphorylations = $phosphorylations->paginate(50);

        return view('phosphorylations.index', compact('phosphorylations'));



        return view('phosphorylations.index', compact('phosphorylations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Phosphorylation $phosphorylation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phosphorylation $phosphorylation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phosphorylation $phosphorylation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phosphorylation $phosphorylation)
    {
        //
    }
}
