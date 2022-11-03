<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'article_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'parentcatid_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function parentcatidArticleCategories()
    {
        return $this->hasMany(ArticleCategory::class, 'parentcatid_id', 'id');
    }

    public function parentcatid()
    {
        return $this->belongsTo(ArticleCategory::class, 'parentcatid_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
