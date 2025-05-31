<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
// لا حاجة لـ Arr هنا بعد الآن إذا كان الـ accessor في النموذج يقوم بالتسطيح

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $photos = [];
        // الـ accessor في Product model سيتكفل بتحويلها إلى مصفوفة نظيفة
        // لذا هنا، فقط نأخذ كل مسار وننشئ URL له
        foreach ($this->album_photos as $photoPath) {
            // التحقق مهم جداً لأن album_photos قد تحتوي على مسارات غير موجودة أو قيم غير نصية
            if (is_string($photoPath) && !empty($photoPath)) {
                $photos[] = Storage::url($photoPath);
            }
        }

        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'price' => (float) $this->price,
            'type' => new ProductTypeResource($this->whenLoaded('type')),
            'album_photos' => $photos, // الآن سيحتوي على URLs قابلة للوصول
            'shape' => $this->shape,
            'owner' => new UserResource($this->whenLoaded('owner')),
            'status' => $this->status,
            'rating' => (float) $this->rating,
            'weight' => (float) $this->weight,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}