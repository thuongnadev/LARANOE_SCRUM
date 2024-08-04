<?php

namespace Modules\Sprint\Http\Controllers;

use App\Http\Controllers\Core\Web\BaseController;
use Illuminate\Support\Facades\Validator;
use Modules\Sprint\Models\Sprint;

class SprintController extends BaseController
{
    public function __construct()
    {
        parent::__construct(new Validator, new Sprint, 'Sprint');
    }
}
