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
    public function show(): View
    {
        $stats = User::find(Auth::id())->stats;

        return view('stats.show', ['stats' => $stats]);
    }

    /**
     * Метод предназначен для получения данных о статистике, отфильтрованных по времени. Используется в fetch-запросе.
     *
     * @return void
     */
    public function getFilteredStats(): void
    {
        if (empty($_GET['filterBy'])) {
            echo json_encode('error');
        } else {
            switch ($_GET['filterBy']) {
                case 'lastHour':
                    $fromTime = Carbon::today()->subHour();
                    break;
                case 'lastDay':
                    $fromTime = Carbon::today()->subDay();
                    break;
                case 'lastWeek':
                    $fromTime = Carbon::today()->subWeek();
                    break;
                case 'lastMonth':
                    $fromTime = Carbon::today()->subMonth();
                    break;
                case 'allTime':
                    $fromTime = Carbon::createFromTimestamp(0);
                    break;
                default:
                    break;
            }

            if (isset($fromTime)) {
                $stats = User::find(Auth::id())->stats()->where('visited_at', '>', $fromTime)->get();

                echo json_encode($stats);
            } else {
                echo json_encode('error');
            }
        }
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
            $visitedAt = Carbon::createFromTimestamp($request->all()['visitedAt']);
            $leftAt = Carbon::createFromTimestamp($request->all()['leftAt']);

            $attributes = [
                'user_id' => $userID,
                'user_IP' => $userIP,
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
