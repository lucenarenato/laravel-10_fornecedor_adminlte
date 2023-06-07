<?php

namespace App\Validators;

use Illuminate\Contracts\Validation\Factory;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class FuncionariosValidator
 * @package App\Validators
 */
class FornecedorValidator extends LaravelValidator
{
    public function __construct(Factory $validator)
       {
           $this->rules = [
               ValidatorInterface::RULE_CREATE => [

               ],
               ValidatorInterface::RULE_UPDATE => [
               ]
           ];
           parent::__construct($validator);
       }

       /**
        * @var array
        * Exemplo de rules:
        * 'campo_do_banco' => 'required|email',
        */

    protected $messages = [];
    protected $attributes = [];
}
