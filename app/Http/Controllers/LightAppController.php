<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LightAppRequest;
use App\Models\LiteAppModel;
use Validator;
use Illuminate\Support\Facades\Storage;

class LightAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $app = LiteAppModel::get();

        return response()->json([
            'success' => true, 
            'message' => 'All Apps List',
            'data' => $app
        ], 
        200);
    }


 public function AppRoleList(Request $request)

    {
       
     $app = LiteAppModel::where('app_group',$request->app_group)->get();

     return response()->json([
        'success' => true, 
        'message' => 'App List Of Your Role.',
        'data' => $app
    ], 
    200);

 }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     // dd($request->all()); 
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:100',
            'website_link' => 'required|string|min:1|max:100',
            'app_group' => 'nullable|string',
            'app_description' => 'nullable|string|max:200',
            'picture_icon' => 'nullable|image|mimes:jpeg,png',
            'dialog_width' => $request->open_type == 'dialog' ? 'required' : 'nullable'.'|integer|max:100',
            'dialog_height' => $request->open_type == 'dialog' ? 'required' : 'nullable'.'|integer|max:100',
        ]);
        
        $validator->after(function ($validator) use ($request) {
            
        });

        if ($validator->fails()) {
            return response()->json([
                'success' => false, 
                'message' => $validator->errors()->first()
            ], 
            500);
        }


        $image = $request->file('picture_icon');
        $path = $image->store('images', 'public');

        $url = Storage::url($path);

        $data['name'] = $request->name;
        $data['website_link']= $request->website_link;
        $data['app_group']= $request->app_group;
        $data['app_description']= $request->app_description;
        $data['picture_icon'] = $url;
        $data['dialog_width']= $request->dialog_width;
        $data['dialog_height']= $request->dialog_height;
        $data['open_type']= $request->open_type;
        


        $appData = LiteAppModel::create($data);

        return response()->json(['message' => 'App data stored successfully', 'data' => $appData], 201);
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
    public function apps(Request $request, string $id)
    {
        

        // Access and prepare data from the request
       $data['is_added'] = $request->is_added;

        // Optional: Perform additional data manipulation if needed

       

        $updated = LiteAppModel::where('id', $id)->update($data);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'App added to Desktop successfully.',
                'data' => $data
            ], 200);
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return response()->json([
                'success' => false,
                'message' => 'Failed to update app.'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:100',
            'website_link' => 'required|string|min:1|max:100',
            'app_group' => 'nullable|string',
            'app_description' => 'nullable|string|max:200',
            'picture_icon' => 'nullable|image|mimes:jpeg,png',
            'dialog_width' => 'nullable|integer|max:100',
            'dialog_height' => 'nullable|integer|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 500);
        }

        // Access and prepare data from the request
        $data = $request->all();

        // Optional: Perform additional data manipulation if needed

        $image = $request->file('picture_icon');
        $path = $image->store('images', 'public');

        $url = Storage::url($path);

        $data['picture_icon'] = $url;

        $updated = LiteAppModel::where('id', $id)->update($data);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'App updated successfully.',
                'data' => $data
            ], 200);
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return response()->json([
                'success' => false,
                'message' => 'Failed to update app.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        LiteAppModel::where('id', $id)->delete();

        return response()->json([
            'success' => true, 
            'message' => 'App deleted successfully.', 

        ], 
                                200);  //
    
    }
}
