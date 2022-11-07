<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iodev\Whois\Exceptions\ConnectionException;
use Iodev\Whois\Exceptions\ServerMismatchException;
use Iodev\Whois\Exceptions\WhoisException;
use Iodev\Whois\Factory;

class DomainController extends Controller
{
    /**
     * @param Request $request
     * @return array|void
     * @throws ConnectionException
     * @throws ServerMismatchException
     * @throws WhoisException
     */
    public function check(Request $request)
    {
        $whois = Factory::get()->createWhois();

        if ($request->domain){
            try {
                $info = $whois->loadDomainInfo($request->domain);

                if (!$info) {
                    return [
                        'url' => $request->domain,
                        'status' => 'Cвободен',
                        'end' => null
                    ];
                }else{
                    return [
                        'url' => $request->domain,
                        'status' => 'занят',
                        'end' => date("Y-m-d", $info->expirationDate)
                    ];
                }
            }catch (ServerMismatchException $e){
                return [
                    'url' => $request->domain,
                    'status' => 'Нет серверов, соответствующих домену ' . $request->domain,
                    'end' => null
                ];
            }

        }

    }
}
