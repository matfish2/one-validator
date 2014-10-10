<?php

use Illuminate\Validation\Factory as Validator;
use Illuminate\Http\Request;
use Fish\OneValidator\Convert\MessagesFetcher;
use Illuminate\Support\Facades\Response;
class OneValidatorController extends BaseController {

    /**
     * @var Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var Illuminate\Http\Response
     */
    protected $response;

    /**
     * insatitate the remote validator
     */
    public function __construct(Validator $validator, Request $request, Response $response) {
        $this->validator = $validator;
        $this->request = $request;
        $this->response = $response;
        $this->fetcher = new MessagesFetcher(App::getLocale());

    }



    /**
     * @param $func
     * @return mixed
     */
    public function validate() {

        $data = $this->request->all();
        $field = $data['field'];
        $message = $this->fetcher->getRemoteMessage($data);
        $v = $this->validator->make(
            [$field=>$data[$field]],
            [$field=>$data['rule']]
        );

        $response = $v->passes()?true:$message;
        echo $this->response->json($response)->getContent();

    }

    /**
     * @return mixed|string
     */
    public function getMessages() {
        return $this->fetcher->fetch();
    }


}