<?php

namespace App\Infolists\Components;

use Filament\Infolists\Components\Component;

class Youtube extends Component
{
    protected string $view = 'infolists.components.youtube';

    public static function make(): static
    {
        return app(static::class);
    }
}
