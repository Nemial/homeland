<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Collection\Collection;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string $email
 * @property string $password
 * @property \App\Model\Entity\Group[] $groups
 * @property string $group_string
 * @property bool $is_admin
 * @property \App\Model\Entity\Article[] $articles
 */
class User extends Entity
{
    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';
    public const FIELD_EMAIL = 'email';
    public const FIELD_PASSWORD = 'password';
    public const FIELD_GROUPS = 'groups';
    public const FIELD_GROUP_STRING = 'group_string';
    public const FIELD_IS_ADMIN = 'is_admin';
	public const FIELD_ARTICLES = 'articles';
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
        'email' => true,
        'password' => true,
        'groups' => true,
    ];
    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($value): bool|string
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

    protected function _getGroupString(): string
    {
        if (isset($this->_fields['group_string'])) {
            return $this->_fields['group_string'];
        }

        if (empty($this->groups)) {
            return '';
        }

        $groups = new Collection($this->groups);
        $groupNames = $groups->map(function ($group) {
            return $group->name;
        })->toArray();

        return implode(', ', $groupNames);
    }

    protected function _getIsAdmin(): bool
    {
        if (isset($this->_fields['is_admin'])) {
            return $this->_fields['is_admin'];
        }


        if (empty($this->groups)) {
            return false;
        }

        $groups = new Collection($this->groups);
        $adminGroup = $groups->filter(function ($group) {
            return $group->name === 'admin';
        })->toArray();

        return !empty($adminGroup);
    }
}
