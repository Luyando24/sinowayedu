<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentViewer extends Component
{
    public $documentUrl;
    public $isPdf;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($path)
    {
        // If it's a full URL, use it directly
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            $this->documentUrl = $path;
        } else {
            // Otherwise, construct the storage URL
            $this->documentUrl = asset('storage/' . $path);
        }
        
        // Check if it's a PDF
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $this->isPdf = strtolower($extension) === 'pdf';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document-viewer');
    }
}