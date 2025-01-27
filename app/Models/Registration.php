<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';

    protected $fillable = [
        'name',
        'father_spouse_name',
        'address',
        'locality_area',
        'city',
        'district',
        'state',
        'contact_no',
        'alternative_no',
        'mail_id',
        'marital_status',
        'family_members',
        'company_name',
        'company_address',
        'product_details',
        'product_category',
        'target_audience',
        'social_media_links',
        'product_cost',
        'id_proof',
        'age',
        'date_of_birth',
        'services_needed'
    ];
}
