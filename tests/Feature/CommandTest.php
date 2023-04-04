<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\API\CommandeController;
use App\Models\Commande;

class CommandTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCommand()
    {
        $data = [
            'nom_client' => 'Test nom client',
            'produit' => 'Test produit',
            'quantite' => 2,
            'adresse_livraison' => 'Test adresse livraison',
        ];

        $response =  $this->post('/api/command/add', $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('commandes', $data);
    }

    public function testGetAllCommand(){
        $commande1 = Commande::create([
            'nom_client' => 'Test nom client',
            'produit' => 'Test produit',
            'quantite' => 4,
            'adresse_livraison' => 'Test adresse livraison',
        ]);
        $commande2 = Commande::create([
            'nom_client' => 'Test nom client 2',
            'produit' => 'Test produit 2',
            'quantite' => 2,
            'adresse_livraison' => 'Test adresse livraison 2',
        ]);

        // Call the route that returns all commands as JSON
        $response = $this->get('/api/commands');

        // Assert that the response has a successful HTTP status code
        $response->assertStatus(200);

        // Assert that the response content is JSON
        $response->assertHeader('Content-Type', 'application/json');

        // Assert that the response content is correct
        $response->assertJsonFragment(['nom_client' => 'Test nom client 2']);
        $response->assertJsonFragment(['adresse_livraison' => 'Test adresse livraison 2']);
    }

    public function testUpdateCommand()
    {
        // Create a test command
        $commande = Commande::create([
            'nom_client' => 'Nom client',
            'produit' => 'Produit',
            'quantite' => 4,
            'adresse_livraison' => 'Adresse livraison',
        ]);

        // Update the command
        $updatedCommande = [
            'nom_client' => 'Test nom client edit',
            'produit' => 'Test produit edit',
            'quantite' => 5,
            'adresse_livraison' => 'Test adresse livraison edit',
        ];
        $response = $this->post("/api/command/update/{$commande->id}", $updatedCommande);

        // Assert that the command was updated in the database
        //$this->assertDatabaseHas('commandes', $updatedCommande);

        // Assert that the response has a successful HTTP status code
        $response->assertStatus(200);

        // Assert that the response content is JSON
        $response->assertHeader('Content-Type', 'application/json');

        // Assert that the response content is correct
        $response->assertExactJson(['The command successfully updated']);
    }
}
