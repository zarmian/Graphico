<?php

namespace App\Http\Controllers;

use App\Libraries\Paddle\Plans;
use Illuminate\Http\Request;

class PlansController
{
    /** @var Plans */
    private $plansModule;
    /** @var Request */
    private $request;

    /**
     * PlansController constructor.
     * @param Request $request
     * @param Plans $plansModule
     */
    public function __construct(Request $request, Plans $plansModule)
    {
        $this->request = $request;
        $this->plansModule = $plansModule;
    }

    public function getPlans()
    {
        return $this->plansModule->getPlans();
    }

    public function getPlansWeb()
    {
        $response = $this->plansModule->getPlans();
        return view('index')->with('planData', $response->getOriginalContent());
    }

    public function generatePayUrl($id)
    {
        $request = $this->request->all();
        $requestParams = [
            'productId' => $id,
            'userId' => $request['userId'] ?? null,
            'userEmail' => $request['userEmail'] ?? null
        ];
        return $this->plansModule->generatePayUrl($requestParams);
    }
}
