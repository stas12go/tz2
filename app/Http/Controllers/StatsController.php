<?php

namespace App\Http\Controllers;

use App\Models\Stats;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StatsController extends Controller
{
    /**
     * Страница "Статистика". Доступна для авторизованных пользователей.
     *
     * @return View
     */
    public function show(User $user)
    {
        $stats = User::find($user->getAttribute('id'))->stats;

        return view('stats.show', ['stats' => $stats]);
    }

    /**
     * Сохранение информации о пользователе и времени, проведённого им на странице "Сбор данных". Используется в fetch-запросе.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $userIP = $request->ip();
            $phpSessID = $_COOKIE['PHPSESSID'];
            $visitedAt = Carbon::createFromTimestamp($request->all()['visitedAt']);
            $leftAt = Carbon::createFromTimestamp($request->all()['leftAt']);

            $attributes = [
                'user_id' => $userID,
                'user_IP' => $userIP,
                'SID' => $phpSessID,
                'visited_at' => $visitedAt,
                'left_at' => $leftAt,
            ];

            $stats = new Stats();
            $stats->fill($attributes);
            $stats->save();
        }
    }

    /**
     * Страница со сбором времени пребывания на странице.
     *
     * @return View
     */
    public function gathering(): View
    {
        return view('stats.gathering');
    }
}
