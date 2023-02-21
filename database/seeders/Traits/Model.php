<?php namespace Database\Seeders\Traits;

use Modules\Support\Traits\PrefixedModel;
use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * Abstract Model class.
 *
 * @abstract
 * @extends Eloquent
 */
abstract class Model extends Eloquent
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use PrefixedModel;
}
