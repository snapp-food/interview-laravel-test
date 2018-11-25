<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\RestaurantRepository;
use App\Model\Restaurant;
use App\Http\Resources\Restaurant as RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param RestaurantRepository $restaurantRepository
     * @return ResourceCollection
     */
    public function index(RestaurantRepository $restaurantRepository)
    {
        return RestaurantResource::collection($restaurantRepository->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param RestaurantRepository $restaurantRepository
     * @return JsonResource
     */
    public function store(Request $request, RestaurantRepository $restaurantRepository)
    {
        /** @var Restaurant $restaurant */
        $restaurant = $restaurantRepository->create($request->all());

        return new RestaurantResource($restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Restaurant  $restaurant
     * @return JsonResource
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Restaurant $restaurant
     * @param RestaurantRepository $restaurantRepository
     * @return JsonResource
     */
    public function update(Request $request, Restaurant $restaurant, RestaurantRepository $restaurantRepository)
    {
        $restaurantRepository->update($restaurant, $request->request->all());

        return new RestaurantResource($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Restaurant $restaurant
     * @param RestaurantRepository $restaurantRepository
     * @return Response
     */
    public function destroy(Restaurant $restaurant, RestaurantRepository $restaurantRepository)
    {
        $restaurantRepository->remove($restaurant);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
