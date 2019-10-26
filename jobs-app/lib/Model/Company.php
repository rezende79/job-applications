<?php
class Company
{
    private $name = '';
    private $rules = array();

    public function __construct(String $name, array $rules)
    {
        $this->name = $name;
        $this->rules = $rules;
    }

    /**
     * Returns the name of the company
     *
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the rules of the company
     *
     * @return Array
     */
    public function getRules()
    {
        return $this->rules;
    }
}
