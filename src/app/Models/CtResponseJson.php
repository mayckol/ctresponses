<?php


namespace Mayckol\CtResponse\app\Models;


use Illuminate\Http\JsonResponse;

class CtResponseJson implements CtResponseInterface
{
    /**
     * @param array $configResponses
     * @param array|null $runTimeData
     * @return array|JsonResponse|mixed
     */
    public function build(array $configResponses, ?array $runTimeData = [])
    {
        return response()->json(
            array_merge($configResponses, $runTimeData),
            !empty($runTimeData['status']) ? $runTimeData['status'] : 302,
            !empty($configResponses['headers']) ? $configResponses['headers'] : [],
            !empty($configResponses['options']) ? $configResponses['options'] : 0
        );
    }
}
