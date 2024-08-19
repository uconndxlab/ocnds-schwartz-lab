@extends('layouts.app')
@section('title', 'Proteins')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Proteins</h1>
            </div>
            <!-- search form, on accession, gene description, and ensembl id -->
            <!-- search form, on accession, gene description, and ensembl id -->
            <div class="col-md-12">
                <form 
                     autocomplete="off" action="{{ route('proteins.index') }}" method="GET">

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="search">Search</label>
                        <input type="text" class="form-control" name="search" id="search"
                        hx-trigger="keyup changed delay:500ms"
                        hx-get="{{ route('proteins.index') }}"
                        hx-target="#search_results"
                        hx-select="#search_results"
                        hx-include="#order_by, #order, #search"
                            placeholder="Search Gene Name or Protein Accession" value="{{ request()->query('search') }}">
                    </div>

                    <!-- order by accession, gene description, and ensembl id -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="order_by">Compare Field</label>
                        <select class="form-select" name="order_by" id="order_by"
                            hx-get="{{ route('proteins.index') }}"
                            hx-trigger="change"
                            hx-target="#search_results"
                            hx-select="#search_results"
                            hx-include="#order, #search, #order_by">
                            <option value="protein_accession"
                                {{ request()->query('order_by') == 'protein_accession' ? 'selected' : '' }}>Accession
                            </option>
                            <option value="k198r_s" {{ request()->query('order_by') == 'k198r_s' ? 'selected' : '' }}>K198r
                                S</option>
                            <option value="k198r_m" {{ request()->query('order_by') == 'k198r_m' ? 'selected' : '' }}>K198r
                                M</option>
                            <option value="r47g" {{ request()->query('order_by') == 'r47g' ? 'selected' : '' }}>R47G
                            </option>
                            <option value="d156e" {{ request()->query('order_by') == 'd156e' ? 'selected' : '' }}>D156E
                            </option>
                            <option value="pval_k198rs"
                                {{ request()->query('order_by') == 'pval_k198rs' ? 'selected' : '' }}>Pval K198r S</option>
                            <option value="pval_k198rm"
                                {{ request()->query('order_by') == 'pval_k198rm' ? 'selected' : '' }}>Pval K198r M</option>
                            <option value="pval_r47g" {{ request()->query('order_by') == 'pval_r47g' ? 'selected' : '' }}>
                                Pval R47G</option>
                            <option value="pval_d156e"
                                {{ request()->query('order_by') == 'pval_d156e' ? 'selected' : '' }}>Pval D156E</option>
                        </select>

                        <label class="input-group-text" for="order">Sort Direction</label>
                        <select 
                        hx-get="{{ route('proteins.index') }}"
                        hx-trigger="change"
                        hx-target="#search_results"
                        hx-select="#search_results"
                        hx-include="#order_by, #search, #order"
                        class="form-select" name="order" id="order">
                            <option value="asc" {{ request()->query('order') == 'asc' ? 'selected' : '' }}>Lowest First
                            </option>
                            <option value="desc" {{ request()->query('order') == 'desc' ? 'selected' : '' }}>Highest
                                First</option>
                        </select>
                    </div>
                </form>

            </div>
        </div>
        <div class="row data" id="search_results">
            @foreach ($proteins as $protein)
                <div class="col-md-4 py-3" data-result-id = "{{ $protein->id }}">
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
