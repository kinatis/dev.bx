<?php

namespace Army\Weapon;

class BarbarianWeaponForge extends WeaponForge
{

    public function createMeleeWeapon(): Weapon
    {
        return new BarbarianAxe();
    }

    public function createRangeWeapon(): Weapon
    {
        return new BarbarianJavelin();
    }
}