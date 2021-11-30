<?php

namespace Army\Weapon;

abstract class WeaponForge
{
    abstract public function createMeleeWeapon():Weapon;
    abstract public function createRangeWeapon():Weapon;
}