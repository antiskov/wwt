<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class ManagePrice extends Controller
{
    public function show()
    {
        $price = Price::where('title', 'vip')->first();

        return view('admin.pages.manage_price', ['price' => $price]);
    }

    public function setPrice(Request $request)
    {
        $validator = \Validator::make($request->all(), [
           'price_vip' => 'numeric'
        ]);
        if ($validator->fails()){
            return redirect()->back();
        }
        $price = Price::where('title', 'vip')->first();
        if (!$price){
            $price = new Price();
        }
        $price->title = 'vip';
        $price->value = $request->price_vip;
        $price->save();

        return redirect()->back();

    }
}
