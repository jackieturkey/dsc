<?php
//zend by QQ:2172298892  瑾梦网络  禁止倒卖 一经发现停止任何服务
namespace App\Repositories\User;

class UserRankRepository implements \App\Contracts\Repository\User\UserRankRepositoryInterface
{
	private $authService;
	private $memberPriceRepository;

	public function __construct(\app\services\AuthService $authService, MemberPriceRepository $memberPriceRepository)
	{
		$this->authService = $authService;
		$this->memberPriceRepository = $memberPriceRepository;
	}

	public function getUserRankByUid()
	{
		$uid = $this->authService->authorization();

		if (empty($uid)) {
			$data = null;
		}
		else {
			$user = \App\Models\User::where(array('user_id' => $uid))->first();

			if (!$user) {
				$data = null;
			}
			else {
				$user_rank = \App\Models\UserRank::where('special_rank', 0)->where('min_points', '<=', $user->rank_points)->where('max_points', '>', $user->rank_points)->first();
				$data['rank_id'] = $user_rank->rank_id;
				$data['discount'] = $user_rank->discount * 0.01;
			}
		}

		return $data;
	}

	public function getMemberRankPriceByGid($goods_id)
	{
		$user_rank = $this->getUserRankByUid();
		$shop_price = \App\Models\Goods::where('goods_id', $goods_id)->pluck('shop_price');
		$shop_price = $shop_price[0];

		if ($user_rank) {
			if ($price = $this->memberPriceRepository->getMemberPriceByUid($user_rank['rank_id'], $goods_id)) {
				return $price;
			}

			if ($user_rank['discount']) {
				$member_price = $shop_price * $user_rank['discount'];
			}
			else {
				$member_price = $shop_price;
			}

			return $member_price;
		}
		else {
			return $shop_price;
		}
	}
}

?>
