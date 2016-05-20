<?php

namespace App\Http\Controllers;

use App\Scale;
use Illuminate\Http\Request;

use App\Http\Requests;

class ScaleController extends Controller
{

    function index() {
        $scales = Scale::all();

        return view('scale.index', ['scales' => $scales]);
    }

    function detail($scaleId) {
        $scale = Scale::find($scaleId);
        $intervals = $scale->intervals()->orderBy('index')->get();

        return view('scale.detail', ['scale' => $scale, 'intervals' => $intervals]);
    }
}
