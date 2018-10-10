<?php

namespace App\Http\Controllers\Admin;

use App\Models\Competitions;
use App\Models\MarketType;
use App\Models\Matches;
use App\Models\Regions;
use App\Models\SelectionType;
use App\Models\Sports;
use App\Models\Teams;
use App\Models\Translations;
use App\Models\TranslationsEntry;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class DatatableController extends Controller
{
    public function getAllUsers()
    {

        return Datatables::of(User::query())
            ->make(true);
    }
}
