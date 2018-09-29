<?php
use PHPUnit\Framework\TestCase;
use Opis\JsonSchema\{
    Validator, ValidationResult, ValidationError, Schema
};
use Psr\Http\Message\ResponseInterface;


final class StackExchangeApiTest extends TestCase
{
    public function testInfoEndpoint(){
        $service = new \StackExchange\StackExchangeApi();
        $response  = $service->getInfo();
        $this->assertSuccessfulJsonResponse($response);

        $data = json_decode($response->getBody());
        $schema = Schema::fromJsonString(file_get_contents(ROOT_DIR . '/tests/files/info-schema.json'));
        $validator = new Validator();
        $result = $validator->schemaValidation($data, $schema);

        $this->assertTrue($result->isValid(), 'Schema for info is invalid!');
    }

    public function testAnswersEndpoint(){
        $service = new \StackExchange\StackExchangeApi();
        $response  = $service->getAnswers();
        $this->assertSuccessfulJsonResponse($response);
        $data = json_decode($response->getBody());
        $schema = Schema::fromJsonString(file_get_contents(ROOT_DIR . '/tests/files/answers-schema.json'));
        $validator = new Validator();
        $result = $validator->schemaValidation($data, $schema);

        $this->assertTrue($result->isValid(), 'Schema for answers is invalid!');
    }

    /**
     * @param ResponseInterface $response
     */
    private function assertSuccessfulJsonResponse(ResponseInterface $response): void
    {
        $this->assertEquals("200", $response->getStatusCode());
        $this->assertEquals("OK", $response->getReasonPhrase());
        $this->assertEquals("1.1", $response->getProtocolVersion());
        $this->assertEquals('application/json; charset=utf-8', $response->getHeader('Content-Type')[0]);
    }
}
