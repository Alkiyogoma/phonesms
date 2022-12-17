<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentConfirm
 * @package App\Models
 */
class PaymentRequest extends Model
{
	protected $table = 'payment_requests';

	protected $casts = [
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'amount',
		'reference',
		'network',
		'transaction_id',
		'created_at',
		'price',
		'quantity',
		'price',
		'user_id',
		'token',
		'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function referExam()
	{
		return $this->belongsTo(ReferExam::class, 'exam_id', 'id');
	}
	
	public function exam()
	{
		return $this->belongsTo(Exam::class, 'exam_id', 'id');
	}
}
