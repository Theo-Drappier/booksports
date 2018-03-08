<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fields;

class Bookings extends Model
{
    //

    public function getFieldRow()
    {
        $field = Fields::where('id', $this->field_id)->first();
        return $field;
    }
}
