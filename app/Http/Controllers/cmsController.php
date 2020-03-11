<?php

namespace App\Http\Controllers;

use App\Merchant;
use App\Store;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;

class cmsController extends Controller
{
    public function index()
    {
        return view('store');
    }

    public function json()
    {
        $merchant_list = DB::table('Merchant as dana_merchant')
            ->select('dana_merchant.merchant_id', 'dana_store.internal_shop_id', 'dana_store.external_shop_id', 'dana_merchant.brand_name', 'dana_merchant.merchant_name', 'dana_store.shop_name', 'dana_store.mcc', 'dana_store.nmid', 'dana_store.address', 'dana_store.postal_code', 'dana_store.city', 'dana_store.province', 'dana_store.pic_name', 'dana_store.pic_contact', 'dana_store.latitude', 'dana_store.longitude', 'dana_store.shop_status', 'dana_store.deployment_status')
            ->join('Store as dana_store', DB::raw('dana_store.merchant_id'), '=', DB::raw('dana_merchant.merchant_id'))
            ->orderBy('dana_merchant.merchant_id', 'asc');
        return Datatables()->of($merchant_list)
            ->make(true);
    }

    public function search(Request $request)
    {
        $search = $request->get('merchant');
        $result = DB::table('Merchant')
            ->select('merchant_id', 'brand_name', 'merchant_name')
            ->where('merchant_id', 'like', '%' . $search . '%')
            ->orWhere('brand_name', 'like', '%' . $search . '%')
            ->get();

        return view('merchant', compact('search', 'result'));
    }

    public function view(Request $request)
    {
        $search = $request->get('merchant');
        $result = DB::table('Merchant')
            ->select('merchant_id', 'brand_name', 'merchant_name')
            ->where('merchant_id', 'like', '%' . $search . '%')
            ->orWhere('brand_name', 'like', '%' . $search . '%')
            ->get('search');

        return view('view', compact('search', 'result'));
    }
}
