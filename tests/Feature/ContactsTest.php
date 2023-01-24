<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;
use Laravel\Sanctum\Sanctum;

class ContactsTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function has_contacts_to_list()
    {
        Sanctum::actingAs(User::factory(1)->make()->first());

        $response = $this->get('/api/contacts');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_create_a_new_contact()
    {
        Sanctum::actingAs(User::factory(1)->make()->first());

        $response = $this->post('/api/contacts', [
            'name' => 'Charlys',
            'email' => 'Charly_Cha@mail.com',
            'phone' => '(00) 0 0000-0000'
        ]);

        $response->assertStatus(201);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_update_contact()
    {
        Sanctum::actingAs(User::factory(1)->make()->first());

        $contact = Contact::factory(1)->create()->first();

        $response = $this->put('/api/contacts/'. $contact->id, [
            'name' => 'Charlys',
            'email' => 'Charly_Cha@mail.com',
            'phone' => '(00) 0 0000-0000'
        ]);

        $response->assertStatus(200);
    }

     /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function is_able_delete_contact()
    {
        Sanctum::actingAs(User::factory(1)->make()->first());

        $contact = Contact::factory(1)->create()->first();

        $response = $this->delete('/api/contacts/'. $contact->id);

        $response->assertStatus(201);
    }
}
