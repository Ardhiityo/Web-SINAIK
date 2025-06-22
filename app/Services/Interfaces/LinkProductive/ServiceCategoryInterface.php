<?php

namespace App\Services\Interfaces\LinkProductive;

interface ServiceCategoryInterface
{
    public function getServiceCategories();
    public function storeServiceCategory(array $data);
}
