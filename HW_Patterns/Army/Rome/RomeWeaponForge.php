<?php

namespace Army\Weapon;

class RomeWeaponForge extends WeaponForge
{

    public function createMeleeWeapon(): Weapon
    {
        return new RomeSword();
    }

    public function createRangeWeapon(): Weapon
    {
        return new Bow();
    }
}