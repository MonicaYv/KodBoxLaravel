<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
   public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roleID' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        return response()->json([
            'success' => true, 
            'message' => 'User Created successfully',
            'data' => $user
        ], 
        200);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);
       // Access and prepare data from the request
        $data = $request->all();
        //for password update handling
        if(!empty($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }

        $updated = User::where('id', $id)->update($data);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'User Data updated successfully.',
                'data' => $data
            ], 200);
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return response()->json([
                'success' => false,
                'message' => 'Failed to update userDetails.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userDetails(Request $user)
    {
         $user = User::where('id',$user->id)->get();

         return response()->json([
            'success' => true, 
            'message' => 'User Details',
            'data' => $user
        ], 
        200);
    }
}
