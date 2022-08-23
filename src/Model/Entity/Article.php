<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property \App\Model\Entity\User $user
 */
class Article extends Entity
{
    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';
    public const FIELD_TITLE = 'title';
    public const FIELD_BODY = 'body';
    public const FIELD_USER_ID = 'user_id';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_USER = 'user';
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'created_at' => true,
        'updated_at' => true,
        'title' => true,
        'body' => true,
    ];
}
