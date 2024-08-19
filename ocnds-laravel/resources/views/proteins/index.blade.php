@extends('layouts.app')
@section('title', 'Proteins')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Proteins</h1>
            </div>
            <!-- search form, on accession, gene description, and ensembl id -->
            <div class="col-md-12">
                <form hx-get="{{ route('proteins.index') }}" hx-trigger="keyup changed delay:500ms" hx-target="#search_results"
                    hx-select="#search_results" autocomplete="off" action="{{ route('proteins.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input hx-get="{{ route('proteins.index') }}" hx-trigger="keyup changed delay:500ms"
                            hx-target="#search_results" hx-select="#search_results" hx-trigger="keyup changed delay:500ms"
                            type="text" class="form-control" name="search"
                            placeholder="Search Gene Name or Protein Accession" value="{{ request()->query('search') }}">
                    </div>
                </form>
            </div>
        </div>
        <div class="row data" id="search_results">
            @foreach ($proteins as $protein)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Accession: {{ $protein->protein_accession }}</h5>
                        </div>
                        <div class="card-body">
                            <dl>
                                <dt>Ensembl ID</dt>
                                <dd>{{ $protein->ensembl_id }}</dd>
                                <dt>Gene Name</dt>
                                <dd>{{ $protein->gene }}</dd>
                                <dt>Gene Description</dt>
                                <dd>{{ $protein->gene_description }}</dd>
                                <dt>K198R S</dt>
                                <dd>{{ $protein->k198r_s }}</dd>
                                <dt>K198R M</dt>
                                <dd>{{ $protein->k198r_m }}</dd>
                                <dt>R47G</dt>
                                <dd>{{ $protein->r47g }}</dd>
                                <dt>D156E</dt>
                                <dd>{{ $protein->d156e }}</dd>
                                <dt>pval K198R S</dt>
                                <dd>{{ $protein->pval_k198rs }}</dd>
                                <dt>pval K198R M</dt>
                                <dd>{{ $protein->pval_k198rm }}</dd>
                                <dt>pval R47G</dt>
                                <dd>{{ $protein->pval_r47g }}</dd>
                                <dt>pval D156E</dt>
                                <dd>{{ $protein->pval_d156e }}</dd>
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
    </div>


@endsection
