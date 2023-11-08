<?php

namespace App\View\Components;

use App\Services\Route;
use Closure;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public ?array $navigation = null;
    public ?string $description = null;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $small = false
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb', ['breadcrumbs' => Breadcrumbs::generate()]);
    }

}
