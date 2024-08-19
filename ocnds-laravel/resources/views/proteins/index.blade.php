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
                            <option value="id"
                                {{ request()->query('order_by') == 'id' ? 'selected' : '' }}>Default Order
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

                            <option value="desc" {{ request()->query('order') == 'desc' ? 'selected' : '' }}>Highest
                                First</option>

                                <option value="asc" {{ request()->query('order') == 'asc' ? 'selected' : '' }}>Lowest First
                                </option>
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
                            <h5 class="card-title">Accession: <span class="badge bg-dark">{{ $protein->protein_accession }}</span></h5>
                        </div>
                        <div class="card-body">
                            <dl>
                                <dt class="result__ensembl_id"> Ensembl ID</dt>
                                <dd>{{ $protein->ensembl_id }}</dd>
                                <dt class="result__gene">Gene Name</dt>
                                <dd>{{ $protein->gene }}</dd>
                                <dt class="result__gene_description">Gene Description</dt>
                                <dd>{{ $protein->gene_description }}</dd>


                                <dt class="result__k198r_s {{ request()->query('order_by') == 'k198r_s' ? 'active' : '' }}">
                                    K198R S
                                </dt>
                                <dd>{{ $protein->k198r_s }}</dd>

                                <dt class="result__k198r_m {{ request()->query('order_by') == 'k198r_m' ? 'active' : '' }}">
                                    K198R M
                                </dt>
                                <dd>{{ $protein->k198r_m }}</dd>

                                <dt class="result__r47g {{ request()->query('order_by') == 'r47g' ? 'active' : '' }}">
                                    R47G
                                </dt>
                                <dd>{{ $protein->r47g }}</dd>

                                <dt class="result__d156e {{ request()->query('order_by') == 'd156e' ? 'active' : '' }}">
                                    D156E
                                </dt>
                                <dd>{{ $protein->d156e }}</dd>
                                                            
                                <dt class="result__pval_k198rs {{ request()->query('order_by') == 'pval_k198rs' ? 'active' : '' }}">
                                    PVal: K198R S
                                </dt>
                                <dd>{{ $protein->pval_k198rs }}</dd>

                                <dt class="result__pval_k198rm {{ request()->query('order_by') == 'pval_k198rm' ? 'active' : '' }}">
                                    PVal: K198R M
                                </dt>
                                <dd>{{ $protein->pval_k198rm }}</dd>

                                <dt class="result__pval_r47g {{ request()->query('order_by') == 'pval_r47g' ? 'active' : '' }}">
                                    PVal: R47G
                                </dt>
                                <dd>
                                    {{ $protein->pval_r47g }}
                                </dd>

                                <dt class="result__pval_d156e {{ request()->query('order_by') == 'pval_d156e' ? 'active' : '' }}">
                                    PVal: D156E
                                </dt>
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
