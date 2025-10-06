<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Http\Resources;

use App\Enums\Status;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mortezaa97\Regions\Http\Resources\CountyResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'county'=>$this->whenLoaded('county', CountyResource::make($this->county)),
            'title'=>$this->title,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'postal_code'=>$this->postal_code,
            'longitude'=>$this->longitude,
            'latitude'=>$this->latitude,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'status'=>Status::from((int) $this->status)?->label(),
            'created_by'=>$this->whenLoaded('created_by', UserResource::make($this->created_by)),
        ];
    }
}
