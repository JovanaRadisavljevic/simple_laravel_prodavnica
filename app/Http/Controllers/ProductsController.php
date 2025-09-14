<?php

namespace App\Http\Controllers;

use App\Models\Ranac;
use App\Models\Sator;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request){
        #provera za filtere
       $type   = $request->query('type');  
        $sezona = $request->query('sezona');
        $tezina = $request->query('tezina');
        $zap    = $request->query('zapremina');
        $sort   = $request->query('sort');

        $qs = Sator::query();
        $qr = Ranac::query();

        #samo sator ima sezonu
        if(!empty($sezona)){
            $qs->where('sezona',$sezona);
        }
        #tezinu imaju oba
        if(!empty($tezina)){
            $qs->where('tezina','<=',(float)$tezina);
            $qr->where('tezina','<=',(float)$tezina);
        }
        #samo ranac ima zapreminu
        if(!empty($zap)){
            $qr->where('zapremina',$zap);
        }
        #sortiranje po ceni oba
        if(!empty($sort)){
            $sortiraj = $sort === 'desc'? 'desc':'asc';
            $qr->orderBy('price',$sortiraj);
            $qs->orderBy('price',$sortiraj);
        }

        #konacna primena filtera
        if($type==='sator'){
            $satori = $qs->get();
            $rancevi = collect(); //prazno
        }elseif($type==='ranac'){
            $rancevi = $qr->get();
            $satori = collect(); //prazno
        }else{
            //onda su oba
            $satori = $qs->get();
            $rancevi = $qr->get();
        }
        //svakom elementu dodajem oznaku tipa
        $satori  = $satori->map(function($x){ $x->type = 'sator'; return $x; });
        $rancevi = $rancevi->map(function($x){ $x->type = 'ranac'; return $x; });

        $products = $satori->concat($rancevi);

        //sort po ceni nad svim proizvodima
        if ($sort === 'desc') {
            $products = $products->sortByDesc('price', SORT_NUMERIC);
        } elseif ($sort === 'asc') {
            $products = $products->sortBy('price', SORT_NUMERIC);
        }

        return view('allproducts', 
        ['products' => $products]);

        // return view('allproducts',[
        //     'satori'=>$satori,
        //     'rancevi'=>$rancevi
        // ]);
    }
    public function show(string $type, int $id){
        $model = $type === 'sator' ? Sator::class : Ranac::class;
        $product = $model::findOrFail($id);
        return view('singleproduct', [
            'type'    => $type,
            'product' => $product,
        ]);
    }
}
