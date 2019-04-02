<?php

namespace App\Billing;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stripe {

    protected $key;

    public function __construct($key) {
        $this->key = $key;
    }

}
