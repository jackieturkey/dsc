<?php
//zend by QQ:2172298892  瑾梦网络  禁止倒卖 一经发现停止任何服务
namespace app\models;

class ReturnGood extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'return_goods';
	protected $primaryKey = 'rg_id';
	public $timestamps = false;
	protected $fillable = array('rec_id', 'ret_id', 'goods_id', 'product_id', 'product_sn', 'goods_name', 'brand_name', 'goods_sn', 'is_real', 'goods_attr', 'attr_id', 'return_type', 'return_number', 'out_attr', 'return_attr_id', 'refound');
	protected $guarded = array();
}

?>
