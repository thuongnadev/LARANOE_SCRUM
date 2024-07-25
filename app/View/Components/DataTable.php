<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;


class DataTable extends Component
{
    public $data = [];

    /**
     * Create a new component instance.
     */
    public function __construct(Request $request)
    {
        $method = $request->method();
        $param = $request->query();

        if ($method == "GET") {
            $segment = ucfirst($request->segment(2));
            $page = $request->query('page', 1);

            try {
                return $this->getDataAndFieldByPage($segment, $page);
            } catch (\Exception $e) {
                $this->data = [];
            }
        }
    }

    private function getDataAndFieldByPage($segment, $page)
    {
        $perPage = 10;
        $modelClass = "Modules\\Blog\\Models\\$segment";

        if (!class_exists($modelClass)) {
            throw new \Exception("Model class {$modelClass} does not exist.");
        }

        $data = $modelClass::paginate($perPage, ['*'], 'page', $page);
        $field = $modelClass;

        return [
            'data' => $data,
            'field' => $field
        ];
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.data-table');
    }
}
