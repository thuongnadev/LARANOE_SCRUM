<?php

namespace Modules\Board\Http\Controllers;

use App\Http\Controllers\Core\Web\BaseController;
use Illuminate\Support\Facades\Validator;
use Modules\Board\Models\Board;

class BoardController extends BaseController
{
    public function __construct()
    {
        parent::__construct(new Validator, new Board, 'Board');
    }
}
