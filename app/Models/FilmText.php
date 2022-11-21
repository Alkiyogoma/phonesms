<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmText
 * 
 * @property int $film_id
 * @property string $title
 * @property string|null $description
 *
 * @package App\Models
 */
class FilmText extends Model
{
	protected $table = 'film_text';
	protected $primaryKey = 'film_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'film_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description'
	];
}
