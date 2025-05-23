<?php

namespace App\Filament\Infolists\Components;

use Filament\Infolists\Components\TextEntry;

class DocumentViewer extends TextEntry
{
    protected string $view = 'filament.infolists.components.document-viewer';
    
    public function getState(): mixed
    {
        $state = parent::getState();
        
        if (empty($state)) {
            return null;
        }
        
        return $state;
    }
}
