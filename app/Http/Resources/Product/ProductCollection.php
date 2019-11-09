<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

               'name' => $this->name,
              'totalPrice'=>round(( 1 - ($this->product_discount/100)) * $this->price,2),
              'rating'=>$this->reviews->count()>=1 ? round($this->reviews->sum('star')/$this->reviews->count(),2): 'No rating yet',
              'product_discount'=>$this->product_discount,
              'href' =>[
                    'link'=>route('products.show',$this->id)
              ]
        ];
    }
}
