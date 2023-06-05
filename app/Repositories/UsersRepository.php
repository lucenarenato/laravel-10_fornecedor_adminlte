<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Carbon\Carbon;

class UsersRepository extends BaseRepository
{
  protected $modelClass = User::class;

  public function getPaying($limit = 15, $paginate = true)
  {
    $now = Carbon::now();

    $query = $this->newQuery();
    $query->where('is_subscriber', true);
    $query->where('subscription_ends_in', '<=', $now);
    $query->orderBy('name');

    return $this->doQuery($query, $limit, $paginate);
  }
}
