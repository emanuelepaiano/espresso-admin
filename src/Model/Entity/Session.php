<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $id
 * @property string $device
 * @property string $ip
 * @property string $ap
 * @property \Cake\I18n\Time $lastlog
 * @property \Cake\I18n\Time $expire
 * @property \Cake\I18n\Time $remove
 * @property string $browser
 * @property string $os
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Session extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
