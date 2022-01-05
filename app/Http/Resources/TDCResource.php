<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TDCResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'pin' => $this->pin,
            'valid_date' => $this->valid_date,
            'balance' => $this->balance,
            'status' => $this->status
        ];
    }
}
