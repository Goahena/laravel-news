<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    // Tên bảng (không bắt buộc nếu tên trùng với tên model ở dạng số nhiều)
    protected $table = 'contacts';

    // Khóa chính (không bắt buộc nếu khóa chính là 'id')
    protected $primaryKey = 'contact_id';

    // Các trường được phép gán giá trị (Mass Assignment)
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'contact_content',
        'created_at',
        'update_at'
    ];
}
