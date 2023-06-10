<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'user' => [
                'id'=>(string)$this->user->id,
                'name'=>$this->user->name,
                'email'=>$this->user->email,
            ],
            'post' =>
            [
                'id' => (string) $this->id,
                'name' => $this->name,
                'description' => $this->description,
            ]

        ];

    }
}