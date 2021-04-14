<?php
/**
 * Default entity attribute mapper
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Mediarox\EavPropertyMapper\Plugin\Entity\Setup;

class PropertyMapper
{
    /**
     * Map input attribute properties to storage representation
     *
     * @param array $input
     * @param int $entityTypeId
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeMap($subject, array $input, int $entityTypeId)
    {
        foreach ($input as $key => $value) {
            $input = $this->check($input, $key);
        }

        return [$input, $entityTypeId];
    }

    private function check($array, $key){
        switch ($key){
            case'backend_model': $newKey = 'backend';
                break;
            case'backend_type': $newKey = 'type';
                break;
            case'backend_table': $newKey = 'table';
                break;
            case'frontend_model': $newKey = 'frontend';
                break;
            case'frontend_input': $newKey = 'input';
                break;
            case'frontend_label': $newKey = 'label';
                break;
            case'source_model': $newKey = 'source';
                break;
            case'is_required': $newKey = 'required';
                break;
            case'is_user_defined': $newKey = 'user_defined';
                break;
            case'default_value': $newKey = 'default';
                break;
            case'is_unique': $newKey = 'unique';
                break;
            case'is_global': $newKey = 'global';
                break;
            default: $newKey = $key;
        }

        if(array_key_exists($key, $array)) {
            $array[$newKey] = $array[$key];
            unset($array[$key]);
        }
        return $array;
    }
}
