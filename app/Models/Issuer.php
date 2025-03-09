<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Issuer extends Model
    {
        use SoftDeletes;
        protected $guarded = ['id'];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function accounts(): BelongsToMany
        {
            return $this->belongsToMany(Account::class);
        }

        public function certificate(): HasOne
        {
            return $this->hasOne(Certificate::class);
        }

        public function issuerDetail(): HasOne
        {
            return $this->hasOne(IssuerDetail::class);
        }

        public function taxRegime(): BelongsTo
        {
            return $this->belongsTo(TaxRegime::class, 'regime_id');
        }

    }
