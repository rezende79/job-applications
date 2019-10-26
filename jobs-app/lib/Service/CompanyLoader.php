<?php
class CompanyLoader
{
    /**
     * Returns an array of Company objects
     *
     * @return Company[]
     */
    public function getCompanies()
    {
        return array(
            new Company(
                'Company A',
                array(
                        array(
                            'apartment',
                            'house',
                            'or'
                        ),
                        array(
                            'property_insurance',
                            'none'
                        ),
                        'and'
                    )
            ),
            new Company(
                'Company B',
                array(
                        array(
                            '5_door_car',
                            '4_door_car',
                            'or'
                        ),
                        array(
                            'drivers_licence',
                            'car_insurance',
                            'and'
                        ),
                        'and'
                    )
            ),
            new Company(
                'Company C',
                array(
                        array(
                            'social_security',
                            'work_permit',
                            'and'
                        ),
                        'none'
                    )
            ),
            new Company(
                'Company D',
                array(
                        array(
                            'apartment',
                            'flat',
                            'house',
                            'or'
                        ),
                        'none'
                    )
            ),
            new Company(
                'Company E',
                array(
                        array(
                            'drivers_licence',
                            'none'
                        ),
                        array(
                            '2_door_car',
                            '3_door_car',
                            '4_door_car',
                            '5_door_car',
                            'or'
                        ),
                        'and'
                    )
            ),
            new Company(
                'Company F',
                array(
                        array(
                            'scooter',
                            'bike',
                            'motorcycle',
                            'or'
                        ),
                        array(
                            'drivers_licence',
                            'motorcycle_insurance',
                            'and'
                        ),
                        'and'
                    )
            ),
            new Company(
                'Company G',
                array(
                        array(
                            'massage_qualification',
                            'liability_licence',
                            'and'
                        ),
                        'none'
                    )
            ),
            new Company(
                'Company H',
                array(
                        array(
                            'storage_place',
                            'garage',
                            'or'
                        ),
                        'none'
                    )
            ),
            new Company(
                'Company J',
                array(
                        array(),
                        'none'
                    )
            ),
            new Company(
                'Company K',
                array(
                        array(
                            'paypal_account',
                        ),
                        'none'
                    )
            ),
        );
    }
}
