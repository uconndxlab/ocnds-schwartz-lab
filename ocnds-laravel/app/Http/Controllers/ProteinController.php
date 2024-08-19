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
        $proteins = Protein::paginate(50);

        // if the request contains a search term, fuzzy search on Gene Name or Protein Accession
        if ($request->has('search')) {
            $proteins = Protein::where('gene', 'like', '%' . $request->search . '%')
                ->orWhere('protein_accession', 'like', '%' . $request->search . '%')
                ->orderBy('protein_accession')
                ->paginate(50);
        }
        

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
