<?php

namespace App\Models\Traits\Attributes;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttributes.
 */
trait UserAttributes
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password) : void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        if (
            (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        ) {
            $hash = $password;
        } else {
            $hash = Hash::make($password);
        }

        // Note: Password Histories are logged from the \App\Observer\User\UserObserver class
        $this->attributes['password'] = $hash;
    }

    /**
     * getFullNameAttribute function.
     *
     * @access public
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    /**
     * getNameAttribute function.
     *
     * @access public
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->full_name;
    }

    /**
     * setEmailAttribute function.
     *
     * @access public
     * @param mixed $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = self::normalizeEmail($value);
    }

    /**
	 * getInitialsAttribute function. Returns just the initials.
	 *
	 * @access public
	 * @return void
	 */
	public function getInitialsAttribute()
    {

        preg_match_all('/([[:word:]])[[:word:]]*/i', preg_replace('/(\(|\[).*(\)|\])/', '', $this->full_name), $matches);

        return implode('', end($matches));

/*
        $ret = '';
        foreach (explode(' ', $this->full_name) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
*/

    }

    /**
     * getPossessiveNameAttribute Returns full name with with trailing 's or ' if name ends in s.
     *
     * @access public
     * @return string
     */
    public function getPossessiveNameAttribute(): string
    {
        return sprintf('%s\'%s', $this->full_name, substr($this, -1) !== 's' ? 's' : '');
    }

    /**
     * getSortedNameAttribute Returns last + first for sorting.
     *
     * @access public
     * @return string
     */
    public function getSortedNameAttribute(): string
    {
        return $this->last_name ? "{$this->last_name}, {$this->first_name}" : $this->first_name;
    }

    /**
     * getFamiliarNameAttribute Returns first + last initial, such as "Jason F.".
     *
     * @access public
     * @return string
     */
    public function getFamiliarNameAttribute(): string
    {
        return $this->last_name ? "{$this->first_name} {$this->last_name[0]}." : $this->first_name;
    }

    /**
     * getMentionableNameAttribute Returns a mentionable version of the familiar name.
     *
     * @access public
     * @return void
     */
    public function getMentionableNameAttribute(): string
    {
        return strtolower(preg_replace('/\s+/', '', substr($this->familiar, 0, -1)));
    }

    /**
     * getAbbreviatedNameAttribute Returns first initial + last, such as "J. Fried".
     *
     * @access public
     * @return string
     */
    public function getAbbreviatedNameAttribute(): string
    {
        return $this->last_name ? "{$this->first_name[0]}. {$this->last_name}" : $this->first_name;
    }

}
