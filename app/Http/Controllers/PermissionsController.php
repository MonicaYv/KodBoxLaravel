<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissions;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class PermissionsController extends Controller
{
 /**
     * Display a listing of the roles.
     */
    public function index($id ='')
    {
       if($id){
        $role = Permissions::find($id);
        return response()->json([
                'success' => true, 
                'message' => 'Permission List',
                'data' => $role
            ], 
            200);

       }else{
           $roles = Permissions::get();

            return response()->json([
                'success' => true, 
                'message' => 'Permission List',
                'data' => $roles
            ], 
            200);
        }
    }

    public function create(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $role = Permissions::create($input);
        return response()->json([
            'success' => true, 
            'message' => 'Permission Created successfully',
            'data' => $role
        ], 
        200);   
    }

     public function update(Request $request, string $id)
    {

       // Access and prepare data from the request
        $data = $request->all();

        $updated = Permissions::where('id', $id)->update($data);
        $role = Permissions::find($id);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Permission Data updated successfully.',
                'data' => $role
            ], 200);
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Permission Data.'
            ], 500);
        }
    }

     public function destroy(string $id)
    {
        
        Permissions::where('id', $id)->delete();

        return response()->json([
            'success' => true, 
            'message' => 'Permission deleted successfully.', 

        ], 
        200); 
    
    }
}
