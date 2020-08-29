<?php


namespace Mayckol\CtResponse\app\Models;


class CtResponseHttp implements CtResponseInterface
{
    /**
     * @param array $configResponses
     * @param array|null $runTimeData
     * @return \Illuminate\Http\RedirectResponse
     */
    public function build(array $configResponses, ?array $runTimeData = [])
    {
        return redirect()->route(
            $configResponses['redirect_to'], !empty($runTimeData['params']) ? $runTimeData['params'] : [],
            !empty($configResponses['status']) ? $configResponses['status'] : 302,
            !empty($configResponses['headers']) ? $configResponses['headers'] : []
        )
            ->with(
                array_merge($configResponses, $runTimeData)
            );
    }
}
