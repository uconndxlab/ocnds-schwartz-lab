<?php

namespace App\Http\Controllers;

use App\Models\Protein;
use Illuminate\Http\Request;

class ProteinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // all proteins, paginated (50 per page)
        $proteins = Protein::query();

        // Search by gene or protein_accession
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $proteins->where('gene', 'like', '%' . $searchTerm . '%')
                ->orWhere('protein_accession', 'like', '%' . $searchTerm . '%');
        }

        // Determine the column to order by and the order (order_by and order)
        $orderBy = $request->input('order_by', 'protein_accession'); // Default to 'protein_accession'
        $order = $request->input('order', 'asc'); // Default to ascending order

        // Apply ordering
        $proteins->orderBy($orderBy, $order);

        // Paginate the results
        $proteins = $proteins->paginate(50);

        
        

        return view('proteins.index', compact('proteins'));
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
    public function show(Protein $protein)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Protein $protein)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Protein $protein)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Protein $protein)
    {
        //
    }
}
