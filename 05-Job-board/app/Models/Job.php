<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category',
    ];

    public function employer(): BelongsTo{
        return $this->belongsTo(Employer::class);
    }
    public function jobApplications(): HasMany{
        return $this->hasMany(JobApplication::class);
    }

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Sales', 'Finance', 'Marketing', 'Engineering'];

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder{

        return
        $query->when(
            $filters['search'] ?? null, function ($query, $search){
                $query->where(function($query) use ($search){
                    $query->where('title', 'LIKE', '%'. $search .'%')
                        ->orWhere('description', 'LIKE', '%'. $search .'%')
                        ->orWhereHas('employer', function ($query) use ($search){
                            $query->where('company_name', 'LIKE', '%'. $search .'%');
                        });
                });
            }
        )->when(
            $filters['min_salary'] ?? null, function ($query, $minSalary){
               $query->where('salary', '>=', $minSalary);
            }
        )->when(
            $filters['max_salary'] ?? null, function ($query, $maxSalary){
               $query->where('salary', '<=', $maxSalary);
            }
        )->when(
            $filters['experience'] ?? null, function( $query, $experience){
                $query->where('experience', $experience);
            }
        )->when(
            $filters['category'] ?? null, function( $query, $category){
                $query->where('category', $category);
            }
        );
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool{
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplications',
                fn ($query)=> $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }
}
