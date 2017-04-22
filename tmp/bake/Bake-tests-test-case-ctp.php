<?php
/**
 * Test Case bake template
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$isController = strtolower($type) === 'controller';

if ($isController) {
    $uses[] = 'Cake\TestSuite\IntegrationTestCase';
} else {
    $uses[] = 'Cake\TestSuite\TestCase';
}
sort($uses);
?>
<CakePHPBakeOpenTagphp
namespace <?= $baseNamespace; ?>\Test\TestCase\<?= $subNamespace ?>;

<?php foreach ($uses as $dependency): ?>
use <?= $dependency; ?>;
<?php endforeach; ?>

/**
 * <?= $fullClassName ?> Test Case
 */
<?php if ($isController): ?>
class <?= $className ?>Test extends IntegrationTestCase
{
<?php else: ?>
class <?= $className ?>Test extends TestCase
{
<?php endif; ?>
<?php if (!empty($properties)): ?>
<?php foreach ($properties as $propertyInfo): ?>

    /**
     * <?= $propertyInfo['description'] ?>

     *
     * @var <?= $propertyInfo['type'] ?>

     */
    public $<?= $propertyInfo['name'] ?><?php if (isset($propertyInfo['value'])): ?> = <?= $propertyInfo['value'] ?><?php endif; ?>;
<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($fixtures)): ?>

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [<?= $this->Bake->stringifyList(array_values($fixtures)) ?>];
<?php endif; ?>
<?php if (!empty($construction)): ?>

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
<?php if ($preConstruct): ?>
        <?= $preConstruct ?>

<?php endif; ?>
        $this-><?= $subject . ' = ' . $construction ?>

<?php if ($postConstruct): ?>
        <?= $postConstruct ?>

<?php endif; ?>
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this-><?= $subject ?>);

        parent::tearDown();
    }
<?php endif; ?>
<?php foreach ($methods as $method): ?>

    /**
     * Test <?= $method ?> method
     *
     * @return void
     */
    public function test<?= Inflector::camelize($method) ?>()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
<?php endforeach; ?>
<?php if (empty($methods)): ?>

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
<?php endif; ?>
}
