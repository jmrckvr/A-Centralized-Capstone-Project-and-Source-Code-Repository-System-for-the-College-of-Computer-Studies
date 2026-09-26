<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['owner_id', 'category_id', 'title', 'slug', 'description', 'abstract', 'objectives', 'program', 'section', 'academic_year', 'adviser', 'status', 'repository_url', 'submitted_at'];
    protected $casts = ['submitted_at' => 'datetime'];

    public function getRouteKeyName(): string { return 'slug'; }

    public function owner(): BelongsTo { return $this->belongsTo(User::class, 'owner_id'); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function members(): BelongsToMany { return $this->belongsToMany(User::class, 'project_members')->withPivot('role')->withTimestamps(); }
    public function technologies(): BelongsToMany { return $this->belongsToMany(Technology::class, 'project_technologies')->withTimestamps(); }
    public function files(): HasMany { return $this->hasMany(ProjectFile::class); }
    public function submissions(): HasMany { return $this->hasMany(Submission::class); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }
}
