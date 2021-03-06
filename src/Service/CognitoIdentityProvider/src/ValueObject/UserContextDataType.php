<?php

namespace AsyncAws\CognitoIdentityProvider\ValueObject;

final class UserContextDataType
{
    /**
     * Contextual data such as the user's device fingerprint, IP address, or location used for evaluating the risk of an
     * unexpected event by Amazon Cognito advanced security.
     */
    private $EncodedData;

    /**
     * @param array{
     *   EncodedData?: null|string,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->EncodedData = $input['EncodedData'] ?? null;
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getEncodedData(): ?string
    {
        return $this->EncodedData;
    }

    /**
     * @internal
     */
    public function requestBody(): array
    {
        $payload = [];
        if (null !== $v = $this->EncodedData) {
            $payload['EncodedData'] = $v;
        }

        return $payload;
    }
}
