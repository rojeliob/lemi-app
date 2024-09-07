<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_activity',
        'business_description',
        'number_of_employees',
        'corporate_taxes',
        'balance_sheet_current_year',
        'bank_debt_summary',
        'cirbe',
        'vat_summary',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
