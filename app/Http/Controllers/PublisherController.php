<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function show(){
        $publishers = Publisher::all();
        return $publishers;
    }
    public function create(Request $request){
        Publisher::create(
            [
                'name' => $request->get('name'),
            ]
            );
    }
}      