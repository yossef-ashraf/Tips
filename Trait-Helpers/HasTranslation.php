<?php
namespace App\Http\Traits;
use Spatie\Translatable\HasTranslations as BaseHasTranslations;
//https://github.com/spatie/laravel-translatable
trait HasTranslation
{
    use BaseHasTranslations;

    // use App\Http\Traits\HasTranslation;
    // class NewsItem extends Model
    // {
        // use HasTranslation;
    //     public $translatable = ['name'];
    // }

    public function toArray()
    {
        $attributes = parent::toArray();
        // dd(app()->getLocale() , app()->getLocale() !== 'admin');
        // var_dump($attributes);
            if (app()->getLocale() !== 'admin') {
            // dd($this->getTranslatableAttributes());
            foreach ($this->getTranslatableAttributes() as $field) {
                // var_dump($field);
                $attributes[$field] = $this->getTranslation($field, \App::getLocale());
            }
        }

        // dd($attributes);
        return $attributes;
    }
}
