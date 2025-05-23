<section class="container my-5">
    {{-- City Banner --}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <img src="{{ asset('storage/' . $city->image) }}" class="w-100" style="height: 300px; object-fit: cover;" alt="{{ $city->name }} image">
                <div class="card-body bg-white">
                    <h2 class="mb-2">{{ $city->name }}</h2>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <strong>Province:</strong> {{ $city->province->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Number of Universities:</strong> {{ $city->universities->count() }}
                        </div>
                    </div>
                    @if($city->description)
                        <p class="mt-3 text-muted">{{ strip_tags($city->description) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Associated Universities --}}
    <div class="mb-4">
        <h3 class="mb-3">Universities in {{ $city->name }}</h3>

        @if($city->universities->isEmpty())
            <div class="alert alert-info">
                No universities listed for this city.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-md-table-cell">QS Rank</th>
                            <th class="d-none d-md-table-cell">Province</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($city->universities as $university)
                            <tr>
                                <td>{{ $university->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $university->qs_rank ?? 'N/A' }}</td>
                                <td class="d-none d-md-table-cell">{{ $university->city->province->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ url('university.details', $university->id) }}" class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>
