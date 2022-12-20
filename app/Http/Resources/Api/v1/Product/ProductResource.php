<?php

namespace App\Http\Resources\Api\v1\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'is_tax_exempt' => $this->is_tax_exempt,
            'status' => $this->status,
            'is_kitchen_item' => $this->is_kitchen_item,
            'description' => $this->description,
            'discount_id'  => $this->whenLoaded('discount'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
