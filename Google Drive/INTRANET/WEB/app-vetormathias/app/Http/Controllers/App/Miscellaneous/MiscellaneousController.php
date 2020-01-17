<?php

namespace Intranet\Http\Controllers\App\Miscellaneous;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;

class MiscellaneousController extends Controller
{
    public function sup_changeProvider(){
        return view('app.miscellaneous.supplies.change-provider');
    }
}
