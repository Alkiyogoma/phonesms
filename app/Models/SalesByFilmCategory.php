<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesByFilmCategory
 * 
 * @property string $category
 * @property float|null $total_sales
 *
 * @package App\Models
 */
class SalesByFilmCategory extends Model
{
	protected $table = 'sales_by_film_category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_sales' => 'float'
	];

	protected $fillable = [
		'category',
		'total_sales'
	];
}
