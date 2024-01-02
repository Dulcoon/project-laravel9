<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = ['NPM', 'Nama', 'Prodi', 'fakultas', 'Alamat', 'IPK', 'foto'];

}