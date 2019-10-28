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
    public function getApprovedCompanies(array &$person_badges, array $companies)
    {
        $approvedCompanies = array();

        foreach ($companies as $company) {
            $matched_rules_result = array();
            $company_rules = $company->getRules();
            $company_rules_conditional = $company_rules[ sizeof($company_rules) - 1 ]; // and | or | none

            for ($i = 0; $i < sizeof($company_rules) - 1; $i++) {
                $person_match_rule = false;
                if (sizeof($company_rules[ $i ]) > 0) {
                    $person_match_rule = $this->personMatchRules($person_badges, $company_rules[ $i ]);
                } else {
                    $person_match_rule = true;
                }
                $matched_rules_result[] = $person_match_rule;
            }

            if ($this->companyMatch($matched_rules_result, $company_rules_conditional)) {
                $approvedCompanies[] = $company;
            }
        }

        return $approvedCompanies;
    }

    /**
     * Receives an array with values of true or false from satisfied rules of a company by a person
     * and returns if this satisfied rules are aligned with the rules conditional (and, or, none)
     *
     * @param array $matched_rules_result
     * @param String $rules_conditional
     * @return Boolean
     */
    private function companyMatch(array $matched_rules_result, String $rules_conditional)
    {
        $company_match = true;
        switch ($rules_conditional) {
            case 'and':
                foreach ($matched_rules_result as $rule_result) {
                    if (!$rule_result) {
                        $company_match = false;
                        break;
                    }
                }
                break;
            case 'or' || 'none':
                $company_match = false;
                foreach ($matched_rules_result as $rule_result) {
                    if ($rule_result) {
                        $company_match = true;
                        break;
                    }
                }
                break;
        }
        return $company_match;
    }

    /**
     * Check if person characteristics satisfy the rules of a company
     *
     * @param array $person_badges
     * @param array $rules
     * @return Boolean
     */
    private function personMatchRules(array $person_badges, array $rules)
    {
        $match_rule = false;
        foreach ($person_badges as $person_badge) {
            if (in_array($person_badge, $rules)) {
                $rules_condition = $rules[ sizeof($rules) - 1 ];
                switch ($rules_condition) {
                    case 'and':
                        foreach ($rules as $rule) {
                            if (!in_array($rule, $person_badges)) {
                                $match_rule = false;
                                break;
                            }
                        }
                        break;
                    case 'or' || 'none':
                        $match_rule = true;
                        break;
                }
            }
        }
        return $match_rule;
    }
}
