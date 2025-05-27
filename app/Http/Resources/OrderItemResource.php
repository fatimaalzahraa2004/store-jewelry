<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_item_id' => $this->order_item_id, // استخدام primaryKey المخصص
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            // تحميل بيانات المنتج المرتبط
            'product' => new ProductResource($this->whenLoaded('product')),
            'quantity' => $this->quantity,
            'total_price' => (float) $this->total_price,
            'added_time' => $this->added_time->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}