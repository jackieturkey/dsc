<?php
//zend by QQ:2172298892  瑾梦网络  禁止倒卖 一经发现停止任何服务
namespace App\Models;

class GoodsConsumption extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'goods_consumption';
	public $timestamps = false;
	protected $fillable = array('goods_id', 'cfull', 'creduce');
	protected $guarded = array();
}

?>
