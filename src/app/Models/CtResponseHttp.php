<?php


namespace Mayckol\CtResponse\app\Models;


use Illuminate\Support\Facades\Lang;

class CtResponseHttp implements CtResponseInterface
{
    /**
     * @param array $configResponses
     * @param array|null $runTimeData
     * @return \Illuminate\Http\RedirectResponse
     */
    public function build(array $configResponses, ?array $runTimeData = [])
    {
        $mergeData = array_merge($configResponses, $runTimeData);
        if (array_key_exists('message', $mergeData)) {
            foreach ($mergeData['message'] as &$message) {
                $message = Lang::get($message);
            }
        }
        return redirect()->route(
            $configResponses['redirect_to'],
            !empty($runTimeData['params']) ? $runTimeData['params'] : [],
            !empty($configResponses['status']) ? $configResponses['status'] : 302,
            !empty($configResponses['headers']) ? $configResponses['headers'] : []
        )
            ->with($mergeData);
    }
}
