<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Restaurant;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    public function index(Restaurant $restaurant, ProductRepository $repository)
    {
        return $repository->paginate($restaurant);
    }

    public function store(Restaurant $restaurant, ProductRepository $repository, Request $request)
    {
        return $repository->create($restaurant, $request->request->all());
    }

    public function show(Restaurant $restaurant, ProductRepository $repository, $product)
    {
        $product = $repository->findByRestaurant($restaurant, $product);

        if (!$product) {
            throw new NotFoundHttpException();
        }

        return $product;
    }

    public function update(Restaurant $restaurant, ProductRepository $repository, $product, Request $request)
    {
        /** @var Product $product */
        $product = $repository->findByRestaurant($restaurant, $product);

        if (!$product) {
            throw new NotFoundHttpException();
        }

        $repository->update($product, $request->request->all());

        return $product;
    }

    public function destroy(Restaurant $restaurant, ProductRepository $repository, $product)
    {
        /** @var Product $product */
        $product = $repository->findByRestaurant($restaurant, $product);

        if (!$product) {
            throw new NotFoundHttpException();
        }

        $repository->remove($product);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
