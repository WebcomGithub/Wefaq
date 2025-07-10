<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'status','file'];

    protected $table = 'complaints';

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'subject' => 'string',
        'message' => 'string',
        'status' => 'boolean',
        'file' => 'string',
    ];

    const ALL = 2;

    const READ = 1;

    const UNREAD = 0;

    const STATUS = [
        self::ALL => 'All',
        self::READ => 'Read',
        self::UNREAD => 'Unread',
    ];
}
