<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

/**
 * Class MatchesPassword
 * @package App\Validation\Rules
 */
class MatchesPassword extends AbstractRule {
    /**
     * @var
     */
    protected $password;

    /**
     * @param $password
     */
    public function __construct($password) {
        $this->password = $password;
    }

    /**
     * @param $input
     * @return bool
     */
    public function validate($input) {
        return password_verify($input, $this->password);
    }
}