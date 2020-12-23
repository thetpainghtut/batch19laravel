<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Order;
use Auth;

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

  public function cart($value='')
  {
    return view('frontend.cart');
  }

  public function orderhistory($value='')
  {
    $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
    return view('frontend.orderhistory',compact('orders'));
  }
}