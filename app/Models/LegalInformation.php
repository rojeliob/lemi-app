<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_cif',
        'incorporation_documents',
        'real_ownership_certificate',
        'licenses_and_permits',
        'negative_certification_commercial_registry',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
