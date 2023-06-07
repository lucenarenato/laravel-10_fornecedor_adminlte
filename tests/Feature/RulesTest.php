<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RulesTest extends TestCase
{
    public function testFormatoCpf()
    {
        $validator = \Validator::make([
            'valido' => '981.366.228-09'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCpf]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '08136622809'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCpf]
        ]);

        $this->assertTrue($validator->fails());
    }

    public function testFormatoCnpj()
    {
        $validator = \Validator::make([
            'valido' => '64.232.182/0001-09'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCnpj]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '00000000000000'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCnpj]
        ]);

        $this->assertTrue($validator->fails());
    }
}


