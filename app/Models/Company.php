<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'cif',
        'antiquity',
        'annual_billing',
    ];

    // Define the one-to-many relationship with User
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function financialInformation()
    {
        return $this->hasMany(FinancialInformation::class);
    }

    public function legalInformation()
    {
        return $this->hasMany(LegalInformation::class);
    }

    public function taxInformation()
    {
        return $this->hasMany(TaxInformation::class);
    }
}
