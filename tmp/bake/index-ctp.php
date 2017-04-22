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
?>
<CakePHPBakeOpenTagphp
/**
  * @var \<?= $namespace ?>\View\AppView $this
  */
CakePHPBakeCloseTag>
<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('New <?= $singularHumanName ?>'), ['action' => 'add']) CakePHPBakeCloseTag></li>
<?php
    $done = [];
    foreach ($associations as $type => $data):
        foreach ($data as $alias => $details):
            if (!empty($details['navLink']) && $details['controller'] !== $this->name && !in_array($details['controller'], $done)):
?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('List <?= $this->_pluralHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'index']) CakePHPBakeCloseTag></li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('New <?= $this->_singularHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'add']) CakePHPBakeCloseTag></li>
<?php
                $done[] = $details['controller'];
            endif;
        endforeach;
    endforeach;
?>
    </ul>
</nav>
<div class="<?= $pluralVar ?> index large-9 medium-8 columns content">
    <h3><CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<?php foreach ($fields as $field): ?>
                <th scope="col"><CakePHPBakeOpenTag= $this->Paginator->sort('<?= $field ?>') CakePHPBakeCloseTag></th>
<?php endforeach; ?>
                <th scope="col" class="actions"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
            </tr>
        </thead>
        <tbody>
            <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
            <tr>
<?php        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
?>
                <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
<?php
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
?>
                <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
                } else {
?>
                <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
?>
                <td class="actions">
                    <CakePHPBakeOpenTag= $this->Html->link(__('View'), ['action' => 'view', <?= $pk ?>]) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Html->link(__('Edit'), ['action' => 'edit', <?= $pk ?>]) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Form->postLink(__('Delete'), ['action' => 'delete', <?= $pk ?>], ['confirm' => __('Are you sure you want to delete # {0}?', <?= $pk ?>)]) CakePHPBakeCloseTag>
                </td>
            </tr>
            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <CakePHPBakeOpenTag= $this->Paginator->first('<< ' . __('first')) CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->prev('< ' . __('previous')) CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->numbers() CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->next(__('next') . ' >') CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->last(__('last') . ' >>') CakePHPBakeCloseTag>
        </ul>
        <p><CakePHPBakeOpenTag= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) CakePHPBakeCloseTag></p>
    </div>
</div>
