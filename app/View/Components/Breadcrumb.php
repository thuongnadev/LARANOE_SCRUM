<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;

class Breadcrumb extends Component
{
    public $breadcrumbs;

    /**
     * Create a new component instance.
     */
    public function __construct(Request $request)
    {
        $this->breadcrumbs = $this->generateBreadcrumbs($request);
    }

    /**
     * Generate the breadcrumbs.
     *
     * @return array
     */
    private function generateBreadcrumbs($request)
    {
        $uri = $request->path();
        $segments = explode('/', $uri);
        $breadcrumbs = [];
        $url = '';

        foreach ($segments as $index => $segment) {
            $url .= ($index ? '/' : '') . $segment;
            $breadcrumbs[] = [
                'name' => ucfirst($segment),
                'url' => $url
            ];
        }

        return $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.breadcrumb', ['breadcrumbs' => $this->breadcrumbs]);
    }
}
