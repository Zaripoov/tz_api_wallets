<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class WalletTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_wallet_list(): void
    {
        $get = $this->get( 'v1/list');
        $responseContent = json_decode($get->content(), true);

        $this->assertJsonDocumentMatchesSchema($responseContent, [
            'type' => 'object',
            'required' => ['data'],
            'properties' => [
                'data' => [
                    'type' => 'array',
                    'data' => [
                        'type' => 'object',
                        'required' => ['id', 'currency', 'public_key', 'balance',],
                        'properties' => [
                            'id' => ['type' => 'integer'],
                            'currency' => ['type' => 'string'],
                            'public_key' => ['type' => 'string'],
                            'balance' => ['type' => 'integer'],
                        ],
                    ],
                ],
            ],
        ]);

        $get->assertStatus(Response::HTTP_OK);
    }

    /**
     * A basic feature test example.
     */
    public function test_wallet_create(): void
    {
        $get = $this->post( 'v1/create', ['currency' => 'eth']);
        $responseContent = json_decode($get->content(), true);

        $this->assertJsonDocumentMatchesSchema($responseContent, [
            'type' => 'object',
            'required' => ['data'],
            'properties' => [
                'data' => [
                    'type' => 'object',
                    'data' => [
                        'type' => 'object',
                        'required' => ['id', 'currency', 'public_key', 'balance',],
                        'properties' => [
                            'id' => ['type' => 'integer'],
                            'currency' => ['type' => 'string'],
                            'public_key' => ['type' => 'string'],
                            'balance' => ['type' => 'integer'],
                        ],
                    ],
                ],
            ],
        ]);

        $get->assertStatus(Response::HTTP_CREATED);
    }
}
