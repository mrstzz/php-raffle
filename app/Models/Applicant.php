<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{

    public function raffle(): BelongsTo
    {
        return $this->belongsTo(Raffle::class);
    }
}
