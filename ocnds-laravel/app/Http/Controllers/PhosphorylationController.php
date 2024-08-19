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
    
        // Search by gene or accession
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $phosphorylations->where('gene', 'like', '%' . $searchTerm . '%')
                ->orWhere('accession', 'like', '%' . $searchTerm . '%');
        }
    
        // Determine the column to order by
        $orderBy = $request->input('order_by', 'accession'); // Default to 'accession'
        $order = $request->input('order', 'asc'); // Default to ascending order
    
        // Apply ordering
        $phosphorylations->orderBy($orderBy, $order);
    
        // Paginate the results
        $phosphorylations = $phosphorylations->paginate(50);
    
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
