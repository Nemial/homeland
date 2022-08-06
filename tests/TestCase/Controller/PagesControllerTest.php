<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\PagesController Test Case
 *
 * @uses \App\Controller\PagesController
 */
class PagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\PagesController::index()
     */
    public function testMain(): void
    {
        $this->get('/');
        $this->assertResponseOk();
    }
}
