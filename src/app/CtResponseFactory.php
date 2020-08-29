<?php


namespace Mayckol\CtResponse\app;


use Mayckol\CtResponse\app\Models\CtResponseInterface;

/**
 * Class CtResponseFactory
 * @package Mayckol\CtResponse\app
 */
class CtResponseFactory
{
    /**
     * @param CtResponseInterface $ctResponse
     * @param array $configResponses
     * @param array|null $runTimeData
     * @return mixed
     */
    public static function build(
        CtResponseInterface $ctResponse,
        array $configResponses,
        ?array $runTimeData = []
    ){
        return $ctResponse->build($configResponses, $runTimeData);
    }
}

