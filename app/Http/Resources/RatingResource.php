<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            // تحميل بيانات المستخدم المرتبط
            'user' => new UserResource($this->whenLoaded('user')),
            'product_id' => $this->product_id,
            // تحميل بيانات المنتج المرتبط
            'product' => new ProductResource($this->whenLoaded('product')),
            'rating_value' => (float) $this->rating_value,
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}