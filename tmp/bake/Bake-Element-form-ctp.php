<?php
/**
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

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->hasBehavior('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></li>
<?php if (strpos($action, 'add') === false): ?>
        <li><CakePHPBakeOpenTag= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $<?= $singularVar ?>-><?= $primaryKey[0] ?>],
                ['confirm' => __('Are you sure you want to delete # {0}?', $<?= $singularVar ?>-><?= $primaryKey[0] ?>)]
            )
        CakePHPBakeCloseTag></li>
<?php endif; ?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('List <?= $pluralHumanName ?>'), ['action' => 'index']) CakePHPBakeCloseTag></li>
<?php
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('List <?= $this->_pluralHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'index']) CakePHPBakeCloseTag></li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('New <?= $this->_singularHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'add']) CakePHPBakeCloseTag></li>
<?php
                    $done[] = $details['controller'];
                }
            }
        }
?>
    </ul>
</nav>
<div class="<?= $pluralVar ?> form large-9 medium-8 columns content">
    <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>) CakePHPBakeCloseTag>
    <fieldset>
        <legend><CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?> <?= $singularHumanName ?>') CakePHPBakeCloseTag></legend>
        <CakePHPBakeOpenTagphp
<?php
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
?>
            echo $this->Form->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true]);
<?php
                } else {
?>
            echo $this->Form->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>]);
<?php
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
                $fieldData = $schema->column($field);
                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
?>
            echo $this->Form->control('<?= $field ?>', ['empty' => true]);
<?php
                } else {
?>
            echo $this->Form->control('<?= $field ?>');
<?php
                }
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
?>
            echo $this->Form->control('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]);
<?php
            }
        }
?>
        CakePHPBakeCloseTag>
    </fieldset>
    <CakePHPBakeOpenTag= $this->Form->button(__('Submit')) CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
</div>
