<?php
class SearchManager
{
    /**
     * Returns an array with companies names which matches with the person badges
     *
     * @param array $person_badges
     * @param array $companies
     * @return Company[]
     */
    public function searchCompanies(array &$person_badges, array $companies)
    {
        $approvedCompanies = array();

        foreach ($companies as $company) {
            $rules = $company->getRules();
            $requirements = array();

            for ($i = 0; $i < sizeof($rules) - 1; $i++) {
                $match_rule = false;

                if (sizeof($rules[ $i ]) > 0) {
                    foreach ($person_badges as $person_badge) {
                        if (in_array($person_badge, $rules[ $i ])) {
                            $condition = $rules[ $i ][ sizeof($rules[ $i ]) - 1 ];
                            if ($condition == 'and') {
                                foreach ($rules[ $i ] as $item) {
                                    if (!in_array($item, $person_badges)) {
                                        $match_rule = false;
                                        break;
                                    }
                                }
                            } else {
                                $match_rule = true;
                                break;
                            }
                        }
                    }
                } else {
                    $match_rule = true;
                }
                $requirements[] = $match_rule;
            }

            $company_match = true;
            if ($rules[ sizeof($rules) - 1 ] == 'and') {
                foreach ($requirements as $requirement) {
                    if (!$requirement) {
                        $company_match = false;
                        break;
                    }
                }
            } else {
                $company_match = false;
                foreach ($requirements as $requirement) {
                    if ($requirement) {
                        $company_match = true;
                        break;
                    }
                }
            }

            if ($company_match) {
                $approvedCompanies[] = $company;
            }
        }

        return $approvedCompanies;
    }
}
