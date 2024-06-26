<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::orderBy('region')
                     ->orderBy('genre')
                     ->get();
        $regions = Shop::select('region')->distinct()->get();
        $genres = Shop::select('genre')->distinct()->get();

        return view('index', ['shops' => $shops, 'regions' => $regions, 'genres' => $genres]);
    }

    public function region($region = null)
    {
        if ($region == 'All erea' || $region == null) {
            $shops = Shop::orderBy('genre')
                     ->get();
        } else {
            $shops = Shop::where('region', $region)
                         ->orderBy('genre')
                         ->get();
        }
        $regions = Shop::select('region')->distinct()->get();
        $genres = Shop::select('genre')->distinct()->get();

        return view('index', ['shops' => $shops, 'regions' => $regions, 'genres' => $genres]);
    }

    public function genre($genre = null)
    {
        if ($genre == 'All genre' || $genre == null) {
            $shops = Shop::orderBy('region')
                     ->get();
        } else {
            $shops = Shop::where('genre', $genre)
                         ->orderBy('region')
                         ->get();
        }
        $regions = Shop::select('region')->distinct()->get();
        $genres = Shop::select('genre')->distinct()->get();

        return view('index', ['shops' => $shops, 'regions' => $regions, 'genres' => $genres]);
    }

    public function all()
    {
        $shops = Shop::orderBy('region')
                     ->orderBy('genre')
                     ->get();
        $regions = Shop::select('region')->distinct()->get();
        $genres = Shop::select('genre')->distinct()->get();

        return view('index', ['shops' => $shops, 'regions' => $regions, 'genres' => $genres]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $shops = Shop::where('shop_name', 'LIKE', "%{$keyword}%")
            ->orWhere('region', 'LIKE', "%{$keyword}%")
            ->orWhere('genre', 'LIKE', "%{$keyword}%")
            ->get();

        $regions = Shop::select('region')->distinct()->get();
        $genres = Shop::select('genre')->distinct()->get();

        return view('index', ['shops' => $shops, 'regions' => $regions, 'genres' => $genres]);
    }

    public function show($id)
    {
        $shop = Shop::find($id);

        if ($shop) {
            return view('shop_detail', ['shop' => $shop]);
        } else {
            return redirect()->route('shops.index');
        }
    }
}