<?php

namespace Modules\Calendar\Http\Controllers;

use App\Http\Controllers\Core\Web\BaseController;
use Illuminate\Support\Facades\Validator;
use Modules\Calendar\Models\Calendar;

class CalendarController extends BaseController
{
    public function __construct()
    {
        parent::__construct(new Validator, new Calendar, 'Calendar');
    }
}
