<?php

namespace App\Http\Controllers;  

use App\Models\Package;  
use Illuminate\Http\Request;  

class PackageController extends Controller  
{  
    public function index()  
    {  
        return response()->json(Package::all());
    }  

    public function store(Request $request)  
    {  
        $validate = $request->validate([  
            'name' => 'required|string',  
            'pack_name' => 'required|string',  
            'price' => 'required|numeric',  
        ]);  

        $package = Package::create($validate);  

        return response()->json([  
            'message' => 'Package created successfully.',  
            'data' => $package  
        ], 201);  
    }  

    public function show($id)  
    {  
        $package = Package::findOrFail($id);  

        return response()->json([  
            'message' => 'Package retrieved successfully.',  
            'data' => $package  
        ], 200);  
    }  

    public function update(Request $request, $id)  
    {  
        $package = Package::findOrFail($id);  
        $package->update($request->all());  

        return response()->json([  
            'message' => 'Package updated successfully.',  
            'data' => $package  
        ], 200);  
    }  

    public function destroy($id)  
    {  
        $package = Package::findOrFail($id);  
        $package->delete();  

        return response()->json([  
            'message' => 'Package deleted successfully.'  
        ], 204);  
    }  
}
