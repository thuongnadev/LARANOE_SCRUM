<?php

namespace Modules\Project\Http\Controllers;

use App\Http\Controllers\Core\Web\BaseController;
use Illuminate\Support\Facades\Validator;
use Modules\Project\Models\Project;

class ProjectController extends BaseController
{
    public function __construct()
    {
        parent::__construct(new Validator, new Project, 'Project');
    }
}
