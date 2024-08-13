<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcademicYearsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcademicYearsTable Test Case
 */
class AcademicYearsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AcademicYearsTable
     */
    protected $AcademicYears;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AcademicYears',
        'app.Students',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AcademicYears') ? [] : ['className' => AcademicYearsTable::class];
        $this->AcademicYears = $this->getTableLocator()->get('AcademicYears', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AcademicYears);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AcademicYearsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AcademicYearsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
