<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ['project_id', 'submission_id', 'reviewer_id', 'decision', 'feedback'];
    public function project(): BelongsTo { return $this->belongsTo(Project::class); }
    public function submission(): BelongsTo { return $this->belongsTo(Submission::class); }
    public function reviewer(): BelongsTo { return $this->belongsTo(User::class, 'reviewer_id'); }
}
