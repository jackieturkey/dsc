<?php
//zend by QQ:2172298892  瑾梦网络  禁止倒卖 一经发现停止任何服务
namespace App\Models;

class MerchantsDocumenttitle extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'merchants_documenttitle';
	protected $primaryKey = 'dt_id';
	public $timestamps = false;
	protected $fillable = array('dt_title', 'cat_id');
	protected $guarded = array();
}

?>
