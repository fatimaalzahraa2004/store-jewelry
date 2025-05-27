<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_date' => $this->order_date->format('Y-m-d H:i:s'),
            'total_price' => (float) $this->total_price,
            'status' => $this->status,
            // تحميل عناصر الطلب (مجموعة من OrderItemResource)
            'items' => OrderItemResource::collection($this->whenLoaded('items')), // العلاقة هي 'items'
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}