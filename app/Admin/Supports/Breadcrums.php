<?php

namespace App\Admin\Supports;

class Breadcrums
{
        /**
     * Mảng chứa breadcrums
     *
     * @var array
     */
    public array $breadcrums = [];

    public function getBreadcrums(){
        return $this->breadcrums;
    }

    public function add(string $label, string $url = ''){
        $this->breadcrums[] = [
            'label' => $label,
            'url' => $url
        ];
        return $this;
    }
}