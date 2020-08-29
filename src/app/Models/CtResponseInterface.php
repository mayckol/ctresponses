<?php

namespace Mayckol\CtResponse\app\Models;

interface CtResponseInterface {
    /**
     * @param array $configResponses
     * @param array|null $runTimeData created in run time, ex: return$obj->create([]);
     * @return mixed
     */
    function build(array $configResponses, ?array $runTimeData = []);
}
