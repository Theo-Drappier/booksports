<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fields;

class Bookings extends Model
{
    /**
     * Get the data of the external id field in external
     * @return \Illuminate\Http\Response
     */
    public function getFieldRow()
    {
        $field = Fields::where('id', $this->field_id)->first();
        return $field;
    }
}
