<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="mb-4">Study Options</h2>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            @foreach ($studyOptions as $option)
                <div class="badge-option px-4 py-3 rounded-4 shadow-sm">
                    {{ $option->name }}
                </div>
            @endforeach
        </div>
    </div>
</section>