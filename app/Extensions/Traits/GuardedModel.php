<?php

namespace App\Extensions\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/** @mixin Model */
trait GuardedModel
{
    protected function authView(): array
    {
        return [];
    }

    protected function authUpdate(): array
    {
        return [];
    }

    public function getHidden(): array
    {
        $this->filterVisibility();

        return parent::getHidden();
    }

    public function getVisible(): array
    {
        $this->filterVisibility();

        return parent::getVisible();
    }

    public function isFillable($key)
    {
        if (in_array($key, $this->authView())) {
            return $this->userCanUpdateAttribute($key);
        }

        return parent::isFillable($key);
    }

    private function filterVisibility(): void
    {
        $this->makeHidden($this->authView());

        $authVisible = array_filter(
            $this->authView(),
            fn ($attr) => $this->userCanViewAttribute($attr)
        );

        $this->makeVisible($authVisible);
    }

    private function userCanViewAttribute(string $key): bool
    {
        /** @var User $user */
        $user = auth()->user();
        $ability = !empty($user) && $user->can("view-attr-$key-" . static::class);

        return $ability;
    }

    private function userCanUpdateAttribute(string $key): bool
    {
        /** @var User $user */
        $user = auth()->user();
        $ability = !empty($user) && $user->can("update-attr-$key-" . static::class);

        return $ability;
    }

    public function totallyGuarded()
    {
        $guarded = (
            count($this->getFillable()) === 0
            && count($this->authView()) === 0
            && $this->getGuarded() == ['*']
        );

        return  $guarded;
    }
}
