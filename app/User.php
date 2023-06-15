<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'nguoidung';
    protected $primaryKey = 'manguoidung';

    public function getId()
    {
        return $this->id;
    }
    protected $fillable = [
        'hoten', 'email', 'sodienthoai', 'password','diachi','gioitinh','ngaysinh','trangthaitaikhoan','maquyen'
    ];

    protected static function create($user) {
        DB::table('nguoidung')->insert($user);
    }

    protected static function updateUser($manguoidung, $data) {
        return DB::table('nguoidung')->where('manguoidung', $manguoidung)->update($data);
    }

    protected static function find() {

    }

    protected static function remove($manguoidung) {
        DB::table('nguoidung')->where('manguoidung', $manguoidung)->delete();
    }

    protected static function get_all() {
        return DB::table('nguoidung')->get();
    }

    protected static function enable_admin($manguoidung) {
        $user = array();
        $user['maquyen'] = 1;
        DB::table('nguoidung')->where('manguoidung', $manguoidung)->update($user);
    }

    protected static function disable_admin($manguoidung) {
        $user = array();
        $user['maquyen'] = 0;
        DB::table('nguoidung')->where('manguoidung', $manguoidung)->update($user);
    }
    protected static function disable_user($manguoidung) {
        $user = array();
        $user['trangthaitaikhoan'] = 1;
        DB::table('nguoidung')->where('manguoidung', $manguoidung)->update($user);
    }
    protected static function enable_user($manguoidung) {
        $user = array();
        $user['trangthaitaikhoan'] = 0;
        DB::table('nguoidung')->where('manguoidung', $manguoidung)->update($user);
    }

}
