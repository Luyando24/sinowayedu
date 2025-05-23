<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :state-path="$getStatePath()"
>
    @php
        $state = $getState();
        
        if (empty($state)) {
            return;
        }
        
        // Construct the URL using asset helper
        $url = filter_var($state, FILTER_VALIDATE_URL) 
            ? $state 
            : asset('storage/' . $state);
            
        $extension = pathinfo($state, PATHINFO_EXTENSION);
        $isPdf = strtolower($extension) === 'pdf';
    @endphp

    <div>
        @if ($isPdf)
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium">Document Preview</span>
                    <a href="{{ $url }}" target="_blank" class="text-primary-600 hover:underline text-sm">
                        Open in new tab
                    </a>
                </div>
                
                <div class="border rounded-lg overflow-hidden">
                    <iframe src="{{ $url }}" style="width: 100%; height: 500px;" frameborder="0"></iframe>
                </div>
            </div>
        @else
            <div class="p-4 bg-gray-50 border rounded-lg">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>File cannot be previewed</span>
                </div>
            </div>
        @endif
        
        <div class="mt-2">
            <a 
                href="{{ $url }}" 
                download 
                class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-primary-600 text-white hover:bg-primary-500"
            >
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Download
            </a>
        </div>
    </div>
</x-dynamic-component>