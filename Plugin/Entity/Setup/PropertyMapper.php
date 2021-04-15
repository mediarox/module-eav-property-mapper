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
    protected const EAV_PROPERTIES_LONG_TO_SHORT = [
        'backend_type' => 'type',
        'backend_model' => 'backend',
        'backend_table'=> 'table',
        'frontend_model'=> 'frontend',
        'frontend_input'=> 'input',
        'frontend_label'=> 'label',
        'source_model'=> 'source',
        'is_required'=> 'required',
        'is_user_defined'=> 'user_defined',
        'default_value'=> 'default',
        'is_unique'=> 'unique',
        'is_global'=> 'global'
    ];
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
            if(array_key_exists($key, self::EAV_PROPERTIES_LONG_TO_SHORT))
            {
                $shortProperty = self::EAV_PROPERTIES_LONG_TO_SHORT[$key];
                $input[$shortProperty] = $value;
                unset($input[$key]);
            }
        }

        return [$input, $entityTypeId];
    }
}
