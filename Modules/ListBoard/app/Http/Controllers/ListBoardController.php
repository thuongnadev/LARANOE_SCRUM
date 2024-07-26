<?php

namespace Modules\ListBoard\Http\Controllers;

use App\Http\Controllers\Core\Web\BaseController;
use Illuminate\Support\Facades\Validator;
use Modules\ListBoard\Models\ListBoard;

class ListBoardController extends BaseController
{
    public function __construct()
    {
        parent::__construct(new Validator, new ListBoard, 'ListBoard');
    }
}
