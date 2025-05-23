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
    @endphp
    
    @if($state)
        <x-document-viewer :path="$state" />
    @else
        <div class="text-gray-500 italic">No document uploaded</div>
    @endif
</x-dynamic-component>

