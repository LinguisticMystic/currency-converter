<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(array $array, int[] $array1)
 */
class Currency extends Model
{
    use HasFactory;

    protected string $primaryKey = 'symbol';

    protected string $keyType = 'string';

    protected array $fillable = [
        'symbol',
        'rate'
    ];
}
