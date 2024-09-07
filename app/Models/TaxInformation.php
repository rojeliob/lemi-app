<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'modelo_347',
        'modelo_349',
        'vat_settlements',
        'irpf_settlements',
        'modelo_390_previous_year',
        'modelo_347_previous_year',
        'payment_certificates_social_security_taxes',
        'company_assets_declaration',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
