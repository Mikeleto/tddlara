<?php

namespace Tests\Feature\Admin;

use App\Profession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListProfessionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_professions_list()
    {
        factory(Profession::class)->create(['title' => 'Diseñador']);
        factory(Profession::class)->create(['title' => 'Programador']);
        factory(Profession::class)->create(['title' => 'Administrador']);

        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSeeInOrder([
                'Administrador',
                'Diseñador',
                'Programador',asdasdadsasdh


                ñajsdjajsdljañsjdpojasd

                ashdljaksd
                asdjasjdjadsjakdjasd

                asndajsdjasdjajsdas
                da
                
            ]);
    }
}
