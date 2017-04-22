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

$annotations = [];
foreach ($associations as $type => $assocs) {
    foreach ($assocs as $assoc) {
        $typeStr = Inflector::camelize($type);
        $annotations[] = "@property \Cake\ORM\Association\\{$typeStr} \${$assoc['alias']}";
    }
}
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity} get(\$primaryKey, \$options = [])";
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity} newEntity(\$data = null, array \$options = [])";
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity}[] newEntities(array \$data, array \$options = [])";
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity}|bool save(\\Cake\\Datasource\\EntityInterface \$entity, \$options = [])";
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity} patchEntity(\\Cake\\Datasource\\EntityInterface \$entity, array \$data, array \$options = [])";
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity}[] patchEntities(\$entities, array \$data, array \$options = [])";
$annotations[] = "@method \\{$namespace}\\Model\\Entity\\{$entity} findOrCreate(\$search, callable \$callback = null, \$options = [])";
foreach ($behaviors as $behavior => $behaviorData) {
    $annotations[] = "@mixin \Cake\ORM\Behavior\\{$behavior}Behavior";
}
?>
<CakePHPBakeOpenTagphp
namespace <?= $namespace ?>\Model\Table;

<?php
$uses = [
    'use Cake\ORM\Query;',
    'use Cake\ORM\RulesChecker;',
    'use Cake\ORM\Table;',
    'use Cake\Validation\Validator;'
];
sort($uses);
echo implode("\n", $uses);
?>


<?= $this->DocBlock->classDescription($name, 'Model', $annotations) ?>

class <?= $name ?>Table extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

<?php if (!empty($table)): ?>
        $this->setTable('<?= $table ?>');
<?php endif ?>
<?php if (!empty($displayField)): ?>
        $this->setDisplayField('<?= $displayField ?>');
<?php endif ?>
<?php if (!empty($primaryKey)): ?>
<?php if (count($primaryKey) > 1): ?>
        $this->setPrimaryKey([<?= $this->Bake->stringifyList((array)$primaryKey, ['indent' => false]) ?>]);
<?php else: ?>
        $this->setPrimaryKey('<?= current((array)$primaryKey) ?>');
<?php endif ?>
<?php endif ?>
<?php if (!empty($behaviors)): ?>

<?php endif; ?>
<?php foreach ($behaviors as $behavior => $behaviorData): ?>
        $this->addBehavior('<?= $behavior ?>'<?= $behaviorData ? ", [" . implode(', ', $behaviorData) . ']' : '' ?>);
<?php endforeach ?>
<?php if (!empty($associations['belongsTo']) || !empty($associations['hasMany']) || !empty($associations['belongsToMany'])): ?>

<?php endif; ?>
<?php foreach ($associations as $type => $assocs): ?>
<?php foreach ($assocs as $assoc):
	$alias = $assoc['alias'];
	unset($assoc['alias']);
?>
        $this-><?= $type ?>('<?= $alias ?>', [<?= $this->Bake->stringifyList($assoc, ['indent' => 3]) ?>]);
<?php endforeach ?>
<?php endforeach ?>
    }
<?php if (!empty($validation)): ?>

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
<?php
foreach ($validation as $field => $rules):
    $validationMethods = [];
    foreach ($rules as $ruleName => $rule):
        if ($rule['rule'] && !isset($rule['provider'])):
            $validationMethods[] = sprintf("->%s('%s')", $rule['rule'], $field);
        elseif ($rule['rule'] && isset($rule['provider'])):
            $validationMethods[] = sprintf(
                "->add('%s', '%s', ['rule' => '%s', 'provider' => '%s'])",
                $field,
                $ruleName,
                $rule['rule'],
                $rule['provider']
            );
        endif;

        if (isset($rule['allowEmpty'])):
            if (is_string($rule['allowEmpty'])):
                $validationMethods[] = sprintf(
                    "->allowEmpty('%s', '%s')",
                    $field,
                    $rule['allowEmpty']
                );
            elseif ($rule['allowEmpty']):
                $validationMethods[] = sprintf(
                    "->allowEmpty('%s')",
                    $field
                );
            else:
                $validationMethods[] = sprintf(
                    "->requirePresence('%s', 'create')",
                    $field
                );
                $validationMethods[] = sprintf(
                    "->notEmpty('%s')",
                    $field
                );
            endif;
        endif;
    endforeach;

    if (!empty($validationMethods)):
        $lastIndex = count($validationMethods) - 1;
        $validationMethods[$lastIndex] .= ';';
        ?>
        $validator
<?php foreach ($validationMethods as $validationMethod): ?>
            <?= $validationMethod ?>

<?php endforeach; ?>

<?php
    endif;
endforeach;
?>
        return $validator;
    }
<?php endif ?>
<?php if (!empty($rulesChecker)): ?>

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
<?php foreach ($rulesChecker as $field => $rule): ?>
        $rules->add($rules-><?= $rule['name'] ?>(['<?= $field ?>']<?= !empty($rule['extra']) ? ", '$rule[extra]'" : '' ?>));
<?php endforeach; ?>

        return $rules;
    }
<?php endif; ?>
<?php if ($connection !== 'default'): ?>

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return '<?= $connection ?>';
    }
<?php endif; ?>
}
