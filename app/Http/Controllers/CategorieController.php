<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CategorieController extends Controller
{
    public function categories()
    {
        return Inertia::render('Categories');
    }
}
