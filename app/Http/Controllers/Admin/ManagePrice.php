<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;

class ManagePrice extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        $price = Price::where('title', 'vip')->first();
        $priceNotVip = Price::where('title', 'notVip')->first();

        return view('admin.pages.manage_price', [
            'price' => $price,
            'priceNotVip' => $priceNotVip,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setPrice(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setNotVipPrice(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'price_not_vip' => 'numeric'
        ]);
        if ($validator->fails()){
            return redirect()->back();
        }

        $price = Price::where('title', 'notVip')->first();
        if (!$price){
            $price = new Price();
        }
        $price->title = 'notVip';
        $price->value = $request->price_not_vip;
        $price->save();
        return redirect()->back();
    }
}
