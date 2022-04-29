<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\RealEstateEntity;

class RealEstateEntityController extends Controller
{
    public function index()
    {
        $realEstate = RealEstateEntity::select(['id','name','real_state_type','city','country'])->get();

        return response()->json([
            "success" => true,
            "message" => "Real Estate Entity List",
            "data" => $realEstate
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:128',
            'street' => 'required|max:128',
            'real_state_type' => 'required|in:house,department,land,commercial_ground',
            'external_number' => 'required|max:12|regex:/^[a-zA-Z0-9_\-]*$/',
            'Internal_number' => 'required|max:12|regex:/^[a-zA-Z0-9_\-]*$/',
            'neighborhood' => 'required|max:128',
            'city' => 'required|max:64',
            'country' => 'required|max:2',
            'rooms' => 'required|numeric|gt:0',
            'bathrooms' => 'required_if:real_state_type,land,commercial_ground',
            'comments' => 'max:128',
        ]);
        
        if($validator->fails()){
        // return $this->sendError('Validation Error.', $validator->errors()); 
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr);     
        }
        $input['bathrooms'] = (isset($input['bathrooms']) && !empty($input['bathrooms'])) ? $input['bathrooms'] : 0; 
        $product = RealEstateEntity::create($input);
        return response()->json([
            "success" => true,
            "message" => "Real Estate Entity created successfully.",
            "data" => $product
        ]);
    } 

    public function show($id)
    {
        $realEstate = RealEstateEntity::find($id);
        if (empty($realEstate)) {
            return response()->json([
                "success" => false,
                "message" => "Real Estate Entity not found.",
                "data" => ""
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Real Estate Entity retrieved successfully.",
            "data" => $realEstate
        ]);
    }

    public function update(Request $request, $id)
    {
        $realEstate = RealEstateEntity::find($id);
        if (empty($realEstate)) {
            return response()->json([
                "success" => false,
                "message" => "Real Estate Entity not found.",
                "data" => ""
            ]);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:128',
            'street' => 'required|max:128',
            'real_state_type' => 'required|in:house,department,land,commercial_ground',
            'external_number' => 'required|max:12|regex:/^[a-zA-Z0-9_\-]*$/',
            'Internal_number' => 'required|max:12|regex:/^[a-zA-Z0-9_\-]*$/',
            'neighborhood' => 'required|max:128',
            'city' => 'required|max:64',
            'country' => 'required|max:2',
            'rooms' => 'required|numeric|gt:0',
            'bathrooms' => 'required_if:real_state_type,land,commercial_ground',
            'comments' => 'max:128',
        ]);
       

        if($validator->fails()){
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr);     
        }
        $realEstate->name = $input['name'];
        $realEstate->street = $input['street'];
        $realEstate->real_state_type = $input['real_state_type'];
        $realEstate->external_number = $input['external_number'];
        $realEstate->Internal_number = $input['Internal_number'];
        $realEstate->neighborhood = $input['neighborhood'];
        $realEstate->city = $input['city'];
        $realEstate->country = $input['country'];
        $realEstate->rooms = $input['rooms'];
        $realEstate->bathrooms = (isset($input['bathrooms']) && !empty($input['bathrooms'])) ? $input['bathrooms'] : 0; 
        $realEstate->comments = $input['comments'];
        $realEstate->save();
        // $realEstate->update($id,$input);
        return response()->json([
            "success" => true,
            "message" => "Real Estate Entity updated successfully.",
            "data" => $realEstate
        ]);
    }

    public function destroy($id)
    {
        
        $realEstate = RealEstateEntity::find($id);
        if (empty($realEstate)) {
            return response()->json([
                "success" => false,
                "message" => "Real Estate Entity not found.",
                "data" => ""
            ]);
        }
        $realEstate->delete();
        return response()->json([
            "success" => true,
            "message" => "Real Estate Entity deleted successfully.",
            "data" => $realEstate
        ]);
    }
}
