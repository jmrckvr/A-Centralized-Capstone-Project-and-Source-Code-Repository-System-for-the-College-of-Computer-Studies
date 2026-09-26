<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectFile extends Model
{
    use SoftDeletes;

    protected $table = 'files';
    protected $fillable = ['project_id', 'uploaded_by', 'name', 'path', 'mime_type', 'size', 'visibility'];
    public function project(): BelongsTo { return $this->belongsTo(Project::class); }
    public function uploader(): BelongsTo { return $this->belongsTo(User::class, 'uploaded_by'); }
}
