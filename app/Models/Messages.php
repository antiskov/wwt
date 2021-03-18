<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed dialog_id
 * @property mixed initiator_id
 * @property mixed respondent_id
 * @property mixed text
 * @property int|mixed is_readed
 */
class Messages extends Model
{
    use HasFactory;
}
