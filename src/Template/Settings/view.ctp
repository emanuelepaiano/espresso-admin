<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setting'), ['action' => 'edit', $setting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setting'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settings view large-9 medium-8 columns content">
    <h3><?= h($setting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Param') ?></th>
            <td><?= h($setting->param) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($setting->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($setting->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($setting->id) ?></td>
        </tr>
    </table>
</div>
