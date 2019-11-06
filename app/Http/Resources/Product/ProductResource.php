<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

                  'name'=>$this->name,
                  'price'=>$this->price,
                  'product_detail'=>$this->product_detail,
                  'product_in_stock'=>$this->product_in_stock == 0 ? 'Out of Stock' : $this->product_in_stock,
                  'product_discount'=>$this->product_discount,
                  'totalPrice'=>round(( 1 - ($this->product_discount/100)) * $this->price,2),
                  'product_of_customer_order'=>$this->product_of_customer_order,
                  'rating'=>$this->reviews->count()>=1 ? round($this->reviews->sum('star')/$this->reviews->count(),2): 'No rating yet',




                  'href'=> [

                          'reviews' => route('reviews.index',$this->id)

                  ]

        ];
    }
}
