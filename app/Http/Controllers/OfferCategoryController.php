<?php

namespace App\Http\Controllers;

use App\Models\OfferCategory;
use App\Models\User;
use App\Http\Requests\OfferCategoryRequest;

class OfferCategoryController extends Controller
{
    public function index()
    {
        $this->authorize('adminResources', User::class);
        return OfferCategory::all();
    }

    public function store(OfferCategoryRequest $request)
    {
        $this->authorize('adminResources', User::class);

        try 
        {
            $request->validated();

            $offerCategoryData = array(
                'root_id' => $request->root_id,
                'name' => $request->name,
                'symbol' => $request->symbol
            );

            OfferCategory::create($offerCategoryData);

        } 
        catch (\Throwable $th) 
        {
            abort(400, $th->getMessage());
        }

        return response()->json(['message'=> 'Category created successfully'], 201);
    }

    public function update(int $id, OfferCategoryRequest $request)
    {
        $this->authorize('adminResources', User::class);

        try 
        {
            $request->validated();

            $offerCategoryData = array(
                'root_id' => $request->root_id,
                'name' => $request->name,
                'symbol' => $request->symbol
            );

            OfferCategory::where('id', $id)->update($offerCategoryData);

        } 
        catch (\Throwable $th) 
        {
            abort(400, $th->getMessage());
        }

        return response()->json(['message'=> 'Category updated successfully'], 201);

    }
}
