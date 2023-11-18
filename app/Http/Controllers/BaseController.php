<?php

namespace App\Http\Controllers;

use App\Traits\HasPagination;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    use HasPagination;

    protected $orderBy = 'name';
    protected $orderDirArray = ['asc', 'desc'];
    protected $rowsPerPage = 7;
    protected $resultsCount = 0;
}
