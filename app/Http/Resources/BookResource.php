<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_paid' => $this->is_paid,
            'price' => $this->price,
            'author_id' => $this->author_id,
            'section_id' => $this->section_id,
            'image' => $this->image,
            'image_url' => asset($this->image),
            'file_url' => asset($this->file_url),
            'created_at' => $this->created_at,
        ];
    }
}
