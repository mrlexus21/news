<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use App\Http\Requests\SubscribeRequest;
use App\Services\Subscribe\SubscribeService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SubscribeController extends Controller
{
    private SubscribeService $subscribeService;

    public function __construct(SubscribeService $subscribeService)
    {
        $this->subscribeService = $subscribeService;
    }

    public function subscribe(SubscribeRequest $request)
    {
        try {
            $this->subscribeService->subscribeFromNewsId(Auth::user()->id, $request->safe()->postId);
        } catch(ServiceException $e) {

            return response()->json([
                'errors' => [$e->getMessage()],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);

        } catch(\Throwable $e) {

            Log::error($e->getMessage());

            return response()->json([
                'errors' => __('errors.server_error')
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'result' => 'ok',
            'message' => __('main.subscribe_success'),
        ]);
    }

    public function unsubscribe(SubscribeRequest $request)
    {
        // todo in pc
    }
}
