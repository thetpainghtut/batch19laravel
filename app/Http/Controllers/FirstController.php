<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
  public function index($value='')
  {
    return view('frontend.index');
  }

  public function about($value='')
  {
    return view('frontend.about');
  }

  public function contact($value='')
  {
    return view('frontend.contact');
  }
}