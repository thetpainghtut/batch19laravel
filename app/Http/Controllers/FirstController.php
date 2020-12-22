<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class FirstController extends Controller
{
  public function index($value='')
  {
    $items = Item::all();
    return view('frontend.index',compact('items'));
  }

  public function about($value='')
  {
    return view('frontend.about');
  }

  public function contact($value='')
  {
    return view('frontend.contact');
  }

  public function filter($id)
  {
    $category = Category::find($id);
    return view('frontend.filter',compact('category'));
  }
}