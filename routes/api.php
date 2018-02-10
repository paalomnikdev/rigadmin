<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('/register-rig', function (Request $request) {
    $ip = \Request::ip();
    if (!reserved_ip($ip)) {
        return \Response::json(
            [],
            \Illuminate\Http\Response::HTTP_FORBIDDEN
        );
    }
    try {
        $data = $request->only([
            'name',
            'stats',
        ]);

        $rig = \App\Models\Rig::findOrCreate($ip);
        $rig->setAttribute('name', !empty($data['name']) ? $data['name'] : 'Unnamed Rig');
        $rig->setAttribute('address', $ip);
        $rig->setAttribute('active', true);
        $rig->save();

        $videocards = @json_decode($data['stats'], true);

        if ($videocards) {
            $cardsToAdd = [];
            foreach ($videocards as $cardId => $videocard) {
                $card = \App\Models\Videocard::findOrCreate($rig->getKey(), $cardId);
                $card->setRawAttributes([
                    'name'              => $videocard['name'] ?? 'Unnamed Videocard',
                    'id_on_rig'         => $cardId,
                    'fan_speed'         => $videocard['fan_speed'] ?? 0,
                    'power_limit'       => $videocard['power_limit'] ?? 0,
                    'temperature'       => $videocard['temperature'] ?? 0,
                    'memory_overclock'  => $videocard['memory_overclock'] ?? 0,
                    'core_overclock'    => $videocard['core_overclock'] ?? 0,
                ]);
                $cardsToAdd[] = $card;
            }
            $rig->videocards()
                ->saveMany($cardsToAdd);
        }
    } catch (\Throwable $e) {
        \Log::error($e->getMessage(), $e->getTrace());
        return \Response::json(['message' => $e->getMessage()]);
    }


    return \Response::json([]);
});
