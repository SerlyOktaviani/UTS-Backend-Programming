<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    
    public $animals = ['Ayam','Kerbau','Kura-kura'];

    public function index(){
        foreach ($this->animals as $key => $value) {
            $data[] = [
                'id' => $key,
                'nama_hewan' => $value
            ];
        }

        return $data;
    }

    public function store(Request $request){
        $data = [
            'nama_hewan' => $request->nama_hewan
        ];
        array_push($this->animals, $data);
        return $this->index();
    }

    public function update(Request $request,$index){
        $data = [
            'nama_hewan' => $request->nama_hewan
        ];
        $this->animals[$index] = $data;
        return $this->index();
    }
    
    public function destroy($index){
        unset($this->animals[$index]);
        return $this->index();
    }    
}

