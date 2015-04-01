<?php

namespace OAuth\OAuth2\Service;

use OAuth\Common\Exception\Exception;
use OAuth\OAuth2\Token\StdOAuth2Token;
use OAuth\Common\Http\Exception\TokenResponseException;
use OAuth\Common\Http\Uri\Uri;
use OAuth\Common\Consumer\CredentialsInterface;
use OAuth\Common\Http\Client\ClientInterface;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\Common\Http\Uri\UriInterface;

class Ithome extends AbstractService
{
    /**
     * Facebook www url - used to build dialog urls
     */
    const WWW_URL = 'http://membercenter.app/';

    /**
     * Defined scopes
     *
     * @link https://developers.facebook.com/docs/reference/login/
     * @link https://developers.facebook.com/tools/explorer For a list of permissions use 'Get Access Token'
     */
    // basic scopes
    const SCOPE_BASIC                         = '';

    public function __construct(
        CredentialsInterface $credentials,
        ClientInterface $httpClient,
        TokenStorageInterface $storage,
        $scopes = array(),
        UriInterface $baseApiUri = null
    ) {
        parent::__construct($credentials, $httpClient, $storage, $scopes, $baseApiUri);

        if (null === $baseApiUri) {
            $this->baseApiUri = new Uri('http://membercenter.app/v1/api/');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationEndpoint()
    {
        return new Uri('http://membercenter.app/oauth/authorize');
    }

    /**
     * {@inheritdoc}
     */
    public function getAccessTokenEndpoint()
    {
        return new Uri('http://membercenter.app/oauth/access_token');
    }

    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {

        // parse_str($responseBody, $data);
        $data = json_decode($responseBody, true);

        if (null === $data || !is_array($data)) {
            throw new TokenResponseException('Unable to parse response.');
        } elseif (isset($data['error'])) {
            throw new TokenResponseException('Error in retrieving token: "' . $data['error'] . '"');
        }

        $token = new StdOAuth2Token();
        $token->setAccessToken($data['access_token']);

        if (isset($data['expires'])) {
            $token->setLifeTime($data['expires']);
        }

        if (isset($data['refresh_token'])) {
            $token->setRefreshToken($data['refresh_token']);
            unset($data['refresh_token']);
        }

        unset($data['access_token']);
        unset($data['expires']);

        $token->setExtraParams($data);

        return $token;
    }

}
