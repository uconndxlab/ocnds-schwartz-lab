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
                <form autocomplete="off" action="{{ route('phosphorylations.index') }}" method="GET">

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="search">Search</label>
                        <input type="text" class="form-control" name="search" id="search"
                            hx-trigger="keyup changed delay:500ms" hx-get="{{ route('phosphorylations.index') }}"
                            hx-target="#search_results" hx-select="#search_results" hx-include="#order_by, #order, #search"
                            placeholder="Search Gene Name or Protein Accession" value="{{ request()->query('search') }}">
                    </div>

                    <!-- order by accession, gene description, and ensembl id -->
                    <div class="input-group mb-3 d-none">
                        <label class="input-group-text" for="order_by">Compare Field</label>
                        <select class="form-select" name="order_by" id="order_by"
                            hx-get="{{ route('phosphorylations.index') }}" hx-trigger="change" hx-target="#search_results"
                            hx-select="#search_results" hx-include="#order, #search, #order_by">
                            <option value="id" {{ request()->query('order_by') == 'id' ? 'selected' : '' }}>Default
                                Order
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
                        <select hx-get="{{ route('phosphorylations.index') }}" hx-trigger="change"
                            hx-target="#search_results" hx-select="#search_results" hx-include="#order_by, #search, #order"
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
                {{ $phosphorylations->links('pagination::bootstrap-5') }}
            </div>
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
                            <th scope="col">Accession</th>
                            <th scope="col">Position</th>
                            <th scope="col">Gene Name</th>
                            <th scope="col">Gene Description</th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'k198r_s', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    K198R S
                                    @if(request()->query('order_by') == 'k198r_s')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'k198r_m', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    K198R M
                                    @if(request()->query('order_by') == 'k198r_m')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'r47g', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    R47G
                                    @if(request()->query('order_by') == 'r47g')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'd156e', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    D156E
                                    @if(request()->query('order_by') == 'd156e')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'pval_k198rs', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    Pval K198R S
                                    @if(request()->query('order_by') == 'pval_k198rs')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'pval_k198rm', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    Pval K198R M
                                    @if(request()->query('order_by') == 'pval_k198rm')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'pval_r47g', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    Pval R47G
                                    @if(request()->query('order_by') == 'pval_r47g')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">
                                <a href="{{ route('phosphorylations.index', ['order_by' => 'pval_d156e', 'order' => request()->query('order') == 'asc' ? 'desc' : 'asc']) }}">
                                    Pval D156E
                                    @if(request()->query('order_by') == 'pval_d156e')
                                        <i class="bi bi-caret-{{ request()->query('order') == 'asc' ? 'down' : 'up' }}-fill"></i>
                                    @endif
                                </a>
                            </th>
                            <th scope="col">Modified Residue</th>
                            <th scope="col">Modified Position</th>
                            <th scope="col">15mer</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($phosphorylations as $phosphorylation)
                            <tr>
                                <td>{{ $phosphorylation->accession }}</td>
                                <td>{{ $phosphorylation->position }}</td>
                                <td>{{ $phosphorylation->gene }}</td>
                                <td>{{ $phosphorylation->gene_description }}</td>
                                <td>{{ $phosphorylation->k198r_s }}</td>
                                <td>{{ $phosphorylation->k198r_m }}</td>
                                <td>{{ $phosphorylation->r47g }}</td>
                                <td>{{ $phosphorylation->d156e }}</td>
                                <td>{{ $phosphorylation->pval_k198rs }}</td>
                                <td>{{ $phosphorylation->pval_k198rm }}</td>
                                <td>{{ $phosphorylation->pval_r47g }}</td>
                                <td>{{ $phosphorylation->pval_d156e }}</td>
                                <td>{{ $phosphorylation->modified_residue }}</td>
                                <td>{{ $phosphorylation->modified_position }}</td>
                                <td>{{ $phosphorylation['15mer'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <!-- pagination -->
                {{ $phosphorylations->links('pagination::bootstrap-5') }}
            </div>
        </div>

        {{-- <div class="row data" id="search_results">
            @foreach ($phosphorylations as $phosphorylation)
                <div class="col-md-4 py-3" data-result-id = "{{ $phosphorylation->id }}">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Accession: <span
                                    class="badge bg-dark">{{ $phosphorylation->accession }}</span></h5>
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

                                <dt class="{{ request()->query('order_by') == 'k198r_s' ? 'active' : '' }}">K198R S</dt>
                                <dd>{{ $phosphorylation->k198r_s }}</dd>
                                <dt class="{{ request()->query('order_by') == 'k198r_m' ? 'active' : '' }}">K198R M</dt>
                                <dd>{{ $phosphorylation->k198r_m }}</dd>
                                <dt class="{{ request()->query('order_by') == 'r47g' ? 'active' : '' }}">R47G</dt>
                                <dd>{{ $phosphorylation->r47g }}</dd>
                                <dt class="{{ request()->query('order_by') == 'd156e' ? 'active' : '' }}">D156E</dt>
                                <dd>{{ $phosphorylation->d156e }}</dd>

                                <dt class="{{ request()->query('order_by') == 'pval_k198rs' ? 'active' : '' }}">pval K198R S</dt>
                                <dd>{{ $phosphorylation->pval_k198rs }}</dd>
                                <dt class="{{ request()->query('order_by') == 'pval_k198rm' ? 'active' : '' }}">pval K198R M</dt>
                                <dd>{{ $phosphorylation->pval_k198rm }}</dd>
                                <dt class="{{ request()->query('order_by') == 'pval_r47g' ? 'active' : '' }}">pval R47G</dt>
                                <dd>{{ $phosphorylation->pval_r47g }}</dd>
                                <dt class="{{ request()->query('order_by') == 'pval_d156e' ? 'active' : '' }}">pval D156E</dt>

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
        </div> --}}


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
