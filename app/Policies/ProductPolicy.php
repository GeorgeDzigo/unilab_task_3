<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can Update or Delete Product
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function actions(User $user, Product $product)
    {
        return $user->id == $product->user_id;
    }
}
