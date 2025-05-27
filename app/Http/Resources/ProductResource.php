<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage; // لاستخدام تخزين الصور

class ProductResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $photos = [];
        if (is_array($this->album_photos)) {
            foreach ($this->album_photos as $photoPath) {
                // التأكد من أن المسار يبدأ بـ 'public/' أو ما يناسب إعداداتك
                // وإرجاع الـ URL العام للصورة
                $photos[] = Storage::url($photoPath);
            }
        }
        // أو إذا كنت تخزن المسارات الكاملة مباشرة في قاعدة البيانات
        // $photos = is_array($this->album_photos) ? $this->album_photos : [];


        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'price' => (float) $this->price,
            // استخدام ProductTypeResource لتحويل بيانات النوع
            'type' => new ProductTypeResource($this->whenLoaded('type')), // العلاقة هي 'type' وليس 'productType'
            'album_photos' => $photos, // الآن سيحتوي على URLs قابلة للوصول
            'shape' => $this->shape,
            // استخدام UserResource لتحويل بيانات المالك
            'owner' => new UserResource($this->whenLoaded('owner')),
            'status' => $this->status,
            'rating' => (float) $this->rating,
            'weight' => (float) $this->weight,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}