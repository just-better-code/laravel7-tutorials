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
        $baseHidden = parent::getHidden();

        $authHidden = array_filter($this->authView(), function ($attr) {
            return $this->userCanViewAttribute($attr);
        });

        return array_merge($baseHidden, $authHidden);
    }

    public function getGuarded(): array
    {
        $this->clearGuarded();
        $baseGuarded = parent::getGuarded();

        $authGuarded = array_filter($this->authUpdate(), function ($attr) {
            return $this->userCanUpdateAttribute($attr);
        });

        return array_merge($baseGuarded, $authGuarded);
    }

    private function clearGuarded()
    {
        if (in_array('*', $this->guarded) && !empty($this->authUpdate())) {
            $this->guard([]);
        }
    }

    public function getAttribute($key)
    {
        if (!$this->userCanViewAttribute($key)) {
            return null;
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        if (!$this->userCanUpdateAttribute($key)) {
            return $this;
        }

        return parent::setAttribute($key, $value);
    }

    private function userCanViewAttribute(string $attribute): bool
    {
        if (!in_array($attribute, $this->authView())) {
            return true;
        }

        /** @var User $user */
        $user = auth()->user();

        return $user->can("view-attr-$attribute-" . self::class);
    }

    private function userCanUpdateAttribute(string $attribute): bool
    {
        if (!in_array($attribute, $this->authUpdate())) {
            return true;
        }

        /** @var User $user */
        $user = auth()->user();

        return $user->can("update-attr-$attribute-" . self::class);
    }
}
