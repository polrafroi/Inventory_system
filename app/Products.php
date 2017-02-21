<?php
/**
 * Created by PhpStorm.
 * User: john.inhog
 * Date: 2/21/17
 * Time: 11:23 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model{

    protected $table = 'products';
    protected $primaryKey = 'id';

}