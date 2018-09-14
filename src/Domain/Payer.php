<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 13:46
 */

namespace Bookstore\Domain;


interface Payer
{
    public function pay(float $amount);
    public function isExtendOfTaxes(): bool;
}