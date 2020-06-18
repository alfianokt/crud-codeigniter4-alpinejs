<?php namespace App\Models;

use CodeIgniter\Model;

class Buku extends Model
{
  protected $table = 'buku';
  protected $primaryKey = 'buku_id';

  protected $allowedFields = ['buku_nama'];
}