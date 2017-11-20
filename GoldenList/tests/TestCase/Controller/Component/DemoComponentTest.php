<?php
namespace GoldenList\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use GoldenList\Controller\Component\DemoComponent;

/**
 * GoldenList\Controller\Component\DemoComponent Test Case
 */
class DemoComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \GoldenList\Controller\Component\DemoComponent
     */
    public $Demo;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Demo = new DemoComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Demo);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
