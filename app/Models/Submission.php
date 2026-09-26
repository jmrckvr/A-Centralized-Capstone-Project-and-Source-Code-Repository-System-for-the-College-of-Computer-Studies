<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Submission extends Model
{
    protected $fillable = ['project_id', 'submitted_by', 'version', 'status', 'note', 'submitted_at'];
    protected $casts = ['submitted_at' => 'datetime'];
    public function project(): BelongsTo { return $this->belongsTo(Project::class); }
    public function submitter(): BelongsTo { return $this->belongsTo(User::class, 'submitted_by'); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }
}
