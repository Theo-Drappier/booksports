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

    public function setBookingDateFormat() {
        $valueSplit = explode('-', $this->booking_date);
        $result = $valueSplit[2].'/'.$valueSplit[1].'/'.$valueSplit[0];
        return $result;
    }
}
