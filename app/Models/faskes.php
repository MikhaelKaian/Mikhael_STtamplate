<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faskes extends Model
{
    use HasFactory;
    protected $table = 'faskes';
    protected $fillable = [
        'faskes_pencatat',
        'jenis_faskes',
        'faskes_domisili'
    ];
    public static function getDataBooks()
   {
    $faskes = Book::all();

    $faskes_filter = [];

    $no = 1;
    for ($i=0; $i < $faskes->count(); $i++){
        $faskes_filter[$i]['no'] = $no++;
        $faskes_filter[$i]['faskes_pencatat'] = $faskes[$i]->faskes_pencatat;
        $faskes_filter[$i]['jenis_faskes'] = $faskes[$i]->jenis_faskes;
        $faskes_filter[$i]['faskes_domisili'] = $faskes[$i]->faskes_domisili;

    }
    return $faskes_filter;
   }
}
