<?php

namespace App\Services\Interfaces\LinkProductive;

interface ServiceCategoryInterface
{
    public function getServiceCategories();
    public function getServiceCategoriesPaginate();
    public function storeServiceCategory(array $data);
}
