<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'       => 'tasks',
            'id'         => (string)$this->id,
            'attributes' => [
                'name'       => $this->name,
                'desription' => $this->description,
                'status_id'  => (string)$this->status_id,
                'user_id'    => (string)$this->user_id,
                'created_at' => (string)$this->created_at,
            ],
            'relationships' => new TaskRelationshipResource($this),
            'links'         => [
                'self' => route('tasks.show', ['task' => $this->id]),
            ],
        ];
    }
}
