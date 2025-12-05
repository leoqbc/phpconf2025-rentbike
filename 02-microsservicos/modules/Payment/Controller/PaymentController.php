<?php

namespace RentBike\Modules\Payment\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RentBike\Modules\Payment\Application\PaymentService;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;

class PaymentController
{
    public function __construct(
        protected PaymentService $paymentService
    ) {
    }

    public function process(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $requestData = (object)$request->getParsedBody();

        $paymentDTO = new PaymentDTO();
        $paymentDTO->externalId = $requestData->external_id;
        $paymentDTO->amount = $requestData->amount;

        $this->paymentService->process($paymentDTO);

        $response->getBody()->write(json_encode([
            'status' => 'created'
        ]));

        return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
    }
}
