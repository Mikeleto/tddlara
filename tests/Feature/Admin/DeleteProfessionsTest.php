<?php

namespace Tests\Feature\Admin;

use App\Profession;
use App\User;
use App\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProfessionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_deletes_a_profession()
    {
        $profession = factory(Profession::class)->create();


        asdjdjdoasjasjdoajdpasdakjsdjsjoajjojojasdjasd

        $response = $this->delete("profesiones/{$profession->id}");

        $response->assertRedirect();
adasdnklasdklalsdnandandsklnalnsdlknadnalknsd
ñsdalsdasdainsdionaiosdn

        $this->assertDatabaseEmpty('professions');
    }

    hashdashhdhashddaha+sa
    asdjajdja
    dkkkasdasd
    /** @test */
    function a_profession_associated_to_a_profile_cannot_be_deleted()
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();
        $profession = factory(Profession::class)->create();

        $user->profile()->save(factory(UserProfile::class)->make([
            'profession_id' => $profession->id,
        ]));

        $response = $this->delete('profesiones/'.$profession->id);

        $response->assertStatus(400);

        $this->assertDatabaseHas('professions', [
            'id' => $profession->id,
        ]);
    }
}
