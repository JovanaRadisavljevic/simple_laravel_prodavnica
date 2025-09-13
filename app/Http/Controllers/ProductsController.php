<?php

namespace App\Http\Controllers;

use App\Models\Ranac;
use App\Models\Sator;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $satori = Sator::all();
        $rancevi = Ranac::all();
        return view('allproducts',[
            'satori'=>$satori,
            'rancevi'=>$rancevi
        ]);
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
