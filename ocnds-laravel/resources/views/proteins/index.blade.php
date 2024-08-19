@extends('layouts.app')
@section('title', 'Proteins')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <h1>Proteins</h1>
            </div>
            <!-- search form, on accession, gene description, and ensembl id -->
            <div class="col-md-12">
                <form 
                hx-get="{{ route('proteins.index') }}"
                hx-trigger="keyup changed delay:500ms"
                hx-target="#search_results"
                hx-select="#search_results"
                autocomplete="off"
                action="{{ route('proteins.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input
                        hx-get="{{ route('proteins.index') }}"
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
            @foreach ($proteins as $protein)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $protein->protein_accession }}</h5>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Ensembl ID</dt>
                                <dd class="col-sm-8">{{ $protein->ensembl_id }}</dd>
                                <dt class="col-sm-4">Gene Name</dt>
                                <dd class="col-sm-8">{{ $protein->gene }}</dd>
                                <dt class="col-sm-4">Gene Description</dt>
                                <dd class="col-sm-8">{{ $protein->gene_description }}</dd>
                                <dt class="col-sm-4">K198R S</dt>
                                <dd class="col-sm-8">{{ $protein->k198r_s }}</dd>
                                <dt class="col-sm-4">K198R M</dt>
                                <dd class="col-sm-8">{{ $protein->k198r_m }}</dd>
                                <dt class="col-sm-4">R47G</dt>
                                <dd class="col-sm-8">{{ $protein->r47g }}</dd>
                                <dt class="col-sm-4">D156E</dt>
                                <dd class="col-sm-8">{{ $protein->d156e }}</dd>
                                <dt class="col-sm-4">pval K198R S</dt>
                                <dd class="col-sm-8">{{ $protein->pval_k198rs }}</dd>
                                <dt class="col-sm-4">pval K198R M</dt>
                                <dd class="col-sm-8">{{ $protein->pval_k198rm }}</dd>
                                <dt class="col-sm-4">pval R47G</dt>
                                <dd class="col-sm-8">{{ $protein->pval_r47g }}</dd>
                                <dt class="col-sm-4">pval D156E</dt>
                                <dd class="col-sm-8">{{ $protein->pval_d156e }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- pagination -->
                {{ $proteins->links('pagination::bootstrap-5') }}
            </div>
        </div>


    @endsection