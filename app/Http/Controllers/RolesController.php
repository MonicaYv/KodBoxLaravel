<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index($id ='')
    {
       if($id){
        $role = Roles::find($id);
        return response()->json([
                'success' => true, 
                'message' => 'Role List',
                'data' => $role
            ], 
            200);

       }else{
           $roles = Roles::get();

            return response()->json([
                'success' => true, 
                'message' => 'Roles List',
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
        $role = Roles::create($input);
        return response()->json([
            'success' => true, 
            'message' => 'Role Created successfully',
            'data' => $role
        ], 
        200);   
    }

     public function update(Request $request, string $id)
    {

       // Access and prepare data from the request
        $data = $request->all();

        $updated = Roles::where('id', $id)->update($data);
        $role = Roles::find($id);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Roles Data updated successfully.',
                'data' => $role
            ], 200);
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Roles Data.'
            ], 500);
        }
    }

     public function destroy(string $id)
    {
        
        Roles::where('id', $id)->delete();

        return response()->json([
            'success' => true, 
            'message' => 'Role deleted successfully.', 

        ], 
        200); 
    
    }
}
