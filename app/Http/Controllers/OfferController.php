<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Support\Facades\Cache;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Cache::remember('products', 60, function ()
        {
            return Offer::all();
        });

        return collect($products)->paginate(10);
    }

    public function adminIndex()
    {

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
    public function store(OfferRequest $request)
    {
        $this->authorize('adminResources', User::class);

        try 
        {
            $request->validated();

            $offerData = array(
                'name' => $request->name,
                'code' => $request->code,
                'price' => $request->price,
                'promotion' => $request->promotion ? : '0',
                'availability' => $request->availability ? : '1',
                'amount' => $request->amount ? : '0'
            );

            Offer::create($offerData);

        } 
        catch (\Throwable $th) 
        {
            abort(400, $th->getMessage());
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
