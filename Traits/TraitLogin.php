<?php
trait SetearApi
{

    public function successResponse($data, $code = 200, $msj = "", $num = 1)
    {
        $response = array(
            "data"  => $data,
            "code"  => $code,
            "msj"   => $msj,
            "num"   => $num
        );
        return $response;
    }
    public function errorResponse($data, $code = 500, $msj = "", $num = 2)
    {
        $response = array(
            "data"  => $data,
            "code"  => $code,
            "msj"   => $msj,
            "num"   => $num
        );
        return $response;
    }
}
