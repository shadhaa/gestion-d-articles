<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories=Categorie::all();
            return response()->json($categories);

        }catch(\Exception $e){
            return response()->json("probléme de recuperation");

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try{
        $categorie=new Categorie(["nomcategorie"=>$request->input("nomcategorie"),"imagecategorie"=>$request->input("imagecategorie")]);
        $categorie->save();
        return response()->json($categorie);

       

    }catch(\Exception $e){
        return response()->json("insertion impossible");

    } }
    public function show( $id)
    {
       
        try{
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
        
    
           
    
        }catch(\Exception $e){
            return response()->json("Récuperation impossible");
    
        } 
    }

    /**
     * Update the specified resource in storage.
     */
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return request()->json($categorie);
        
    
           
    
        }catch(\Exception $e){
            return response()->json("supression impossible");
    
        } 
    }
    public function update( Request $request,$id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->update($request->all());
            return request()->json($categorie);
        
    
           
    
        }catch(\Exception $e){
            return response()->json("Update impossible");
    
        } 
    }
}