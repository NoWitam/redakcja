<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public array $navigation;
    public ?string $description = null;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $small = false
    )
    {
        $this->navigation = [
            ['name' => 'REDAKCJA.pl', 'url' => 'http://127.0.0.1'],
            ['name' => 'Blog', 'url' => '127.0.0.1'],
            ['name' => 'Dziwki i koks', 'url' => '127.0.0.1']
        ];

        $this->description = "Kategoria newsów i artykułów dotyczących seriali wydawnictwa DC Comics, takich jak: Titans, Swamp Thing, Lucifer, Preacher, Stargirl i Gotham.";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
