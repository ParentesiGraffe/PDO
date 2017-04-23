<?php

/**
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 */
namespace Slim\PDO\Clause;

class Grouping extends Conditional
{
    /**
     * @var string $rule
     */
    protected $rule;

    /**
     * @var Conditional[] $value
     */
    protected $value;

    /**
     * Grouping constructor.
     * @param string $rule
     * @param Conditional[] $clauses
     */
    public function __construct($rule, array $clauses)
    {
        $this->rule = $rule;
        $this->value = $clauses;
    }

    public function getValues()
    {
        $values = array();

        foreach ($this->value as $clause) {
            $values = array_merge($values, $clause->getValues());
        }

        return $values;
    }

    public function __toString()
    {
        return '(' . implode(") {$this->rule} (", $this->clauses) . ')';
    }
}
