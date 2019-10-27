***REMOVED***
***REMOVED***
***REMOVED*** This is a PHP library that handles calling reCAPTCHA.
***REMOVED***
***REMOVED*** BSD 3-Clause License
***REMOVED*** @copyright (c) 2019, Google Inc.
***REMOVED*** @link https://www.google.com/recaptcha
***REMOVED*** All rights reserved.
***REMOVED***
***REMOVED*** Redistribution and use in source and binary forms, with or without
***REMOVED*** modification, are permitted provided that the following conditions are met:
***REMOVED*** 1. Redistributions of source code must retain the above copyright notice, this
***REMOVED***    list of conditions and the following disclaimer.
***REMOVED***
***REMOVED*** 2. Redistributions in binary form must reproduce the above copyright notice,
***REMOVED***    this list of conditions and the following disclaimer in the documentation
***REMOVED***    and/or other materials provided with the distribution.
***REMOVED***
***REMOVED*** 3. Neither the name of the copyright holder nor the names of its
***REMOVED***    contributors may be used to endorse or promote products derived from
***REMOVED***    this software without specific prior written permission.
***REMOVED***
***REMOVED*** THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
***REMOVED*** AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
***REMOVED*** IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
***REMOVED*** DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
***REMOVED*** FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
***REMOVED*** DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
***REMOVED*** SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
***REMOVED*** CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
***REMOVED*** OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
***REMOVED*** OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
***REMOVED*****REMOVED***

namespace ReCaptcha;

***REMOVED***
***REMOVED*** reCAPTCHA client.
***REMOVED*****REMOVED***
class ReCaptcha
***REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Version of this client library.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const VERSION = 'php_1.2.3';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** URL for reCAPTCHA siteverify API
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const SITE_VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Invalid JSON received
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_INVALID_JSON = 'invalid-json';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Could not connect to service
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_CONNECTION_FAILED = 'connection-failed';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Did not receive a 200 from the service
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_BAD_RESPONSE = 'bad-response';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Not a success, but no error codes received!
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_UNKNOWN_ERROR = 'unknown-error';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** ReCAPTCHA response not provided
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_MISSING_INPUT_RESPONSE = 'missing-input-response';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Expected hostname did not match
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_HOSTNAME_MISMATCH = 'hostname-mismatch';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Expected APK package name did not match
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_APK_PACKAGE_NAME_MISMATCH = 'apk_package_name-mismatch';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Expected action did not match
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_ACTION_MISMATCH = 'action-mismatch';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Score threshold not met
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_SCORE_THRESHOLD_NOT_MET = 'score-threshold-not-met';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Challenge timeout
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @const string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    const E_CHALLENGE_TIMEOUT = 'challenge-timeout';

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Shared secret for the site.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $secret;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Method used to communicate with service. Defaults to POST request.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var RequestMethod
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $requestMethod;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Create a configured instance to use the reCAPTCHA service.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $secret The shared key between your site and reCAPTCHA.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param RequestMethod $requestMethod method used to send the request. Defaults to POST.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @throws \RuntimeException if $secret is invalid
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function __construct($secret, RequestMethod $requestMethod = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        if (empty($secret))***REMOVED*****REMOVED***
            throw new \RuntimeException('No secret provided');
***REMOVED***

        if (!is_string($secret))***REMOVED*****REMOVED***
            throw new \RuntimeException('The provided secret must be a string');
***REMOVED***

        $this->secret = $secret;
        $this->requestMethod = (is_null($requestMethod)) ? new RequestMethod\Post() : $requestMethod;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Calls the reCAPTCHA siteverify API to verify whether the user passes
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** CAPTCHA test and additionally runs any specified additional checks
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $response The user response token provided by reCAPTCHA, verifying the user on your site.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $remoteIp The end user's IP address.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return Response Response from the service.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function verify($response, $remoteIp = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        // Discard empty solution submissions
        if (empty($response))***REMOVED*****REMOVED***
            $recaptchaResponse = new Response(false, array(self::E_MISSING_INPUT_RESPONSE));
            return $recaptchaResponse;
***REMOVED***

        $params = new RequestParameters($this->secret, $response, $remoteIp, self::VERSION);
        $rawResponse = $this->requestMethod->submit($params);
        $initialResponse = Response::fromJson($rawResponse);
        $validationErrors = array();

        if (isset($this->hostname) && strcasecmp($this->hostname, $initialResponse->getHostname()) !== 0)***REMOVED*****REMOVED***
            $validationErrors[] = self::E_HOSTNAME_MISMATCH;
***REMOVED***

        if (isset($this->apkPackageName) && strcasecmp($this->apkPackageName, $initialResponse->getApkPackageName()) !== 0)***REMOVED*****REMOVED***
            $validationErrors[] = self::E_APK_PACKAGE_NAME_MISMATCH;
***REMOVED***

        if (isset($this->action) && strcasecmp($this->action, $initialResponse->getAction()) !== 0)***REMOVED*****REMOVED***
            $validationErrors[] = self::E_ACTION_MISMATCH;
***REMOVED***

        if (isset($this->threshold) && $this->threshold > $initialResponse->getScore())***REMOVED*****REMOVED***
            $validationErrors[] = self::E_SCORE_THRESHOLD_NOT_MET;
***REMOVED***

        if (isset($this->timeoutSeconds))***REMOVED*****REMOVED***
            $challengeTs = strtotime($initialResponse->getChallengeTs());

            if ($challengeTs > 0 && time() - $challengeTs > $this->timeoutSeconds)***REMOVED*****REMOVED***
                $validationErrors[] = self::E_CHALLENGE_TIMEOUT;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***

        if (empty($validationErrors))***REMOVED*****REMOVED***
            return $initialResponse;
***REMOVED***

        return new Response(
            false,
            array_merge($initialResponse->getErrorCodes(), $validationErrors),
            $initialResponse->getHostname(),
            $initialResponse->getChallengeTs(),
            $initialResponse->getApkPackageName(),
            $initialResponse->getScore(),
            $initialResponse->getAction()
        );
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Provide a hostname to match against in verify()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** This should be without a protocol or trailing slash, e.g. www.google.com
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $hostname Expected hostname
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return ReCaptcha Current instance for fluent interface
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function setExpectedHostname($hostname)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->hostname = $hostname;
        return $this;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Provide an APK package name to match against in verify()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $apkPackageName Expected APK package name
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return ReCaptcha Current instance for fluent interface
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function setExpectedApkPackageName($apkPackageName)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->apkPackageName = $apkPackageName;
        return $this;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Provide an action to match against in verify()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** This should be set per page.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $action Expected action
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return ReCaptcha Current instance for fluent interface
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function setExpectedAction($action)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->action = $action;
        return $this;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Provide a threshold to meet or exceed in verify()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Threshold should be a float between 0 and 1 which will be tested as response >= threshold.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param float $threshold Expected threshold
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return ReCaptcha Current instance for fluent interface
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function setScoreThreshold($threshold)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->threshold = floatval($threshold);
        return $this;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Provide a timeout in seconds to test against the challenge timestamp in verify()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param int $timeoutSeconds Expected hostname
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return ReCaptcha Current instance for fluent interface
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function setChallengeTimeout($timeoutSeconds)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->timeoutSeconds = $timeoutSeconds;
        return $this;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***
