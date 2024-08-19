@extends('layouts.app')
@section('title', 'Phosphorylations - ')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Phosphorylation</h1>
        </div>
        <!-- search form, on accession, gene description, and ensembl id -->
        <div class="col-md-12">
            <form 
            hx-get="{{ route('phosphorylations.index') }}"
            hx-trigger="keyup changed delay:500ms"
            hx-target="#search_results"
            hx-select="#search_results"
            autocomplete="off"
            action="{{ route('phosphorylations.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input
                    hx-get="{{ route('phosphorylations.index') }}"
                    hx-trigger="keyup changed delay:500ms"
                    hx-target="#search_results"
                    hx-select="#search_results" 
                    hx-trigger="keyup changed delay:500ms"
                    type="text" class="form-control" name="search" placeholder="Search Gene Name or Protein Accession" value="{{ request()->query('search') }}">
                </div>
            </form>
        </div>
    </div>

    <div class="row" id="search_results">
        @foreach($phosphorylations as $phosphorylation)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">{{ $phosphorylation->accession }}</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Accession</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->accession }}</dd>
                            <dt class="col-sm-4">Position</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->position }}</dd>
                            <dt class="col-sm-4">Gene Name</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->gene }}</dd>
                            <dt class="col-sm-4">Gene Description</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->gene_description }}</dd>
                            <dt class="col-sm-4">K198R S</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->k198r_s }}</dd>
                            <dt class="col-sm-4">K198R M</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->k198r_m }}</dd>
                            <dt class="col-sm-4">R47G</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->r47g }}</dd>
                            <dt class="col-sm-4">D156E</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->d156e }}</dd>
                            <dt class="col-sm-4">pval K198R S</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->pval_k198rs }}</dd>
                            <dt class="col-sm-4">pval K198R M</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->pval_k198rm }}</dd>
                            <dt class="col-sm-4">pval R47G</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->pval_r47g }}</dd>
                            <dt class="col-sm-4">pval D156E</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->pval_d156e }}</dd>
                            <dt class="col-sm-4">Modified Residue</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->modified_residue }}</dd>
                            <dt class="col-sm-4">Modified Position</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->modified_position }}</dd>
                            <dt class="col-sm-4">15mer</dt>
                            <dd class="col-sm-8">{{ $phosphorylation->fifteen_mer }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- pagination -->
            {{ $phosphorylations->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection