<?php


namespace Mayckol\CtResponse\app\Models;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class CtResponseJson implements CtResponseInterface
{
    /**
     * @param array $configResponses
     * @param array|null $runTimeData
     * @return array|JsonResponse|mixed
     */
    public function build(array $configResponses, ?array $runTimeData = [])
    {
        $mergeData = array_merge($configResponses, $runTimeData);
        if (array_key_exists('message', $mergeData)) {
            foreach ($mergeData['message'] as &$message) {
                $message = Lang::get($message);
            }
        }
        return response()->json(
            $mergeData,
            !empty($runTimeData['status']) ? $runTimeData['status'] : 302,
            !empty($configResponses['headers']) ? $configResponses['headers'] : [],
            !empty($configResponses['options']) ? $configResponses['options'] : 0
        );
    }
}
