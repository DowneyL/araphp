<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/21
 * Time: 16:49
 */

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Articles
 * @package App\Http\Models
 * @property $id
 * @property $title
 * @property $content
 */
class Articles extends Model
{
    public $timestamps = false;
}