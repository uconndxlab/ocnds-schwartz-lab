@extends('layouts.app')
@section('title', 'Phosphorylations - ')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Phosphorylation</h1>
            </div>
            <!-- search form, on accession, gene description, and ensembl id -->
            <div class="col-md-12">
                <form hx-target="#search_results" hx-select="#search_results" autocomplete="off"
                    action="{{ route('phosphorylations.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="search">Search</label>
                        <input hx-get="{{ route('phosphorylations.index') }}" hx-trigger="keyup change delay:500ms"
                            hx-target="#search_results" hx-select="#search_results" type="text" class="form-control"
                            name="search" placeholder="Search Gene Name or Protein Accession"
                            value="{{ request()->query('search') }}">
                    </div>
                    <!-- order by accession, gene description, and ensembl id -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="order_by">Order By</label>
                        <select
                            hx-get="{{ route('phosphorylations.index') }}?search={{ request()->query('search') }}&order_by="
                            hx-trigger="change delay:500ms" hx-target="#search_results" hx-select="#search_results"
                            class="form-select" name="order_by">
                            <!-- k198RS and all the pvals: k198r_s',
            'k198r_m',
            'r47g',
            'd156e',
            'pval_k198rs',
            'pval_k198rm',
            'pval_r47g',
            'pval_d156e', -->

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
                    </div>
                </form>
            </div>


        </div>

        <div class="row data" id="search_results">
            @foreach ($phosphorylations as $phosphorylation)
                <div class="col-md-4 py-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Accession: {{ $phosphorylation->accession }}</h5>
                        </div>
                        <div class="card-body">
                            <dl>
                                <dt>Accession</dt>
                                <dd>{{ $phosphorylation->accession }}</dd>
                                <dt>Position</dt>
                                <dd>{{ $phosphorylation->position }}</dd>
                                <dt>Gene Name</dt>
                                <dd>{{ $phosphorylation->gene }}</dd>
                                <dt>Gene Description</dt>
                                <dd>{{ $phosphorylation->gene_description }}</dd>
                                <dt>K198R S</dt>
                                <dd>{{ $phosphorylation->k198r_s }}</dd>
                                <dt>K198R M</dt>
                                <dd>{{ $phosphorylation->k198r_m }}</dd>
                                <dt>R47G</dt>
                                <dd>{{ $phosphorylation->r47g }}</dd>
                                <dt>D156E</dt>
                                <dd>{{ $phosphorylation->d156e }}</dd>
                                <dt>pval K198R S</dt>
                                <dd>{{ $phosphorylation->pval_k198rs }}</dd>
                                <dt>pval K198R M</dt>
                                <dd>{{ $phosphorylation->pval_k198rm }}</dd>
                                <dt>pval R47G</dt>
                                <dd>{{ $phosphorylation->pval_r47g }}</dd>
                                <dt>pval D156E</dt>
                                <dd>{{ $phosphorylation->pval_d156e }}</dd>
                                <dt>Modified Residue</dt>
                                <dd>{{ $phosphorylation->modified_residue }}</dd>
                                <dt>Modified Position</dt>
                                <dd>{{ $phosphorylation->modified_position }}</dd>
                                <dt>15mer</dt>
                                <dd>{{ $phosphorylation->fifteen_mer }}</dd>
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
    </div>
@endsection
