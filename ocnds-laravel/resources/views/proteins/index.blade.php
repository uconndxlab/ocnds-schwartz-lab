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
                    <div class="d-none input-group mb-3">
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
            <div class="col-md-12">
                <!-- pagination -->
                {{ $proteins->links('pagination::bootstrap-5') }}
            </div>
            {{-- @foreach ($proteins as $protein)
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
            @endforeach--}}

            <!-- table scroller button -->
            <div class="col-md-12 table-scroller space-around mb-3">
                <!-- btn group for left and right scroll -->
                <div class="btn-group" role="group" aria-label="Basic example">
                    <!-- icon buttons for scrolling -->
                    <button type="button" class="btn btn-secondary" id="scrollLeft">
                        <i class="bi bi-arrow-left"></i>

                        Scroll Left
                    </button>

                    <button type="button" class="btn btn-secondary" id="scrollRight">
                         Scroll Right
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'protein_accession', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Accession
                                    @if(request()->query('order_by') == 'protein_accession')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'ensembl_id', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Ensembl ID
                                    @if(request()->query('order_by') == 'ensembl_id')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'gene', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Gene Name
                                    @if(request()->query('order_by') == 'gene')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'gene_description', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Gene Description
                                    @if(request()->query('order_by') == 'gene_description')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'k198r_s', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    K198R S
                                    @if(request()->query('order_by') == 'k198r_s')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'k198r_m', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    K198R M
                                    @if(request()->query('order_by') == 'k198r_m')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'r47g', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    R47G
                                    @if(request()->query('order_by') == 'r47g')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'd156e', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    D156E
                                    @if(request()->query('order_by') == 'd156e')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'pval_k198rs', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Pval K198R S
                                    @if(request()->query('order_by') == 'pval_k198rs')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'pval_k198rm', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Pval K198R M
                                    @if(request()->query('order_by') == 'pval_k198rm')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'pval_r47g', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Pval R47G
                                    @if(request()->query('order_by') == 'pval_r47g')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('proteins.index', ['order_by' => 'pval_d156e', 'order' => request()->query('order') == 'desc' ? 'asc' : 'desc']) }}">
                                    Pval D156E
                                    @if(request()->query('order_by') == 'pval_d156e')
                                        @if(request()->query('order') == 'desc')
                                            <i class="bi bi-caret-down-fill"></i>
                                        @else
                                            <i class="bi bi-caret-up-fill"></i>
                                        @endif
                                    @endif
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proteins as $protein)
                            <tr>
                                <td>{{ $protein->protein_accession }}</td>
                                <td>{{ $protein->ensembl_id }}</td>
                                <td>{{ $protein->gene }}</td>
                                <td>{{ $protein->gene_description }}</td>
                                <td>{{ $protein->k198r_s }}</td>
                                <td>{{ $protein->k198r_m }}</td>
                                <td>{{ $protein->r47g }}</td>
                                <td>{{ $protein->d156e }}</td>
                                <td>{{ $protein->pval_k198rs }}</td>
                                <td>{{ $protein->pval_k198rm }}</td>
                                <td>{{ $protein->pval_r47g }}</td>
                                <td>{{ $protein->pval_d156e }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <!-- pagination -->
                {{ $proteins->links('pagination::bootstrap-5') }}
            </div>   <!-- as a table -->
        </div> 



    </div>


    <script>
        // table scroller
        const table = document.querySelector('.table-responsive');
        const scrollRight = document.getElementById('scrollRight');
        const scrollLeft = document.getElementById('scrollLeft');

        function scrollTable(direction) {
            const scrollAmount = 100;
            const scrollLeft = direction === 'left';
            const scrollRight = direction === 'right';

            if (scrollLeft) {
            table.scrollLeft -= scrollAmount;
            }

            if (scrollRight) {
            table.scrollLeft += scrollAmount;
            }
        }

        function attachScroll(){
            scrollRight.addEventListener('click', () => {
                scrollTable('right');
            });

            scrollLeft.addEventListener('click', () => {
                scrollTable('left');
            });
        }

        attachScroll();
        
    </script>
@endsection
