<?php

namespace App\Http\Resources;

use App\Models\Recipe;
use Illuminate\Http\Resources\Json\JsonResource;

class SavedRecipesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'recipe' => new RecipesResource(Recipe::where('id', $this->recipeId)->first()),
        ];
    }
}
