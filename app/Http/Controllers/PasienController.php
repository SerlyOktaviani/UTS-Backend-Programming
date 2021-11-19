<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index(){
        $pasien=Pasien::all();

        $data = [
            'message' => 'Get all pasien',
            'data' => $pasien
        ];

            return response()->json($data, 200);
    }

    public function positive(){
        $pasien=Pasien::where('status','positive')->get();

        $data = [
            'message' => 'Get all pasien',
            'data' => $pasien
        ];

            return response()->json($data, 200);
    }


    public function dead(){
        $pasien=Pasien::where('status','dead')->get();

        $data = [
            'message' => 'Get all pasien',
            'data' => $pasien
        ];

            return response()->json($data, 200);
    }

    public function recovered(){
        $pasien=Pasien::where('status','recovered')->get();

        $data = [
            'message' => 'Get all pasien',
            'data' => $pasien
        ];

            return response()->json($data, 200);
    }

    public function store(Request $request){
        $input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'Address' => $request->Address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at,
        ];

        $pasien = Pasien::create($input);
        $data = [
            'message' => 'Pasien is created succesfully',
            'data' => $pasien
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request,$id){
        $pasien = Pasien::find($id);
        
        if ($pasien){
            $input = [
            'name' => $request->name ?? $pasien->name,
            'phone' => $request->phone ?? $pasien->phone,
            'Addres' => $request->Address ?? $pasien->Address,
            'status' => $request->status ?? $pasien->status,
            'in_date_at' => $request->in_date_at ?? $pasien->in_date_at,
            'out_date_at' => $request->out_date_at ?? $pasien->out_date_at,
        ];

        $pasien->update($input);

        $data = [
            'message' => 'Pasien is updated',
            'data' => $pasien
        ];

        return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Pasien not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id){
        $pasien = Pasien::find($id);

        if ($pasien){
            $pasien->delete();
            $data = [
                "message" => 'Pasien is deleted'
            ];

            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Pasien not found'
            ];
            return response()->json($data, 404);
        }
    }

}


